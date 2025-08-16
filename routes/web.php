<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

    Route::get('/', [FrontendController::class, 'index'])->name('home');
    Route::get('/about', [FrontendController::class, 'about'])->name('about-us');
    Route::get('/contact', [FrontendController::class, 'contact'])->name('contact-us');
    Route::get('/services', [FrontendController::class, 'services'])->name('our-services');
    Route::get('/services/{service}', [FrontendController::class, 'showService'])->name('service.show');
    Route::get('/team', [FrontendController::class, 'team'])->name('our-team');
    Route::get('/resources', [FrontendController::class, 'resources'])->name('resources');
    Route::get('/book-appointment', [FrontendController::class, 'appointment'])->name('book-appointment');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {


// Services CRUD
Route::prefix('admin/services')->name('services.')->group(function () {
    Route::get('/', [ServicesController::class, 'index'])->name('index');           // List all services
    Route::get('/create', [ServicesController::class, 'create'])->name('create');   // Show create form
    Route::post('/store', [ServicesController::class, 'store'])->name('store');     // Handle create
    Route::get('/{service}/edit', [ServicesController::class, 'edit'])->name('edit');       // Show edit form
    Route::put('/{service}', [ServicesController::class, 'update'])->name('update');       // Handle update
    Route::delete('/{service}', [ServicesController::class, 'destroy'])->name('destroy'); // Delete a service
    Route::get('/{service}', [ServicesController::class, 'show'])->name('show');           // Optional: view single service
});



    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
