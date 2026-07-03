<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CheckoutController; 
use App\Http\Controllers\Admin\EventController as EventAdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\TransactionController as TransactionAdminController; 

// ==================== RUTE USER AREA (BEBAS AKSES) ====================
Route::get('/', [WelcomeController::class, 'index'])->name('home');

// MODIFIKASI PERTEMUAN 9 & 10: Mengarahkan detail ke route dinamis model binding atau controller yang bener
Route::get('/event/{event}', [EventController::class, 'show'])->name('events.show');

// MODIFIKASI PERTEMUAN 10: Mengarahkan form checkout ke CheckoutController yang baru kita bikin
Route::get('/checkout/{event}', [CheckoutController::class, 'create'])->name('checkout.create');
Route::post('/checkout/{event}', [CheckoutController::class, 'store'])->name('checkout.store');
// Rute untuk memunculkan halaman tombol bayar popup Midtrans
Route::get('/payment/{order_id}', [CheckoutController::class, 'payment'])->name('checkout.payment');
// Rute penangkap arah ulang ketika pembayaran sukses dilakukan
Route::get('/success/{order_id}', [CheckoutController::class, 'success'])->name('checkout.success');

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
        
        // MODIFIKASI PERTEMUAN 10: Mengaktifkan Laporan Transaksi Admin yang asli (Bukan return view dummy lagi)
        Route::get('transactions', [TransactionAdminController::class, 'index'])->name('transactions.index');
    });
});