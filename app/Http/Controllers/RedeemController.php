<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Redeem;
use App\Models\User;
use App\Models\Promocode;
use DB;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\TermCondition;
use App\Models\DiscountType;

class RedeemController extends Controller
{
    public function index() {
        $redeemed = DB::table('redeems')
        ->leftJoin('promocodes', 'redeems.promocode_id', '=', 'promocodes.id')
        ->select('redeems.*', 'promocodes.code as code')
        ->paginate(10);
        
        return view('admin.promocode.redeemed')->with('redeemed' , $redeemed);
    }

    public function view() {
        return view('redeem');
    }

    public function delete($id) {
        $redeem=Redeem::find($id);
        $redeem->delete(); 
        return redirect()->route('redeem.index');
    }

    public function print($id) {
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

        $pdf = PDF::loadView('admin.promocode.voucher', ['detail' => $detail->toArray()]);
        return $pdf->download('voucher.pdf');
    }
}
