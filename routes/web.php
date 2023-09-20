<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RecapsController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::resource('/dashboard/transactions', TransactionController::class)->except('show')->middleware('auth');

Route::get('/dashboard/recaps', [RecapsController::class, 'index'])->middleware('auth');

Route::get('/dashboard/users', function () {
    return view('dashboard.users.index');
})->middleware('auth');

