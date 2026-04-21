<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReportController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('register');
});

Route::get('/dashboard', function () {
    return redirect()->route('reports.index');
})->middleware(['auth'])->name('dashboard');

Route::middleware((Admin::class))->group(function(){
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
         Route::patch('/reports/status/{report}/', [ReportController::class, 'statusUpdate'])
                    ->name('reports.status.update');
});
require __DIR__.'/auth.php';
