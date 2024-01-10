<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Redeem;
use App\Models\User;
use App\Models\Promocode;
use DB;

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

    public function show() {
        return view('voucher');
    }

    public function delete($id) {
        $redeem=Redeem::find($id);
        $redeem->delete(); 
        return redirect()->route('redeem.index');
    }
}
