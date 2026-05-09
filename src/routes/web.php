<?php

use Illuminate\Support\Facades\Route;


Route::livewire('/', 'pages::auth.login')->name('login');


Route::livewire('/admin', 'pages::admin.idx')->name('admin'); 
Route::livewire('/admin/client', 'pages::admin.client.idx')->name('admin.client');
Route::livewire('/admin/gedung', 'pages::admin.gedung.idx')->name('admin.gedung');
Route::livewire('/admin/operator', 'pages::admin.operator.idx')->name('admin.operator');
Route::livewire('/admin/maintenance', 'pages::admin.maintenance.idx')->name('admin.maintenance');
Route::livewire('/admin/viewer', 'pages::admin.viewer.idx')->name('admin.viewer');

Route::livewire('/maintenance', 'pages::maintenance.dashboard')->name('maintenance.work');
Route::livewire('/operator', 'pages::operator.dashboard')->name('operator.work');
Route::livewire('/viewer', 'pages::viewer.dashboard')->name('viewer.work');

Route::livewire('/client', 'pages::client.idx')->name('client');


Route::middleware('auth')->prefix('client')->name('client.')->group(function () {
    Route::livewire('/dashboard', 'pages::client.gedung.idx')->name('dashboard');
    Route::livewire('/staf', 'pages::client.staf.idx')->name('staf');
    Route::livewire('/akun', 'pages::client.akun.idx')->name('akun');
});
