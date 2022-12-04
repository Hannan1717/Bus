<?php

use App\Http\Controllers\JadwalController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\SupirController;
use Illuminate\Support\Facades\Route;
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
    return view('welcome');
});

Auth::routes();

Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal.index');

// Jadwal
Route::middleware(['auth'])->group(function () {
    Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal.index');
    Route::get('/jadwal/add', [JadwalController::class, 'create'])->name('jadwal.create');
    Route::post('/jadwal/store', [JadwalController::class, 'store'])->name('jadwal.store');
    Route::get('/jadwal/edit/{id}', [JadwalController::class, 'edit'])->name('jadwal.edit');
    Route::post('/jadwal/update/{id}', [JadwalController::class, 'update'])->name('jadwal.update');
    Route::post('/jadwal/delete/{id}', [JadwalController::class, 'delete'])->name('jadwal.delete');
});

// bus
Route::middleware(['auth'])->group(function () {
    Route::get('/bus', [BusController::class, 'index'])->name('bus.index');
    Route::get('/bus/add', [BusController::class, 'create'])->name('bus.create');
    Route::post('/bus/store', [BusController::class, 'store'])->name('bus.store');
    Route::get('/bus/edit/{id}', [BusController::class, 'edit'])->name('bus.edit');
    Route::post('/bus/update/{id}', [BusController::class, 'update'])->name('bus.update');
    Route::post('/bus/delete/{id}', [BusController::class, 'delete'])->name('bus.delete');
});

// supir
Route::middleware(['auth'])->group(function () {
    Route::get('/supir', [SupirController::class, 'index'])->name('supir.index');
    Route::get('/supir/add', [SupirController::class, 'create'])->name('supir.create');
    Route::get('/supir/trash', [SupirController::class, 'trash'])->name('supir.trash');
    Route::post('/supir/store', [SupirController::class, 'store'])->name('supir.store');
    Route::get('/supir/edit/{id}', [SupirController::class, 'edit'])->name('supir.edit');
    Route::post('/supir/update/{id}', [SupirController::class, 'update'])->name('supir.update');
    Route::post('/supir/destroy/{id}', [SupirController::class, 'destroy'])->name('supir.destroy');
    Route::post('/supir/restore/{id}', [SupirController::class, 'restore'])->name('supir.restore');
    Route::post('/supir/forceDelete/{id}', [SupirController::class, 'forceDelete'])->name('supir.forceDelete');
});

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');

Route::get('/about', function () {
    return view('about');
})->name('about');
