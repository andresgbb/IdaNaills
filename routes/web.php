<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\AdminController;
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
    return view('home');
});
//Reservas
Route::get('/reservas', function () {
    return view('reservas');
});
Route::get('/reservas', function () {
    $servicios = App\Models\Servicio::all();
    return view('reservas', compact('servicios'));
});
Route::get('/reserva/confirmar', function () {return view('confirmar');});
Route::post('/reserva/crearReserva', [ReservaController::class, 'crearReserva'])->name('reserva.crearReserva');
Route::post('/reserva/confirmar',[ReservaController::class, 'confirmar'])->name('reserva.confirmar');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/edit', function () {
    return view('edit');
})->middleware(['auth', 'verified'])->name('edit');


Route::post('/reserva/eliminar/{id}/{fecha}/{hora}', [ReservaController::class,'eliminar'])->name('reserva.eliminar');

 Route::middleware(['auth', 'admin'])->group(function () {
     Route::get('/admin', [AdminController::class, 'edit'])->name('/admin');
 });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/reservas', [ReservaController::class, 'edit'])->name('/reservas');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';
