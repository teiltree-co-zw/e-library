<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('teachers', TeacherController::class);
    Route::resource('students', StudentController::class);
    Route::resource('books', BookController::class);
    Route::resource('classes', GradeController::class);
    Route::resource('users', UserController::class);
    Route::resource('library', LibraryController::class);

});
