<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', [\App\Http\Controllers\JobController::class, 'index']);
Route::get('/job-details/{id}', [\App\Http\Controllers\JobController::class, 'getDetails']);
Route::get('/search/', [\App\Http\Controllers\JobController::class, 'search'])->name('search');
Route::get('/job-offered/{id}', [\App\Http\Controllers\JobController::class, 'getOffered'])->middleware(['auth', 'company', 'user']);
Route::post('/create-job/{id}', [\App\Http\Controllers\JobController::class, 'store'])->middleware(['auth', 'company', 'user']);
Route::get('/create-job/{id}', [\App\Http\Controllers\JobController::class, 'create'])->middleware(['auth', 'company', 'user']);
Route::delete('/delete/{id}', [\App\Http\Controllers\JobController::class, 'destroy']);
Route::get('/update/{id}', [\App\Http\Controllers\JobController::class, 'edit']);
Route::post('/update/{id}', [\App\Http\Controllers\JobController::class, 'update']);
//Route::post('/create-job/', [\App\Http\Controllers\JobController::class, 'store'])->middleware(['auth', 'company', 'user']);

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');
//->middleware(['auth', 'verified'])

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
