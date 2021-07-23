<?php

use App\Http\Controllers\GuestController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TurnController;
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

Route::get('/', [StudentController::class, 'index'])->name('students.index');

Route::post('/validate', [StudentController::class, 'validateStudent'])->name('students.validate');

Route::get('/student/{student:slug}', [StudentController::class, 'show'])->name('students.show');

Route::post('/turns/detail/{day}/student/{student:slug}', [TurnController::class, 'loadData'])->name('turns.loadData');

Route::get('/turns/detail/{day}/student/{student:slug}', [TurnController::class, 'detail'])->name('turns.detail');

Route::get('/turns/{turn}', [TurnController::class, 'show'])->name('turns.show');

Route::post('reservations/turn/{turn}/student/{student}', [ReservationController::class, 'store'])->name('reservations.store');

Route::post('reservations/turns/{turn}/students/{student}', [ReservationController::class, 'guests'])->name('reservations.guests');

Route::get('/reservations/{reservation}', [ReservationController::class, 'show'])->name('reservations.show');

Route::post('/reservations/{reservation}', [GuestController::class, 'store'])->name('guests.store');



