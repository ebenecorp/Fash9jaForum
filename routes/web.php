<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\RepliesController;
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

Auth::routes(['verify'=> true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('discussion', DiscussionController::class);

Route::resource('discussion/{discussion}/replies', RepliesController::class);

Route::post('discussion/{discussion}/replies/{reply}/mark-as-bast-reply', [DiscussionController::class, 'bestReply'])->name('discussion.bestReply');

Route::get('user/notification', [UserController::class, 'notifications'])->name('user.notifications');