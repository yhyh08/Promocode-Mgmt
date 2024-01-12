<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Promocode;
use Illuminate\Support\Str;
use App\Models\CodeDetail;
use App\Models\DiscountType;
use App\Models\TermCondition;
use App\Models\Redeem;
use Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class PromocodeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');//require login before access
    }

    public function create() {
        $r=request();

        $newPromoCode = Str::random(8);

        $add=Promocode::create([
            'name' => $r->codeName,
            'description' => $r->codeDescription,
            'code' => $newPromoCode,
            'limit'=>$r->limit,
            'expires_at'=>$r->expired_date,
            'user_id'=>'1',
            'code_detail_id'=>$r->detail
        ]);
        
        return redirect()->route('promocode.index');
    }

    public function add() {
        $detail=DB::table('code_details')
        ->leftJoin('discount_types', 'code_details.discount_type_id', '=', 'discount_types.id')
        ->leftJoin('term_conditions', 'code_details.term_condition_id', '=', 'term_conditions.id')
        ->select('code_details.*', 'discount_types.name as discount_type_name', 'term_conditions.title as term_condition_title')
        ->get();
        
        return view('admin.promocode.create')->with('detail', $detail);
    }

    public function getDetail($id) {
        $detail = CodeDetail::find($id);

        $discount_type = DiscountType::find($detail->discount_type_id);

        $details=DB::table('code_details')
        ->leftJoin('term_conditions', 'code_details.term_condition_id', '=', 'term_conditions.id')
        ->select('code_details.*')
        ->where('code_details.id' , $id)
        ->get();
        
        $details->transform(function ($item) {
            $item->term_condition_id = collect(json_decode($item->term_condition_id))
            ->map(function ($conditionId) {
                return TermCondition::find($conditionId)->title ?? ' ';
            })->implode(', ');

            return $item;
        });

        
        if ($detail) {
            // Return details as JSON
            return response()->json([
                'minimum_price' => $detail->minimum_price,
                'discount_amount' => $detail->discount_amount,
                'discount_type_name' => $discount_type->name,
                'term_condition_title' => $details->pluck('term_condition_id')->first(),
            ]);
        } else {
            return response()->json(['error' => 'Detail not found'], 404);
        }
    }

    public function view() {
        $promo=Promocode::paginate(10);

        return view('admin.promocode.index')->with('promocode', $promo);
    }

    public function shows($id) {
        $promo=Promocode::all()->where('id' , $id);

        $detail=DB::table('code_details')
        ->leftJoin('discount_types', 'code_details.discount_type_id', '=', 'discount_types.id')
        ->leftJoin('term_conditions', 'code_details.term_condition_id', '=', 'term_conditions.id')
        ->select('code_details.*', 'discount_types.name as discount_type_name', 'term_conditions.title as term_condition_title')
        ->get();
        
        return view('admin.promocode.shows')->with('promo', $promo)->with('detail',$detail);
    }

    public function edit($id) {
        $promo=Promocode::all()->where('id' , $id);

        $detail=DB::table('code_details')
        ->leftJoin('discount_types', 'code_details.discount_type_id', '=', 'discount_types.id')
        ->leftJoin('term_conditions', 'code_details.term_condition_id', '=', 'term_conditions.id')
        ->select('code_details.*', 'discount_types.name as discount_type_name', 'term_conditions.title as term_condition_title')
        ->get();
        
        return view('admin.promocode.edit')->with('promo', $promo)->with('detail',$detail);
    }

    public function update() {
        $r=request();
        $promo=Promocode::find($r->id);
        
        $promo->name=$r->codeName;
        $promo->description=$r->codeDescription;
        $promo->redeem_count=$r->count;
        $promo->limit=$r->limit;
        $promo->expires_at=$r->expired_date;
        $promo->code_detail_id=$r->detail;
        $promo->save();

        return redirect()->route('promocode.index');
    }

    public function delete($id) {
        $promo=Promocode::find($id);
        $promo->delete(); 
        return redirect()->route('promocode.index');
    }

    public function updateStatus(Request $request) {

        $promo = Promocode::findOrFail($request->promoId);
        $promo->status = $request->status;
        $promo->save();
        
    }

    public function applyPromoCode() {
        $r=request();

        $promo = Promocode::where('code', $r->code)
            ->where('status', '1')
            ->where('expires_at', '>', now())
            ->first();

        if ($promo) {

            $redeemed= Redeem::all()
            ->where('user_id', ( Auth::id() )? ( Auth::id() ) : '1')
            ->where('promocode_id', $promo->id)
            ->first();

            if($redeemed){
                return redirect()->back()->with('error', 'You have redeemed this promocode');
            }
            // Check usage limit
            if ($promo->limit === null || $promo->redeem_count < $promo->limit) {

                    $add=Redeem::create([
                        'redeem_date' => now(),
                        'user_id'=> ( Auth::id() )? ( Auth::id() ) : '1' ,
                        'promocode_id'=>$promo->id
                    ]);

                    $promo->increment('redeem_count');

                    return redirect()->back()->with('success', 'Active promo code.');
                    
            } else {
                return redirect()->back()->with('error', 'Limit promo code.');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid promo code.');
        }
    }

    public function viewVoucher($id) {
        $promo=Promocode::all()->where('id' , $id);

        $detail=DB::table('code_details')
        ->leftJoin('discount_types', 'code_details.discount_type_id', '=', 'discount_types.id')
        ->leftJoin('term_conditions', 'code_details.term_condition_id', '=', 'term_conditions.id')
        ->select('code_details.*', 'discount_types.category as discount_type_category', 
        'discount_types.type as discount_type_type', 'term_conditions.content as term_condition_content')
        ->where('code_details.id' , $id)
        ->get();
        
        $detail->transform(function ($detail) {
            $detail->term_condition_id = collect(json_decode($detail->term_condition_id))
            ->map(function ($conditionId) {
                return TermCondition::find($conditionId)->content ?? ' ';
            })->toArray();

            return $detail;
        });

        $detail->each(function ($detail) {
            $detail->discount_type_category = DiscountType::CATEGORY_SELECT[$detail->discount_type_category];
        });

        $detail->each(function ($detail) {
            $detail->discount_type_type = DiscountType::TYPE_SELECT[$detail->discount_type_type];
        });

        return view('admin.promocode.voucher')
        ->with('promo', $promo)
        ->with('detail',$detail);
    }

    public function print($id) {
        $promo=Promocode::find($id);
        
        $detail= CodeDetail::find($promo->code_detail_id);

        $type=DiscountType::find($detail->discount_type_id);
        
        $term = collect(json_decode($detail->term_condition_id))
        ->map(function ($conditionId) {
            return TermCondition::find($conditionId)->title ?? ' ';
        })->implode(', ');
        
        $data = [
            'promo'  => $promo,
            'detail' => $detail,
            'type' => $type,
            'term' => $term
        ];

        $pdf = PDF::loadView('print', $data);
        return $pdf->download('voucher.pdf');
    }

    public function viewPrint($id) {
        $promo=Promocode::find($id);
        
        $detail= CodeDetail::find($promo->code_detail_id);

        $type=DiscountType::find($detail->discount_type_id);

        $term = collect(json_decode($detail->term_condition_id))
        ->map(function ($conditionId) {
            return TermCondition::find($conditionId)->title ?? ' ';
        })->implode(', ');

        $data = [
            'promo'  => $promo,
            'detail' => $detail,
            'type' => $type,
            'term' => $term
        ];

        return view('print', $data);
    }
}
