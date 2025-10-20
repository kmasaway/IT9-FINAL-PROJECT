<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
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

Route::get('/venues', function () {
    return view('venues');
})->name('venues');
