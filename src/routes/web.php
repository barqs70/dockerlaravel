<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/app', function () {
    return view('layouts.app');
});
// Route::livewire('/', 'pages::auth.login')->name('login');

Route::get('/tes', function () {
    return 'Helloasdasd Worlasdasdsad!';
});
