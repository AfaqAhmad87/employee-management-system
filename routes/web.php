<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;




Route::middleware('auth')->group(function () {
    Route::get('/employees/index',[EmployeesController::class,'index'])->name('employees');
    Route::get('/employees/create',[EmployeesController::class,'create'])->name('employees.create');
    Route::post('/employees/store',[EmployeesController::class,'store'])->name('employees.store');
    Route::get('/employees/edit/{id}',[EmployeesController::class,'edit'])->name('employees.edit');
    Route::delete('/employees/destroy/{id}',[EmployeesController::class,'destroy'])->name('employees.destroy');
    Route::put('/employees/update/{id}',[EmployeesController::class,'update'])->name('employees.update');
    Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('welcome');
})->name('index');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');

});

require __DIR__.'/auth.php';
