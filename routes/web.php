<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController\ContactController;
use App\Http\Controllers\PostController\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController\ProfileController;
use App\Http\Controllers\SettingsController\SettingsController;
use App\Http\Controllers\TermsController\TermsController;
use App\Http\Controllers\PersonalNoteController;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
Route::post('/profile', [ProfileController::class, 'update']);

Route::get('/contact', [ContactController::class, 'showContactForm'])->name('contact');
Route::post('/contact', [ContactController::class, 'sendContact']);

Route::get('/settings', [SettingsController::class, 'showSettingsForm'])->name('settings');
Route::post('/settings', [SettingsController::class, 'updateSettings']);

Route::get('/create-personal-note', [PersonalNoteController::class, 'create'])->name('create-personal-note');
Route::post('/create-personal-note', [PersonalNoteController::class, 'store'])->name('create-personal-note');

Route::get('/terms', [TermsController::class, 'show'])->name('terms');

Route::resource('posts', PostController::class)->except(['show']);
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::prefix('posts/{post}')->group(function () {
    Route::get('delete', [PostController::class, 'delete'])->name('posts.delete');
    Route::get('restore', [PostController::class, 'restore'])->name('posts.restore');
    Route::get('forceDelete', [PostController::class, 'forceDelete'])->name('posts.forceDelete');

    Route::prefix('comments')->group(function () {
        Route::get('/', [PostController::class, 'comments'])->name('posts.comments');
        Route::get('create', [PostController::class, 'createComment'])->name('posts.comments.create');
        Route::post('/', [PostController::class, 'storeComment'])->name('posts.comments.store');
        Route::get('{comment}', [PostController::class, 'showComment'])->name('posts.comments.show');
        Route::get('{comment}/edit', [PostController::class, 'editComment'])->name('posts.comments.edit');
        Route::put('{comment}', [PostController::class, 'updateComment'])->name('posts.comments.update');
        Route::delete('{comment}', [PostController::class, 'destroyComment'])->name('posts.comments.destroy');
        Route::get('{comment}/delete', [PostController::class, 'deleteComment'])->name('posts.comments.delete');
        Route::get('{comment}/restore', [PostController::class, 'restoreComment'])->name('posts.comments.restore');
        Route::get('{comment}/forceDelete', [PostController::class, 'forceDeleteComment'])->name('posts.comments.forceDelete');

        Route::prefix('{comment}/replies')->group(function () {
            Route::get('/', [PostController::class, 'replies'])->name('posts.comments.replies');
            Route::get('create', [PostController::class, 'createReply'])->name('posts.comments.replies.create');
            Route::post('/', [PostController::class, 'storeReply'])->name('posts.comments.replies.store');
            Route::get('{reply}', [PostController::class, 'showReply'])->name('posts.comments.replies.show');
            Route::get('{reply}/edit', [PostController::class, 'editReply'])->name('posts.comments.replies.edit');
            Route::put('{reply}', [PostController::class, 'updateReply'])->name('posts.comments.replies.update');
            Route::delete('{reply}', [PostController::class, 'destroyReply'])->name('posts.comments.replies.destroy');
        });
    });
});
