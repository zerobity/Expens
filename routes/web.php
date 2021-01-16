<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\MachineController;

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


Route::get('/', [LandingPageController::class, 'index'])->name('landing-page');

Route::get('/machine/{machine}', [MachineController::class, 'index'])->name('machine.index');
Route::get('/machine/{machine}/producto/{product}', [MachineController::class, 'show'])->name('machine.show');
Route::get('/machine/{machine}/RX', [MachineController::class, 'rx'])->name('machine-rx')->middleware('auth');

