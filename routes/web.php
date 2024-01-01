<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Http\Request;


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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.landing_page');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/posts/{slug}', [HomeController::class, 'postDetails'])->name('post.details');
Route::get('/categories/{slug}', [HomeController::class, 'index'])->name('categories.slug');
Route::get('/{key}', [HomeController::class, 'getPostsByKey'])->name('posts.key');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin')->group(function () {
        Route::prefix('tags')->group(function () {
            Route::get('/', [TagController::class, 'index'])->name('tags.index');
            Route::get('/create', [TagController::class, 'create'])->name('tags.create');
            Route::post('/store', [TagController::class, 'store'])->name('tags.store');
            Route::get('/view/{id}', [TagController::class, 'show'])->name('tags.view');
            Route::get('/edit/{id}', [TagController::class, 'edit'])->name('tags.edit');
            Route::post('/update/{id}', [TagController::class, 'update'])->name('tags.update');
            Route::delete('/delete/{id}', [TagController::class, 'destroy'])->name('tags.delete');
        });

        Route::prefix('categories')->group(function () {
            Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
            Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
            Route::post('/store', [CategoryController::class, 'store'])->name('categories.store');
            Route::get('/view/{id}', [CategoryController::class, 'show'])->name('categories.view');
            Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
            Route::post('/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
            Route::delete('/delete/{id}', [CategoryController::class, 'destroy'])->name('categories.delete');
        });

        Route::prefix('posts')->group(function () {
            Route::get('/', [PostController::class, 'index'])->name('posts.index');
            Route::get('/create', [PostController::class, 'create'])->name('posts.create');
            Route::post('/store', [PostController::class, 'store'])->name('posts.store');
            Route::get('/view/{id}', [PostController::class, 'show'])->name('posts.view');
            Route::get('/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');
            Route::put('/update/{id}', [PostController::class, 'update'])->name('posts.update');
            Route::delete('/delete/{id}', [PostController::class, 'destroy'])->name('posts.delete');
            Route::post('/upload-post-image', [PostController::class, 'uploadPostImage'])->name('upload.image');
            Route::patch('/update-publish/{id}', [PostController::class, 'updatePublish'])->name('posts.publish');
        });

        Route::prefix('settings')->group(function () {
            Route::get('/create', [SettingController::class, 'create'])->name('settings.create');
            Route::post('/store', [SettingController::class, 'store'])->name('settings.store');
        });
    });

});
require __DIR__.'/auth.php';
