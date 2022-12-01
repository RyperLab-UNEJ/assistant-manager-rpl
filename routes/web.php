<?php

use App\Http\Controllers\CmsController;
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
});

Route::prefix('cms')->name('cms.')->group(function () {
    Route::get('/index',[CmsController::class,'index'])->name('index');
    // Route::resource('user', UserController::class);
});