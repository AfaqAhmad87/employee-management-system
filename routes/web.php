<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;




Route::middleware('auth')->group(function () {
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
