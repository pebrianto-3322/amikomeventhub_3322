<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\EventController as EventAdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\WelcomeController;

Route::get('/', [WelcomeController::class, 'index']);

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('events', EventAdminController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('partners', PartnerController::class);
});