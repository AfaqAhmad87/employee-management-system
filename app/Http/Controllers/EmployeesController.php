<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
public function index(Request $request)
{
    $search = $request->input('search');

    $query = Employee::query();

    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
              ->orWhere('email', 'like', "%{$search}%")
              ->orWhere('position', 'like', "%{$search}%")
              ->orWhere('bank', 'like', "%{$search}%")
              ->orWhere('iban', 'like', "%{$search}%");
        });
    }

    $employees = $query->paginate(5);

    return view('employees.index', compact('employees', 'search'));
}


     public function create(){
        return view('employees.create');
    }

public function store(Request $request)
{
    $employees = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:employees,email',
        'position' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'bank' => 'nullable|string|max:255',
        'iban' => 'nullable|string|max:255',
    ]);

    Employee::create($employees);

    return redirect()->route('employees')->with('success', 'Employee added successfully!');
}

public function edit(Request $request,$id){

    $employees=Employee::findOrFail($id);
    return view('employees.edit',compact('employees'));
}

public function update(Request $request,$id){

    $employee=Employee::find($id);

        $validatedata = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'position' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'bank' => 'nullable|string|max:255',
        'iban' => 'nullable|string|max:255',
    ]);

    $employee->update($validatedata);
    // dd( $validatedata);
 return redirect()->route('employees')->with('success', 'Employee updated successfully!');
}
public function destroy($id){
    $employee=Employee::find($id);
    $employee->delete();
     return redirect()->route('employees')->with('success', 'Employee Deleted successfully!');
}

    }
