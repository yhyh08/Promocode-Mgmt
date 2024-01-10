<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\TermCondition;

class TermConditionController extends Controller
{
    public function create() {
        $r=request();

        $add=TermCondition::create([
            'title' => $r->title,
            'content' => $r->content
        ]);
        
        return redirect()->route('termCondition.index');
    }

    public function add() {
        return view('admin.termCondition.create');
    }

    public function view(){
        $term=TermCondition::paginate(10);

        return view('admin.termCondition.index')->with('term', $term);
    }

    public function edit($id) {
        $term=TermCondition::all()->where('id' , $id);
        return view('admin.termCondition.edit')->with('term', $term);
    }

    public function update() {
        $r=request();
        $term=TermCondition::find($r->id);
        
        $term->title=$r->title;
        $term->content=$r->content;
        $term->save();
        // dd($product);
        return redirect()->route('termCondition.index');
    }

    public function delete($id) {
        $term=TermCondition::find($id);
        $term->delete(); 
        return redirect()->route('termCondition.index');
    }
}
