<?php

use App\Http\Controllers\BackEnd;
use App\Http\Controllers\FrontEnd;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::get('/', [FrontEnd\TermekController::class, 'index'])->name('frontend.fooldal');

Route::post('/kosar/{id}/{user_id}', [FrontEnd\TermekController::class, 'kosarfeltoltes'])->name('kosar.feltoltes');
Route::post('/kosar/torles/{id}/{user_id}', [FrontEnd\TermekController::class, 'kosartorles'])->name('kosar.torles');
Route::get('/kosar', [FrontEnd\TermekController::class, 'kosar'])->name('kosar.home');

Route::group([
    'prefix' => config('backend.name'),
    'middleware' => [
        'auth',
        'check.role'
    ],
], function () {

    Route::get('/', [BackEnd\AdminController::class, 'index'])->name('admin.home');
    Route::post('/', [BackEnd\AdminController::class, 'termek'])->name('admin.termek');
    Route::get('termek', [BackEnd\AdminController::class, 'termek'])->name('termek.termekkez');
    Route::post('termek/ujfeltoltes', [BackEnd\TermekController::class, 'ujfeltoltes'])->name('termek.ujfeltoltes');
    Route::post('termek/{id}', [BackEnd\TermekController::class, 'feltoltes'])->name('termek.feltoltes');
    Route::post('termek/modositas/{id}', [BackEnd\TermekController::class, 'modositas'])->name('termek.modositas');
    Route::delete('termek/ujfeltoltes/{id}', [BackEnd\TermekController::class, 'torles'])->name('termek.torles');

});

