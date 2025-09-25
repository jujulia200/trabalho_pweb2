<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\clienteController;
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

Route::get('/cliente', [clienteController::class,'index'])->name('cliente.index');
Route::get('/cliente/store', [clienteController::class,'store'])->name('cliente.store');
Route::post('/cliente/search',[clienteController::class, 'search'])->name('cliente.search');
Route::get('/cliente/create', [ClienteController::class,'create'])->name('cliente.create');

/*
Route::get('/cliente', function () {
    return view ('cliente.list');
});
*/
