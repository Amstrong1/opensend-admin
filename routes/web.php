<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CashinController;
use App\Http\Controllers\CashoutController;
use App\Http\Controllers\InteracController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransfertController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->middleware(['auth', 'verified']);

Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('/chat', ChatController::class);
    Route::resource('/user', UserController::class);
    Route::resource('/cashin', CashinController::class);
    Route::resource('/cashout', CashoutController::class);
    Route::resource('/transfert', TransfertController::class);
    
    Route::get('/interac-depot', [InteracController::class, 'indexDepot'])->name('interac.depot');
    Route::get('/interac-retrait', [InteracController::class, 'indexRetrait'])->name('interac.retrait');
    Route::resource('/interac', InteracController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
