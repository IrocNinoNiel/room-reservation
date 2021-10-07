<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/room/{id}', [App\Http\Controllers\RoomController::class, 'index'])->name('room.index');

Route::group(['middleware' => 'CheckType:admin'],function(){ 
    Route::get('/add',[App\Http\Controllers\RoomController::class, 'addpage'])->name('room.addpage');
    Route::post('/add',[App\Http\Controllers\RoomController::class, 'store'])->name('room.store');
    Route::delete('/delete/{id}', [App\Http\Controllers\RoomController::class, 'destroy'])->name('room.destroy');
    Route::get('/edit/{id}', [App\Http\Controllers\RoomController::class, 'editpage'])->name('room.editpage');
    Route::post('/edit/{id}', [App\Http\Controllers\RoomController::class, 'edit'])->name('room.edit');
});

