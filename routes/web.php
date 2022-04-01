<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventListController;
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

Route::get('/', [EventListController::class, 'browsePage']);

Route::get('/create', [EventListController::class, 'createPage']);

Route::get('/event/{id_event}', [EventListController::class, 'eventPage']);

Route::post('/saveItemRoute', [EventListController::class, 'saveItem'])->name('saveItem');