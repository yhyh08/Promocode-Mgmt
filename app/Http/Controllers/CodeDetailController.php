<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\CodeDetail;
use App\Models\DiscountType;
use App\Models\TermCondition;

class CodeDetailController extends Controller
{
    public function __construct(){
        $this->middleware('auth');//require login before access
    }
    
    public function create() {
        $r=request();
        
        $add=CodeDetail::create([
            'minimum_price' => $r->price,
            'discount_amount' => $r->amount,
            'discount_type_id' => $r->type,
            'term_condition_id' => json_encode($r['condition']),
        ]);

        return redirect()->route('codeDetail.index' );
    }

    public function add() {
        $type = DiscountType::all();
        $condition = TermCondition::all();
        
        return view('admin.codeDetail.create' , compact('type' , 'condition'));
    }

    public function view() {
        $detail=DB::table('code_details')
        ->leftJoin('discount_types', 'code_details.discount_type_id', '=', 'discount_types.id')
        ->select('code_details.*', 'discount_types.name as discount_type_name')
        ->paginate(10);

        $detail->transform(function ($detail) {
            $detail->term_condition_id = collect(json_decode($detail->term_condition_id))
            ->map(function ($conditionId) {
                return TermCondition::find($conditionId)->title ?? ' ';
            })->toArray();

            return $detail;
        });

        return view('admin.codeDetail.index')->with('detail', $detail);
    }

    function edit($id) {
        $detail=DB::table('code_details')
        ->leftJoin('discount_types', 'code_details.discount_type_id', '=', 'discount_types.id')
        ->leftJoin('term_conditions', 'code_details.term_condition_id', '=', 'term_conditions.id')
        ->select('code_details.*', 'discount_types.name as discount_type_name', 'term_conditions.title as term_condition_title')
        ->where('code_details.id' , $id)
        ->get();
        
        $type = DiscountType::all();
        $condition = TermCondition::all();
        
        return view('admin.codeDetail.edit')
        ->with('detail', $detail)
        ->with('type', $type)
        ->with('condition', $condition);
    }

    public function update() {
        $r=request();
        $detail=CodeDetail::find($r->id);
        
        $detail->minimum_price=$r->price;
        $detail->discount_amount=$r->amount;
        $detail->discount_type_id=$r->type;
        $detail->term_condition_id=$r->condition;
        $detail->save();
        // dd($product);
        return redirect()->route('codeDetail.index');
    }

    public function delete($id) {
        $detail=CodeDetail::find($id);
        $detail->delete(); 
        return redirect()->route('codeDetail.index');
    }
}
