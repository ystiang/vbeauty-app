<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommissionController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('HomeView', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});



Route::resource('accounts', UserController::class);
Route::resource('commissions', CommissionController::class);
Route::resource('calculation', PackageController::class);




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::middleware('auth')->group(function () {
//     Route::get('/accounts', [UserController::class, 'index'])->name('accounts');
//     Route::get('/commissions', [CommissionController::class, 'index'])->name('commissions');
    
// });

// Route::get('/accounts', function () {
//     return Inertia::render('AccountList');
// })->name('accounts');
// Route::get('/commissions', function () {
//     return Inertia::render('AccountList');
// })->name('commissions');


require __DIR__.'/auth.php';
