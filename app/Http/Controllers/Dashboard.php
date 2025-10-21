<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index(){
        $expenses=Expense::where('status','paid')->sum('amount');
        // dd($expenses);
        return view('welcome',compact('expenses'));
    }
}
