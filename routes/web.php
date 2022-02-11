<?php

use App\Http\Controllers\PostsController;
use App\Models\Posts;
use Illuminate\Support\Facades\Route;
Auth::routes();


Route::get('/', function () {
    return view('welcome')->with('posts', Posts::orderBy('created_at','desc')->paginate(9));
});
//google login
Route::get('/auth/google', [\App\Http\Controllers\SocialController::class, 'redirect'])->name('google.login');
Route::get('/auth/google/callback', [\App\Http\Controllers\SocialController::class, 'callback']);

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/home/desc', [App\Http\Controllers\HomeController::class, 'sortDesc'])->name('desc');
    Route::get('/home/asc', [App\Http\Controllers\HomeController::class, 'sortAsc'])->name('asc');
    Route::get('/create/post', [App\Http\Controllers\PostsController::class, 'index'])->name('create');
    Route::get('/import', [App\Http\Controllers\PostsFromApi::class, 'list'])->name('createList');
    Route::post('/createPost', [App\Http\Controllers\PostsController::class, 'storepost']);
});
