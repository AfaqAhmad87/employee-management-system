<?php

namespace App\Http\Controllers;

use App\Models\ExpenseType;
use Illuminate\Http\Request;

class ExpenseTypeController extends Controller
{
    public function index(){
        $expensetypes=ExpenseType::paginate(5);
        return view('expensetype.index',compact('expensetypes'));
    }

    public function create(){
        return view('expensetype.create');
    }

    public function store(Request $request){

        $expensetype=$request->validate([
            'title'=>'required',
            'description'=>'required|max:100'
        ]);

    ExpenseType::create($expensetype);
    return redirect()->route('expensetype.index');
    }
    public function edit(Request $request,$id){
        $expensetype=ExpenseType::findOrFail($id);
        // $validatetype=$request->validate([
        // 'title'=>'required',
        // 'description'=>'required'
        // ]);
        // $expensetype->update($validatetype);
        return view('expensetype.edit',compact('expensetype'));

    }
        public function update(Request $request,$id){
        $expensetype=ExpenseType::find($id);
        $validatetype=$request->validate([
        'title'=>'required',
        'description'=>'required|max:100'
        ]);
        // dd('test');
        $expensetype->update($validatetype);
      return redirect()->route('expensetype.index');

    }

    public function destroy($id){
        $expensetype=ExpenseType::find($id);
        $expensetype->delete();
        return redirect()->route('expensetype.index');
    }
}
