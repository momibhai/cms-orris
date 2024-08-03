<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainBannersController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\StatsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\UserController;

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

Route::get('/', [HomeController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function(){

    Route::get('/settings', [SettingsController::class, 'index']);
    Route::post('/settings/update', [SettingsController::class, 'update'])->name('settings.update');

    Route::get('/main-banner', [MainBannersController::class, 'index']);
    Route::post('/main-banner/update', [MainBannersController::class, 'update'])->name('banner.update');

    Route::get('/stats', [StatsController::class, 'index']);
    Route::post('/stats/update', [StatsController::class, 'update'])->name('stats.update');

    Route::get('/services', [ServicesController::class, 'index']);
    Route::post('/services/store', [ServicesController::class, 'store'])->name('services.store');
    Route::post('/service/update', [ServicesController::class, 'update'])->name('services.update');
    Route::get('/service/destroy/{id}', [ServicesController::class, 'destroy'])->name('services.destroy');

    Route::get('/clients', [ClientsController::class, 'index']);
    Route::post('/clients/store', [ClientsController::class, 'store'])->name('clients.store');
    Route::post('/clients/update', [ClientsController::class, 'update'])->name('clients.update');
    Route::get('/clients/destroy/{id}', [ClientsController::class, 'destroy'])->name('clients.destroy');

    Route::get('/projects', [ProjectsController::class, 'index']);
    Route::post('/projects/store', [ProjectsController::class, 'store'])->name('projects.store');
    Route::post('/projects/update', [ProjectsController::class, 'update'])->name('projects.update');
    Route::get('/projects/destroy/{id}', [ProjectsController::class, 'destroy'])->name('projects.destroy');

    Route::get('/aboutus', [AboutUsController::class, 'index']);
    Route::post('/aboutus/update', [AboutUsController::class, 'update'])->name('aboutus.update');
    
    Route::get('/contacts', [ContactsController::class, 'index']);

    
    Route::resource('albums', AlbumController::class);
    Route::get('albums/{album}/media/create', [MediaController::class, 'create'])->name('media.create');
    Route::post('albums/{album}/media', [MediaController::class, 'store'])->name('media.store');
    Route::get('albums/{id}', [AlbumController::class, 'show'])->name('albums.show');


    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/{id}/edit-password', [UserController::class, 'editPassword'])->name('users.editPassword');
    Route::post('users/{id}/update-password', [UserController::class, 'updatePassword'])->name('users.updatePassword');

});
