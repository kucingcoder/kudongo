<?php

use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

// fallback
Route::fallback(function () {
    return redirect()->route('home');
});

// landing
Route::get('/', [LandingController::class, 'home'])->name('home');
Route::get('/projects', [LandingController::class, 'projects'])->name('projects');
Route::get('/skills', [LandingController::class, 'skills'])->name('skills');
Route::get('/certificates', [LandingController::class, 'certificates'])->name('certificates');
Route::get('/experiences', [LandingController::class, 'experiences'])->name('experiences');
Route::get('/educations', [LandingController::class, 'educations'])->name('educations');

// utility
Route::post('/send-message', [LandingController::class, 'send_message'])->name('send_message');
