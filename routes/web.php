<?php

use App\Mail\ResetPassword;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CmsController;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Cms\AdminController;
use App\Http\Controllers\Cms\RolesController;
use App\Http\Controllers\CompetitionController;
use App\Http\Livewire\Cms\Admin\AdminIndex;
use App\Http\Livewire\Cms\Admin\CreateAdmin;
use App\Http\Livewire\Cms\Admin\EditAdmin;
use App\Http\Livewire\Cms\Competition\CreateCompetition;

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
    return view('cms.pages.login');
});
Route::get('/clear', function () {
    Session::getHandler()->gc(0);
    return view('cms.pages.login');
});
// Route::get('/dashboard',[CmsController::class,'index'])->name('dashboard');

// Route::permanentRedirect('cms/', 'cms/index');
Route::prefix('cms')->name('cms.')->middleware('auth:cms')->group(function () {
    Route::get('/dashboard',[CmsController::class,'index'])->name('index');

    Route::prefix('competition')->name('competition.')->group(function(){
        Route::get('/',[CompetitionController::class,'index'])->name('index');
            Route::get('/create',CreateCompetition::class)->name('create');
        }
    );
    Route::resource('/admin',AdminController::class);
    Route::resource('/roles',RolesController::class);
    // Route::resource('competition', CompetitionController::class);
});

require __DIR__.'/auth.php';
