<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Redeem;
use App\Models\User;
use App\Models\Promocode;
use DB;
use Barryvdh\DomPDF\Facade\Pdf;

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
        $data = [
            'title' => 'Card title',
            'description' => 'This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.',
            'lastUpdated' => 'Last updated 3 mins ago',
        ];

        return view('voucher',$data);
    }

    public function delete($id) {
        $redeem=Redeem::find($id);
        $redeem->delete(); 
        return redirect()->route('redeem.index');
    }

    public function print()
{
    $data = [
        'title' => 'Card title',
        'description' => 'This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.',
        'lastUpdated' => 'Last updated 3 mins ago',
    ];

    $pdf = PDF::loadView('voucher', $data);
    return $pdf->download('voucher.pdf');
}
}
