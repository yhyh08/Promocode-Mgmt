<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Promocode;
use App\Models\CodeDetail;
use App\Models\DiscountType;
use App\Models\TermCondition;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
   
    public function index() {
        $promocode=Promocode::count();
        $detail=CodeDetail::count();
        $discount=DiscountType::count();
        $terms=TermCondition::count();

        return view('dashboard',compact('promocode','detail','discount','terms'));
    }
}
