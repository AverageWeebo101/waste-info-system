<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WasteController;



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
})->name('home');;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('/wastes', [WasteController::class, 'index'])->name('waste.index');
Route::get('/wastes/create', [WasteController::class, 'create'])->name('waste.create');
Route::post('/wastes', [WasteController::class, 'store'])->name('waste.store');
Route::get('/wastes/{id}', [WasteController::class, 'show'])->name('waste.show');
Route::get('/wastes/{id}/edit', [WasteController::class, 'edit'])->name('waste.edit');
Route::put('/wastes/{id}', [WasteController::class, 'update'])->name('waste.update');
Route::delete('/wastes/{id}', [WasteController::class, 'destroy'])->name('waste.destroy');

Route::resource('waste.index', WasteController::class);


