<?php

use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/myevent', function () {
    return view('myevent');
})->name('myevent');

Route::get('/logout', function () {
    return view('logout');
})->name('logout');

Route::get('/venue', function () {
    return view('venue');
})->name('venue');

Route::get('/equipment', function () {
    return view('equipment');
})->name('equipment');

Route::get('/report', function () {
    return view('report');
})->name('report');