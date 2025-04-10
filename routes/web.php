<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\TermsController;
use App\Http\Controllers\PersonalNoteController;
use App\Http\Controllers\MyPageController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\NotificationController;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/search', [SearchController::class, 'search'])->name('search');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/')->with('success', 'ログアウトしました。');
})->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'showProfileView'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/personal-notes/create', [PersonalNoteController::class, 'create'])->name('personal-notes.create');
    Route::post('/personal-notes', [PersonalNoteController::class, 'store'])->name('personal-notes.store');
    Route::get('/personal-notes/{personalNote}/edit', [PersonalNoteController::class, 'edit'])->name('personal-notes.edit');
    Route::put('/personal-notes/{personalNote}', [PersonalNoteController::class, 'update'])->name('personal-notes.update');
    Route::delete('/personal-notes/{personalNote}', [PersonalNoteController::class, 'destroy'])->name('personal-notes.destroy');
});

Route::get('/contact', [ContactController::class, 'showContactForm'])->name('contact');
Route::post('/contact', [ContactController::class, 'sendContact']);

Route::get('/settings', [SettingsController::class, 'showSettingsForm'])->name('settings');
Route::post('/settings', [SettingsController::class, 'updateSettings']);

Route::get('/create-personal-note', [PersonalNoteController::class, 'create'])->name('create-personal-note');
Route::post('/create-personal-note', [PersonalNoteController::class, 'store'])->name('create-personal-note');

Route::get('/terms', [TermsController::class, 'show'])->name('terms');

Route::get('/mypage', [MyPageController::class, 'index'])->name('mypage')->middleware('auth');
Route::get('/mypage/edit', [MyPageController::class, 'edit'])->name('mypage.edit')->middleware('auth');

Route::middleware('auth')->group(function () {
  Route::get('/notifications', [NotificationController::class, 'index']);
  Route::post('/notifications/{id}/read', [NotificationController::class, 'markAsRead']);
  Route::post('/notifications/read-all', [NotificationController::class, 'markAllAsRead']);
});

Route::resource('posts', PostController::class)->except(['show']);
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
// Postの追加アクション
Route::prefix('posts/{post}')->group(function () {
    Route::get('delete', [PostController::class, 'delete'])->name('posts.delete');
    Route::get('restore', [PostController::class, 'restore'])->name('posts.restore');
    Route::get('forceDelete', [PostController::class, 'forceDelete'])->name('posts.forceDelete');

    // コメント関連のルート
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

        // 返信関連のルート
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
