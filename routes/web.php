<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

    Route::get('/about', [FrontendController::class, 'about'])->name('about-us');
    Route::get('/contact', [FrontendController::class, 'contact'])->name('contact-us');
    Route::get('/services', [FrontendController::class, 'services'])->name('our-services');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
