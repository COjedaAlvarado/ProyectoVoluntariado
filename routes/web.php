<?php

use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Ciudades;
use App\Http\Livewire\EstcivilCrud;
use App\Http\Livewire\GrupoSangreCrud;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::post('estcivil.store',EstcivilCrud::class) ->name('estcivil.store');
    Route::get('/ciudad', Ciudades::class) ->name('ciudad');
    Route::get('/estcivil',EstcivilCrud::class) ->name('estcivil');
    Route::get('/grupos', GrupoSangreCrud::class) ->name('grupos');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
