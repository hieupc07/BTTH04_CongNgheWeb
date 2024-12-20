<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IssueController;

// Route mặc định trỏ đến issues.index
Route::get('/', [IssueController::class, 'index'])->name('issues.index');

// Các route khác liên quan đến Issue
Route::resource('issues', IssueController::class);

