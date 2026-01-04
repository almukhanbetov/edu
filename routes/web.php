<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\CourseController;
use App\Http\Controllers\Admin\CourseAdminController;
use App\Http\Controllers\Admin\LessonAdminController;
use App\Http\Controllers\Public\LessonController;
use App\Http\Controllers\Public\LessonProgressController;
use App\Models\User;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/{slug}', [CourseController::class, 'show'])->name('courses.show');

Route::middleware(['auth'])->group(function () {
    Route::get('/lesson/{lesson}', [LessonController::class, 'show'])
        ->name('lesson.show');
});
Route::middleware('auth')
    ->post('/lessons/{lesson}/complete', [LessonProgressController::class, 'complete'])
    ->name('lessons.complete');
Route::get('/users', function () {
    return User::select('id', 'name')->get();
});
// routes/web.php
Route::post('/profile/avatar', [ProfileController::class, 'updateAvatar'])
    ->middleware('auth')
    ->name('profile.avatar');
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->middleware('role:admin')
        ->name('dashboard');
    Route::resource('courses', CourseAdminController::class);
    Route::resource('courses.lessons', LessonAdminController::class);
});
Route::post('/profile/update', [ProfileController::class, 'update'])
    ->middleware('auth');                                                                                                                                                                                                                                                                                                        

Route::middleware('auth')->group(function () {
    Route::get('/profile.show', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile.edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile.update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile.delete', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
