<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;

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
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::controller(ReviewController::class)->middleware(['auth'])->group(function(){
Route::get('/','index')->name('index');
Route::get('/reviews/create', 'create')->name('create');
Route::get('/reviews/{review}','show')->name('show');
Route::post('/reviews', 'store')->name('store');
Route::get('/reviews/{review}/edit', 'edit')->name('edit');
Route::put('/reviews/{review}', 'update')->name('update');
Route::delete('/reviews/{review}', 'delete')->name('delete');


Route::get('/reviews/like/{review}', [ReviewController::class, "like"])->name('review.like');
Route::get('/reviews/unlike/{review}', [ReviewController::class, "unlike"])->name('review.unlike');

});