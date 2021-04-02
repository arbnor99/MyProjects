<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RequestController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('index');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', function(){
    return view('index');
});


Route::post('registerI', [RegisterController::class, 'register'])->name('registerI');
Route::post('register_request', [RequestController::class, 'registerRequest'])->name('register_request');
Route::post('student_request', [RequestController::class, 'studentRequest'])->name('student_request');


Route::prefix('admin')->middleware('is_admin')->group(function(){
    Route::get('accept_user/{userRequest}', [AdminController::class, 'acceptUser'])->name('accept_user');
    Route::get('decline_user/{userRequest}', [AdminController::class, 'declineUser'])->name('decline_user');
    Route::get('delete_user/{user}', [AdminController::class, 'deleteUser'])->name('delete_user');
});

Route::prefix('admin/teacher')->middleware('is_teacher')->group(function(){
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('create_course{id?}', [AdminController::class, 'createCourse'])->name('create_course');
    Route::post('add_course', [AdminController::class, 'addCourse'])->name('add_course');
    Route::get('delete_course/{course}', [AdminController::class, 'deleteCourse'])->name('delete_course');
    Route::get('accept_student/{studentRequest}', [AdminController::class, 'acceptStudent'])->name('accept_student');
    Route::get('decline_student/{studentRequest}', [AdminController::class, 'declineStudent'])->name('decline_student');
    Route::get('delete_student/{student}', [AdminController::class, 'deleteStudent'])->name('delete_student');
    Route::get('delete_comment/{comment}', [AdminController::class, 'deleteComment'])->name('delete_comment');
});

Route::get('view_course/{course}', [CourseController::class, 'viewCourse'])->name('view_course');

Route::post('add_comment', [CommentController::class, 'addComment'])->name('add_comment');