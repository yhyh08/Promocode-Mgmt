<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Promocode;
use Illuminate\Support\Str;
use App\Models\CodeDetail;

class PromocodeController extends Controller
{
    function create(){
        $r=request();

        $newPromoCode = Str::random(8);

        $add=Promocode::create([
            'name' => $r->codeName,
            'description' => $r->codeDescription,
            'code' => $newPromoCode,
            'limit'=>$r->limit,
            'expires_at'=>$r->expired_date,
            'user_id'=>'1',
            'code_detail_id'=>'1'
        ]);
        // Session::flash('success', "New Code added");
        return redirect()->route('promocode.index');
    }

    public function add()
    {
        $detail=DB::table('code_details')
        ->leftJoin('discount_types', 'code_details.discount_type_id', '=', 'discount_types.id')
        ->leftJoin('term_conditions', 'code_details.term_condition_id', '=', 'term_conditions.id')
        ->select('code_details.*', 'discount_types.name as discount_type_name', 'term_conditions.title as term_condition_title')
        ->get();
        
        return view('admin.promocode.create')->with('detail', $detail);
    }

    function view(){
        $promo=Promocode::all();

        return view('admin.promocode.index')->with('promocode', $promo);
    }

    function edit($id){
        $promo=Promocode::all()->where('id' , $id);
        
        return view('admin.promocode.edit')->with('promo', $promo);
    }

    function update(){
        $r=request();
        $promo=Promocode::find($r->id);
        
        $promo->name=$r->codeName;
        $promo->description=$r->codeDescription;
        $promo->expires_at=$r->expired_date;
        $promo->save();
        // dd($product);
        return redirect()->route('promocode.index');
    }

    function delete($id){
        $promo=Promocode::find($id);
        $promo->delete(); 
        return redirect()->route('promocode.index');
    }

    public function updateStatus(Request $request)
    {
        // dd();
        $promo = Promocode::findOrFail($request->promoId);
        $promo->status = $request->status;
        $promo->save();
        
        // return response()->json(['message' => 'Status updated successfully.']);
    }

    public function applyPromoCode()
    {
        $r=request();

        $totalPrice = $r->sub;

        $promo = Promocode::where('code', $r->code)
            ->where('status', '1')
            ->where('expires_at', '>', now())
            ->first();

        if ($promo) {
            // Check usage limit
            if ($promo->limit === null || $promo->redeem_count < $promo->limit) {
                // Increment redeem count
                $promo->increment('redeem_count');
                
                $discountAmount = $promo->discount_amount;
                $discountedTotal = max(0, $totalPrice - 5);

                session([
                    'applied_promo_code' => $promo,
                    'discounted_total' => $discountedTotal,
                    'original_total' => $totalPrice,
                ]);
                // Apply the promo code
                return redirect()->back()->with('success', 'Active promo code. Discount: $' . $discountAmount . ', Discounted Total: $' . $discountedTotal);
            } else {
                // Promo code usage limit exceeded
                return redirect()->back()->with('error', 'limit promo code.');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid promo code.');
        }
    }
}
