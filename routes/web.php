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

Route::get('/', [EventListController::class, 'browsePage'])->name("browse");

Route::get('/create', [EventListController::class, 'createPage'])->middleware(['auth'])->name("create");

Route::get('/event/{id_event}', [EventListController::class, 'eventPage'])->name("event");

Route::post('/saveItemRoute', [EventListController::class, 'saveItem'])->middleware(['auth'])->name('saveItem');

Route::post('/signup', [EventListController::class, 'signUp'])->name('signup');
Route::post('/removeSignup', [EventListController::class, 'removeSignup'])->name('removeSignup');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
