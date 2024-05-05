<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\AuthController;

/** temp frontend routes for joel's building stuff */

Route::get('/', [ListingController::class, 'index'])->name('home');
Route::get('/listings', function() { return redirect('/'); })->name('listings');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/listings/show', function () {
    return view('listings.show');
})->name('listings.show');

Route::get('/listings/premium', function () {
    return view('listings.premium');
})->name('listings.premium');

Route::get('/listings/media', function () {
    return view('listings.media');
})->name('listings.media');

Route::get('/listings/create', [ListingController::class, 'create'])->name('listings.create');
Route::post('/listings/create', [ListingController::class, 'submitCreate'])->name('listings.submitCreate');

Route::get('/listings/edit', function ($listing) {
    return view('listings.edit', ['listing' => $listing]);
})->name('listings.edit');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

/** sellers/create */
Route::get('/sellers/create', function () {
    return view('sellers.create');
})->name('sellers.create');

/** sellers/index */
Route::get('/sellers', function () {
    $sellers = \App\Models\Dealer::paginate(50);
    return view('sellers.index')->with('sellers', $sellers);
})->name('sellers');


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