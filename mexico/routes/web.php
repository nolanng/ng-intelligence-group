<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

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

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

use App\Http\Controllers\PasswordResetController;
Route::post('/forgot-password', [PasswordResetController::class, 'sendResetLinkEmail'])->middleware('throttle:10,1')->name('password.email');
Route::get('/reset-password/{token}', [PasswordResetController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [PasswordResetController::class, 'reset'])->name('password.update');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard'); // Assuming a dashboard view exists
    })->middleware('can:users.view');
    
    Route::apiResource('contents', App\Http\Controllers\ContentController::class);
    
    Route::post('/contents/{content}/submit', [App\Http\Controllers\ContentController::class, 'submitForReview'])->middleware('can:update,content');
    Route::post('/contents/{content}/approve', [App\Http\Controllers\ContentController::class, 'approve'])->middleware('can:publish,content');
    Route::post('/contents/{content}/schedule', [App\Http\Controllers\ContentController::class, 'schedule'])->middleware('can:publish,content');
    Route::post('/contents/{content}/publish', [App\Http\Controllers\ContentController::class, 'publish'])->middleware('can:publish,content');
    Route::post('/contents/{content}/archive', [App\Http\Controllers\ContentController::class, 'archive'])->middleware('can:publish,content');
});
