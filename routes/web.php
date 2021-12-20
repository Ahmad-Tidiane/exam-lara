<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\HomeController;
use App\Http\Controllers\RendezVousController;
use Illuminate\Support\Facades\Auth;


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
    return view('passe_sanitaires.create');
});

Auth::routes();

// Route::get('/admins', [App\Http\Controllers\HomeController::class, 'index'])->name('admins');
// Route::get('/admins/{admin}', [App\Http\Controllers\HomeController::class, 'show'])->name('admins.show');
// Route::get('/admins/{admin}', [App\Http\Controllers\HomeController::class, 'destroy'])->name('admins.destroy');


Route::resource('passe_sanitaires', PasseSanitaireController::class);

Route::resource('admins', HomeController::class);

// Route::resource('rendez_vous', RendezVousController::class);
Route::resource('rendezVous','RendezVousController');


Route::get('/rendezVous', [App\Http\Controllers\RendezVousController::class, 'index'])->name('rendezVous.index');
// Route::post('/admins', [HomeController::class, 'type_envoi'])->name('admins.type_envoi');

