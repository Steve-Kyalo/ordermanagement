<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('auth.login');
// });

Route::get('/dashboard', function () {
    return view('clientdashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/order', function () {
//     return view('client.order');
// })->middleware(['auth', 'verified'])->name('order');
Route::get('/order', [App\Http\Controllers\OrderController::class, 'show_order'])->name('order');
Route::post('/order', [App\Http\Controllers\OrderController::class, 'store_orders'])->name('store_orders');
Route::get('/order/{id}', [App\Http\Controllers\OrderController::class, 'edit_order'])->name('edit_order');
Route::get('/units', [App\Http\Controllers\UnitsController::class, 'show_units'])->name('units');
Route::get('/routes', [App\Http\Controllers\RoutesController::class, 'show_routes'])->name('routes');

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

Route::get('/', [App\Http\Controllers\AuthController::class, 'index'])->name('auth.index');

Route::prefix('accounts')->middleware('auth')->group(function ()
{
    Route::get('home', [App\Http\Controllers\AuthController::class, 'home'])->name('home');
});

require __DIR__.'/auth.php';
