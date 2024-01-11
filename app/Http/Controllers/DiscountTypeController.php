<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\DiscountType;

class DiscountTypeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');//require login before access
    }
    
    public function create(){
        $r=request();

        $add=DiscountType::create([
            'name' => $r->name,
            'category' => $r->category,
            'type' => $r->type,
            'remark' => ($r->remark == null) ? '' : $r->remark,
        ]);

        return redirect()->route('discountType.index' );
    }

    public function add() {
        $category = DiscountType::CATEGORY_SELECT;
        $type = DiscountType::TYPE_SELECT;

        return view('admin.discountType.create' , compact('category' , 'type'));
    }

    public function view() {
        $type=DiscountType::paginate(10);

        $type->each(function ($type) {
            $type->category = DiscountType::CATEGORY_SELECT[$type->category];
        });
        
        $type->each(function ($type) {
            $type->type = DiscountType::TYPE_SELECT[$type->type];  
        });

        return view('admin.discountType.index')->with('type', $type);
    }

    public function edit($id) {
        $type=DiscountType::all()->where('id' , $id);

        $category = DiscountType::CATEGORY_SELECT;
        $method = DiscountType::TYPE_SELECT;

        return view('admin.discountType.edit')
        ->with('type', $type)
        ->with('category', $category)
        ->with('method', $method);
    }

    public function update() {
        $r=request();
        $type=DiscountType::find($r->id);
        
        $type->name=$r->name;
        $type->category=$r->category;
        $type->type=$r->type;
        $type->remark=($r->remark == null) ? '' : $r->remark;
        $type->save();
        // dd($product);
        return redirect()->route('discountType.index');
    }

    public function delete($id) {
        $type=DiscountType::find($id);
        $type->delete(); 
        return redirect()->route('discountType.index');
    }
}
