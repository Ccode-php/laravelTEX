<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\CheckRole;
use App\Models\Application;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;





Route::middleware('auth')->group(function () {
    Route::get('/', [MainController::class, 'dashboard'])->name('dashboard');
    Route::get('applications/{application}/answer', [AnswerController::class, 'create'])->name('answers.create')->middleware(CheckRole::class);
    Route::post('applications/{application}/answer', [AnswerController::class, 'store'])->name('answers.store')->middleware(CheckRole::class);
    Route::resource('applications', ApplicationController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
