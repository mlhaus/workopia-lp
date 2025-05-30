<?php

use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'welcome'])->name('home'); //->middleware(LogRequest::class);
Route::resource('jobs', JobController::class)->middleware('auth')->only(['create', 'store', 'edit', 'update', 'destroy']);
Route::resource('jobs', JobController::class)->except(['create', 'store', 'edit', 'update', 'destroy']);

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'register'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/bookmarks',[BookmarkController::class, 'index'])->name('bookmarks');
    Route::post('/bookmarks/{job}',[BookmarkController::class, 'store'])->name('bookmarks.store');
    Route::delete('/bookmarks/{job}',[BookmarkController::class, 'destroy'])->name('bookmarks.destroy');
});

Route::post("/jobs/{job}/apply", [ApplicantController::class, 'store'])->name('applicants.store');
Route::delete("/applicants/{applicant}", [ApplicantController::class, 'destroy'])->name('applicants.destroy')->middleware('auth');

Route::get("/users", [UserController::class, 'index'])->name('users.index')->middleware("can:view-all-users");
Route::delete("/users/{user}", [UserController::class, 'destroy'])->name('users.destroy')->middleware("can:delete-users");
