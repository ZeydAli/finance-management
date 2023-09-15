<?php

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
    return view('admin.index');
});

Route::get('/transactions', function () {
    return view('admin.transactions.index');
});

Route::get('/recaps', function () {
    return view('admin.recaps.index');
});

Route::get('/users', function () {
    return view('admin.users.index');
});

