<?php

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

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/', [\App\Http\Controllers\AuthManager::class, 'login']) -> name('login');
Route::post('/', [\App\Http\Controllers\AuthManager::class, 'loginPost']) -> name('login.post');
Route::get('/register', [\App\Http\Controllers\AuthManager::class, 'register'])->name('register');
Route::post('/register', [\App\Http\Controllers\AuthManager::class, 'registerPost']) -> name('register.post');
Route::get('/logout', [\App\Http\Controllers\AuthManager::class, 'logout'])->name('logout');

Route::get('/profile', [\App\Http\Controllers\TaskController::class, 'profile']) -> name('profile');
Route::get('/new', [\App\Http\Controllers\TaskController::class, 'new']) -> name('new');




Route::post('/new', [\App\Http\Controllers\NoteController::class, 'store'])->name('add-note');
Route::get('/profile', [\App\Http\Controllers\NoteController::class, 'showAllNotes'])->name('profile');


Route::get('/notes/{id}', [\App\Http\Controllers\NoteController::class, 'show'])->name('note.show');
Route::delete('/notes/{id}', [\App\Http\Controllers\NoteController::class, 'destroy'])->name('note.destroy');

Route::put('/notes/{id}', [\App\Http\Controllers\NoteController::class, 'update'])->name('note.update');





Route::get('/profile', [\App\Http\Controllers\AuthManager::class, 'profile'])->name('profile');

Route::get('/logout', [\App\Http\Controllers\AuthManager::class, 'logout'])->name('logout');



