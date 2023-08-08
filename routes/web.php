<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;

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
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/addPatient', [App\Http\Controllers\PatientController::class, 'store'])->name('storePatient');
Route::post('/postEntry', [App\Http\Controllers\DailyEntryController::class, 'store'])->name('storeEntry');
Route::get('/viewDailyEntry', [App\Http\Controllers\DailyEntryController::class, 'index'])->name('viewEntry');
Route::get('/viewAllEntries', [App\Http\Controllers\DailyEntryController::class, 'allEntries'])->name('allEntries');
