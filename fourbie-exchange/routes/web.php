<?php

use Illuminate\Support\Facades\Route;

/** temp frontend routes for joel's building stuff */

Route::get('/', function () {
    return view('listings.index');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/listings', function () {
    return view('listings.index');
})->name('listings');

Route::get('/listings/show', function () {
    return view('listings.show');
})->name('listings.show');

Route::get('/listings/create', function () {
    return view('listings.create');
})->name('listings.create');

Route::get('/listings/edit', function ($listing) {
    return view('listings.edit', ['listing' => $listing]);
})->name('listings.edit');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');


