<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\BatchController;

Route::get('/', function () {
    return view('layout');
});
Route::resource('/students',StudentController::class);
Route::resource('/teachers',TeacherController::class);
Route::resource('/courses',CourseController::class);
Route::resource('/batches',BatchController::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
