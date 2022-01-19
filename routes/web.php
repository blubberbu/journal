<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EntryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [UserController::class, 'home']);

Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [UserController::class, 'registerPage']);
Route::post('/register', [UserController::class, 'register']);

Route::group(['middleware' => ['auth']], function() {
    Route::get('/search', [EntryController::class, 'search']);
    Route::get('/new-entry', [EntryController::class, 'addEntryPage']);
    Route::get('/entry/{id}', [EntryController::class, 'viewEntry']);
    Route::post('/new-entry', [EntryController::class, 'addEntry']);
    Route::delete('/entry/{id}', [EntryController::class, 'deleteEntry']);
    Route::get('/logout', [AuthController::class, 'logout']);
});