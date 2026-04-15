<?php

use Illuminate\Support\Facades\Route;

// Rute Home Bawaan
Route::get('/', function () {
    return view('welcome');
});

// Rute Profil
Route::get('/profil', function () {
    return view('profil');
});

// Rute Katalog
Route::get('/katalog', function () {
    return view('katalog');
});

// Rute Bantuan
Route::get('/bantuan', function () {
    return view('bantuan');
});

// Rute Kontak (Berdasarkan instruksi modul sebelumnya)
Route::get('/kontak', function () {
    return view('contact');
});