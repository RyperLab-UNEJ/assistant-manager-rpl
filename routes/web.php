<?php

use App\Mail\ResetPassword;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CmsController;
use App\Http\Controllers\CompetitionController;
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

// Route::permanentRedirect('cms/', 'cms/index');
Route::prefix('cms')->name('cms.')->middleware('auth')->group(function () {
    Route::get('/dashboard',[CmsController::class,'index'])->name('index');

    Route::prefix('competition')->name('competition.')->group(function(){
        Route::get('/',[CompetitionController::class,'index'])->name('index');
            Route::get('/create',CreateCompetition::class)->name('create');
        }
    );
    // Route::resource('competition', CompetitionController::class);
});

require __DIR__.'/auth.php';
