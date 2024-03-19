<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('clientdashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/order', function () {
//     return view('client.order');
// })->middleware(['auth', 'verified'])->name('order');
Route::get('/order', [App\Http\Controllers\OrderController::class, 'show_order'])->name('order');
Route::get('/units', [App\Http\Controllers\UnitsController::class, 'show_units'])->name('units');

Route::get('/edit', function () {
    return view('client.editorder');
})->middleware(['auth', 'verified'])->name('editorder');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
