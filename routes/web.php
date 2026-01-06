<?php
use App\Http\Controllers\VideoRoomController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\CourseController;
use App\Http\Controllers\Admin\CourseAdminController;
use App\Http\Controllers\Admin\LessonAdminController;
use App\Http\Controllers\Public\LessonController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\Public\LessonProgressController;
use App\Models\User;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/{slug}', [CourseController::class, 'show'])->name('courses.show');
Route::middleware('auth')->group(function () {
    Route::get('/meeting/lesson/{id}', [\App\Http\Controllers\MeetingController::class, 'show'])
        ->name('meeting.show');

    Route::post('/meeting/join', [\App\Http\Controllers\MeetingController::class, 'join'])
        ->name('meeting.join');
});
Route::middleware('auth')
    ->prefix('profile/videoconf')
    ->name('videoconf.')
    ->group(function () {

        // список комнат
        Route::get('/', [VideoRoomController::class, 'index'])
            ->name('index');

        // форма создания комнаты (для учителя)
        Route::get('/create', [VideoRoomController::class, 'create'])
            ->name('create');

        // сохранение комнаты
        Route::post('/', [VideoRoomController::class, 'store'])
            ->name('store');

        // просмотр / вход в комнату
        Route::get('/{room}', [VideoRoomController::class, 'show'])
            ->name('show');
    });
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

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
Route::prefix('profile')->name('profile.')->middleware('auth')->group(function () {
   Route::resource('/', ProfileController::class);     
});
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->middleware('role:admin')
        ->name('dashboard');
    Route::resource('courses', CourseAdminController::class);
    Route::resource('courses.lessons', LessonAdminController::class);
});
                                                                                                                                                                                                                                                                                             


require __DIR__.'/auth.php';
