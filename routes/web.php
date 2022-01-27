<?php

use App\Http\Controllers\FollowingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\ProfileInfromationController;

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

Route::view('/', 'welcome');
Route::post('',);

require __DIR__ . '/auth.php';


Route::middleware('auth')->group(function () {
    Route::get('timeline', TimelineController::class)->name('timeline');
    Route::post('status', [StatusController::class, 'store'])->name('statuses.store');

    Route::get('profile/{user}', ProfileInfromationController::class)->name('profile')->withoutMiddleware('auth');

    Route::post('profile/{user}', [FollowingController::class, 'store'])->name('following.store');
});
