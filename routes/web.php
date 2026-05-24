<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\EventController as EventAdminController;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('events', EventAdminController::class);
});