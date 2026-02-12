<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PatientDetailController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\GalleryCategoryController;
use App\Http\Controllers\GalleryImageController;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Cache;
use App\Services\SitemapService;

Route::get('/sitemap.xml', function () {
    return Cache::remember('sitemap.xml', 3600, function () {
        return response(
            SitemapService::generate(),
            200,
            ['Content-Type' => 'application/xml']
        );
    });
});




Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/about', [FrontendController::class, 'about'])->name('about-us');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact-us');
Route::get('/services', [FrontendController::class, 'services'])->name('our-services');
Route::get('/services/{service}', [FrontendController::class, 'showService'])->name('service.show');
Route::get('/events', [FrontendController::class, 'events'])->name('events.list');
Route::get('/events/{event}', [FrontendController::class, 'showEvent'])->name('events.show');
Route::get('/staff', [FrontendController::class, 'team'])->name('our-team');
Route::get('/staff/{slug}', [FrontendController::class, 'showStaff'])->name('staff.show');
Route::get('/resources', [FrontendController::class, 'resources'])->name('resources');
Route::get('/book-appointment', [FrontendController::class, 'appointment'])->name('book-appointment');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
Route::get('/gallery/category/{slug}', [GalleryController::class, 'category'])->name('gallery.category');
Route::get('/gallery/load', [GalleryController::class, 'loadAll'])->name('gallery.load');
Route::get('/gallery/category/{slug}/load', [GalleryController::class, 'loadCategory'])->name('gallery.category.load');


 Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth', 'verified'])->group(function () {

    // ----------------------
    // User Routes
    // ----------------------
    Route::middleware('role:user')->prefix('user')->name('user.')->group(function () {
        Route::get('/appointments', [AppointmentController::class, 'indexUser'])->name('appointments.index');
        Route::get('/appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');
        Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');
        Route::get('/appointments/{appointment}/edit', [AppointmentController::class, 'edit'])->name('appointments.edit');
        Route::put('/appointments/{appointment}', [AppointmentController::class, 'update'])->name('appointments.update');
        Route::get('/patient-details', [PatientDetailController::class, 'edit'])->name('patient-details.edit');
        Route::put('/patient-details', [PatientDetailController::class, 'update'])->name('patient-details.update');
    });




    // ----------------------
    // Admin Routes
    // ----------------------
    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
       

        // Appointments
        Route::get('/appointments', [AppointmentController::class, 'indexAdmin'])->name('appointments.index');
        Route::put('/appointments/{appointment}/status', [AppointmentController::class, 'updateStatus'])->name('appointments.updateStatus');

        // Reports
        Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');

        // Services CRUD
        Route::prefix('services')->name('services.')->group(function () {
            Route::get('/', [ServicesController::class, 'index'])->name('index');
            Route::get('/create', [ServicesController::class, 'create'])->name('create');
            Route::post('/store', [ServicesController::class, 'store'])->name('store');
            Route::get('/{service}/edit', [ServicesController::class, 'edit'])->name('edit');
            Route::put('/{service}', [ServicesController::class, 'update'])->name('update');
            Route::delete('/{service}', [ServicesController::class, 'destroy'])->name('destroy');
            Route::get('/{service}', [ServicesController::class, 'show'])->name('show');
        });

        // Staff, Users, Events
        Route::resource('staff', StaffController::class);
        Route::get('/users/admins', [UserController::class, 'admins'])->name('users.admins');
        Route::get('/users/patients', [UserController::class, 'patients'])->name('users.patients');
        Route::resource('users', UserController::class);
        Route::resource('events', EventController::class);

        // Gallery
        Route::prefix('gallery')->name('gallery.')->group(function () {
            Route::prefix('categories')->name('categories.')->group(function () {
                Route::get('/', [GalleryCategoryController::class, 'index'])->name('index');
                Route::get('/create', [GalleryCategoryController::class, 'create'])->name('create');
                Route::post('/', [GalleryCategoryController::class, 'store'])->name('store');
                Route::get('/{category}/edit', [GalleryCategoryController::class, 'edit'])->name('edit');
                Route::put('/{category}', [GalleryCategoryController::class, 'update'])->name('update');
                Route::delete('/{category}', [GalleryCategoryController::class, 'destroy'])->name('destroy');
            });

            Route::prefix('images')->name('images.')->group(function () {
                Route::get('/', [GalleryImageController::class, 'index'])->name('index');
                Route::get('/create', [GalleryImageController::class, 'create'])->name('create');
                Route::post('/', [GalleryImageController::class, 'store'])->name('store');
                Route::put('/{image}', [GalleryImageController::class, 'update'])->name('update');
                Route::delete('/{image}', [GalleryImageController::class, 'destroy'])->name('destroy');
            });
        });

       
    });


     // Profile
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});


require __DIR__ . '/auth.php';
