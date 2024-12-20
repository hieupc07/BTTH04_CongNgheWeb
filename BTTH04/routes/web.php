<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IssueController;

    Route::prefix('issues')->group(function () {
        Route::get('/', [IssueController::class, 'index'])->name('issues.index');
        Route::get('/create', [IssueController::class, 'create'])->name('issues.create');
        Route::post('/', [IssueController::class, 'store'])->name('issues.store');
        Route::get('/{issue}/edit', [IssueController::class, 'edit'])->name('issues.edit');
        Route::put('/{issue}', [IssueController::class, 'update'])->name('issues.update');
        Route::delete('/{issue}', [IssueController::class, 'destroy'])->name('issues.destroy');
    });