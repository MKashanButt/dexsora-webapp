<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])
    ->group(function () {
        Route::get('/', function () {
            return view('index');
        })
            ->name('dashboard');
        Route::controller(DataController::class)
            ->prefix('customers')
            ->group(function () {
                Route::get('/{status}', 'index')
                    ->name('index');
                Route::patch('/{data}', 'update')
                    ->name('update');
                Route::delete('/data/{data}/{field}/delete-file', [DataController::class, 'deleteFile'])
                    ->name('file.delete');
                Route::get('move/{data}', 'move')
                    ->name('move');
            });
    });


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
