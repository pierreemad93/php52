<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostCommentController;
use App\Http\Controllers\Admin\CommentReplyController;

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


Route::middleware(['auth' , 'isAdmin'])->prefix('admin')->group(function(){

 Route::get('/' , [DashboardController::class , 'index'])->name('dashboard');
 
 Route::get('/user/pdf' , [UserController::class , 'userPdf'])->name('userpdf');
 Route::get('/user/export' , [UserController::class , 'export'])->name('user.export');
 Route::get('/user/import' , [UserController::class , 'emportView'])->name('user.importview');
 Route::post('/user/import' , [UserController::class , 'emport'])->name('user.import');
 Route::get('/user/post/{id}' , [UserController::class , 'showposts'])->name('user.posts');
 Route::resource('/user' , UserController::class);
 Route::resource('/role' , RoleController::class);
 Route::resource('/post' , PostController::class);
 Route::resource('/comment' , PostCommentController::class);
 Route::resource('/post/reply' , CommentReplyController::class); 
});