<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\AuthController;

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

Route::get('/listings/create', [ListingController::class, 'create'])->name('listings.create');
Route::post('/listings/create', [ListingController::class, 'submitCreate'])->name('listings.submitCreate');

Route::get('/listings/edit', function ($listing) {
    return view('listings.edit', ['listing' => $listing]);
})->name('listings.edit');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');



/**
 * User Routes
 */
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'submitLogin'])->name('login.submit');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');



/**
 * Admin Routes
 */
Route::middleware(['auth'])->group(function() {
    Route::prefix('admin')->group(function () {
        Route::get('/listings', [ListingController::class, 'viewAll'])->name('admin.listings');
        Route::get('/listings/{id}', [ListingController::class, 'adminShow'])->name('admin.listings.show');
    });
});