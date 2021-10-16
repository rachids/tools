<?php

use App\Http\Controllers\DateToolsController;
use App\Http\Controllers\RandomController;
use Illuminate\Support\Facades\Route;

Route::prefix('date')->group(function () {
    Route::get('diff', [DateToolsController::class, 'diff'])->name('tools.date.diff');
    Route::get('counter', [DateToolsController::class, 'counter'])->name('tools.date.counter');
});


Route::prefix('random')->group(function () {
    Route::get('dice', [RandomController::class, 'dice'])->name('tools.random.dice');
    Route::get('pick', [RandomController::class, 'pick'])->name('tools.random.pick');
});
