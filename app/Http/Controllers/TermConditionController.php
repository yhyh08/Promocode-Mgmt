<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\TermCondition;

class TermConditionController extends Controller
{
    function create(){
        $r=request();

        $add=TermCondition::create([
            'title' => $r->title,
            'content' => $r->content
        ]);
        
        return redirect()->route('termCondition.index');
    }

    public function add()
    {
        return view('admin.termCondition.create');
    }

    function view(){
        $term=TermCondition::all();

        return view('admin.termCondition.index')->with('term', $term);
    }

    function edit($id){
        $term=TermCondition::all()->where('id' , $id);
        return view('admin.termCondition.edit')->with('term', $term);
    }

    function update(){
        $r=request();
        $term=TermCondition::find($r->id);
        
        $term->title=$r->title;
        $term->content=$r->content;
        $term->save();
        // dd($product);
        return redirect()->route('termCondition.index');
    }

    function delete($id){
        $term=TermCondition::find($id);
        $term->delete(); 
        return redirect()->route('termCondition.index');
    }
}
