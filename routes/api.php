<?php

use App\Http\Controllers\GithubUserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('users')->group(function () {
    Route::get('/{userName}', [GithubUserController::class, 'userData']);
    Route::get('/{userName}/details', [GithubUserController::class, 'userDataDetails']);
    Route::get('/{userName}/repos', [GithubUserController::class, 'userReposData']);
    Route::get('/{userName}/repos/{repository}/details', [GithubUserController::class, 'userReposDataDetails']);
});