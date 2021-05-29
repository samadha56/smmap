<?php

use App\Http\Controllers\Home\ColorRangeController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\MarkController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [IndexController::class, 'index'])->name('index'); // Index of Site
Route::get('/marks', [MarkController::class, 'index']); // Index of Marks
Route::get('/color-range', [ColorRangeController::class, 'index']); // Index of Color Range

Auth::routes(['register' => false, 'reset' => false]); // Auth

Route::prefix('/home')->middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home'); // Index of Home
    Route::get('/marks/edit', [MarkController::class, 'edit'])->name('home.marks.edit'); // Edit Marks
    Route::post('/marks/update', [MarkController::class, 'update'])->name('home.marks.update'); // Update Marks
    Route::get('/color-range/edit', [ColorRangeController::class, 'edit'])->name('home.color-range.edit'); // Edit Color Range
    Route::post('/color-range/update', [ColorRangeController::class, 'update'])->name('home.color-range.update'); // Update Color Range
});
