<?php

use App\Http\Controllers\ClienteController;
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

Route::get('/cliente', [ClienteController::class,'index'])->name('cliente.index');
Route::post('/cliente/store', [clienteController::class,'store'])->name('cliente.store');
Route::post('/cliente/search',[clienteController::class, 'search'])->name('cliente.search');
Route::get('/cliente/create', [ClienteController::class,'create'])->name('cliente.create');
Route::get('/cliente/edit/{id}', [ClienteController::class, 'edit'])->name('cliente.edit');
Route::put('/cliente/update/{id}', [ClienteController::class, 'update'])->name('cliente.update');
Route::delete('cliente/{id}', [ClienteController::class, 'destroy'])->name('cliente.destroy');

/*
Route::get('/cliente', function () {
    return view ('cliente.list');
});
*/
