<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\ExpenseType;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public  function index(){
       $expenses = Expense::with('expenseType')->paginate(5);

        return view('expenses.index',compact('expenses'));
    }
 public function store(Request $request)
{
    $validated = $request->validate([
        'expense_type_id' => 'required|exists:expensetypes,id',
        'amount' => 'required|numeric|min:0',
        'status' => 'required|in:pending,paid,cancelled',
    ]);
    Expense::create($validated);
    return redirect()->route('expenses.index')->with('success', 'Expense added successfully!');
}

     public function create(){
              $expenseTypes=ExpenseType::all();
        return view('expenses.create',compact('expenseTypes'));
    }

    public function edit($id){
        $expense=Expense::findOrFail($id);
          $expensetypes=ExpenseType::all();
        return view('expenses.edit',compact('expense','expensetypes'));
    }

    public function update(Request $request,$id){
        $expense=Expense::find($id);
      $validated=  $request->validate([
        'expense_type_id' => 'required|exists:expensetypes,id',
        'amount' => 'required|numeric|min:0',
        'status' => 'required|in:pending,paid,cancelled',
        ]);
        $expense->update( $validated);
        return redirect()->route('expenses.index');
    }
}
