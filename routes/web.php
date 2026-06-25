<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Admin\EventController as EventAdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AuthController;

// ==================== RUTE USER AREA (BEBAS AKSES) ====================
Route::get('/', [WelcomeController::class, 'index'])->name('home');
Route::get('/event/{id}', [EventController::class, 'show'])->name('events.show');
Route::get('/checkout/{id}', [EventController::class, 'checkout'])->name('checkout');
Route::get('/my-ticket', [EventController::class, 'ticket'])->name('ticket');

// Jika ada yang akses /login biasa, lempar ke rute login milik admin
Route::get('/login', function () {
    return redirect()->route('admin.login');
})->name('login');


// ==================== RUTE ADMIN AREA (GROUPING) ====================
Route::prefix('admin')->name('admin.')->group(function () {
    
    // 1. Rute Auth Admin (Bisa diakses sebelum login)
    Route::get('login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.post');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
 
    // 2. Mengamankan Rute Administrasi di balik tembok Middleware ('auth' dan 'admin')
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('events', EventAdminController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('partners', PartnerController::class);
        Route::get('transactions', function() {
            return view('admin.transactions');
        })->name('transactions.index');
    });
});