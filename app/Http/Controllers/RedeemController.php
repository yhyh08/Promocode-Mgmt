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
    public function __construct(){
        $this->middleware('auth')->only(['index', 'delete']);;//require login before access
    }
    
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
        return redirect()->route('promocode.redeemed');
    }

}
