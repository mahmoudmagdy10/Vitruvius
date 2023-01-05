<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\UserController;

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
    return view('welcome');
});

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('check_auth', [LoginController::class, 'check_auth'])->name('check_auth');

Route::namespace('App\Http\Controllers\Auth\RegisterController')->group(function(){
    Route::post('/register', [RegisterController::class,'createUser'])->name('createUser');
    Route::get('/register', [RegisterController::class,'registerForm'])->name('register');

});

Route::namespace('App\Http\Controllers\Auth\LoginController')->middleware('auth')->group(function(){
    Route::get('logout', [LoginController::class, 'logout']);
});

Route::namespace('App\Http\Controllers\PagesController')->middleware('auth')->group(function(){
    Route::get('homepage', [PagesController::class, 'homepage'])->name('homepage');
    Route::get('explore', [PagesController::class, 'explore'])->name('explore');
    Route::get('profile', [PagesController::class, 'profile'])->name('profile');

});
Route::namespace('App\Http\Controllers\UserController')->middleware('auth')->group(function(){
    Route::get('showProfilePage', [UserController::class, 'showProfilePage'])->name('user.showProfilePage');
    Route::get('editProfilePage', [UserController::class, 'editProfilePage'])->name('user.editProfilePage');
    Route::post('updateProfilePicture', [UserController::class, 'updateProfilePicture'])->name('user.updateProfilePicture');
    Route::post('updateUserData', [UserController::class, 'updateUserData'])->name('user.updateUserData');
    Route::post('updateUserPassword', [UserController::class, 'updateUserPassword'])->name('user.updateUserPassword');

});

Route::namespace('App\Http\Controllers\ProjectController')->middleware('auth')->group(function(){
    Route::get('upload', [ProjectController::class, 'showUploadProject'])->name('upload');
    Route::post('save_upload', [ProjectController::class, 'save_upload'])->name('save_upload');
    Route::get('Your_Projects', [ProjectController::class, 'showProject'])->name('show_project');
    Route::get('Project_Details/{id}', [ProjectController::class, 'customerProjectDetails'])->name('project_details');
    Route::get('contractor_project_details/{id}', [ProjectController::class, 'contractorprojectDetails'])->name('contractor_project_details');
    Route::get('Delete_Project/{id}', [ProjectController::class, 'DeleteProject'])->name('delete_project');

});

Route::namespace('App\Http\Controllers\CommentController')->middleware('auth')->group(function(){
    Route::post('add_comment/{id}', [CommentController::class, 'store'])->name('add_comment');
    Route::post('update_comment/{id}', [CommentController::class, 'update'])->name('update_comment');
    Route::get('delete_comment/{id}', [CommentController::class, 'destroy']);

});
Route::namespace('App\Http\Controllers\ReplyController')->middleware('auth')->group(function(){
    Route::post('add_reply', [ReplyController::class, 'store'])->name('add_reply');
    Route::post('update_reply/{id}', [ReplyController::class, 'update'])->name('update_reply');
    Route::get('delete_reply/{id}', [ReplyController::class, 'destroy']);

});


