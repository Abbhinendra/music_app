<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\AdminalbumController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CheckLoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\SongController;
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/album',[AlbumController::class,'index'])->name('album');

Route::resource('songs', AlbumController::class);

Route::get('/contact',function(){
    return view('contact');
})->name('contact');

Route::get('/aboutme',function(){
    return view('aboutme');
})->name('aboutme');
Route::get('/admin/album.index',function(){
    return view('admin.album.index');
})->name('mainpage');

Route::resource('/admin/album', AdminalbumController::class);
Route::get('/logout',[LogoutController::class,'logout'])->name('logout');
Route::get('/admin.album.all',[AdminalbumController::class,'index'])->name('all')->middleware('login');
Route::resource('music', SongController::class);
