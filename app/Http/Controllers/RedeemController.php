<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Redeem;
use App\Models\User;
use App\Models\Promocode;
use DB;

class RedeemController extends Controller
{
    function index()
    {
        $redeem = DB::table('redeems')
        ->leftJoin('promocodes', 'redeems.promocode_id', '=', 'promocodes.id')
        ->select('redeems.*', 'promocodes.code as code')
        ->get();
        
        return view('admin.promocode.redeem')->with('redeem' , $redeem);
    }

    function delete($id){
        $redeem=Redeem::find($id);
        $redeem->delete(); 
        return redirect()->route('redeem.index');
    }
}
