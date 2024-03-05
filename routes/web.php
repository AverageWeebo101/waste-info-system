<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WasteController;
use App\Http\Controllers\WasteLocationFacilityController;

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
})->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});



Route::get('/wastes', [WasteController::class, 'index'])->name('wastes.index');
Route::get('/wastes/create', [WasteController::class, 'create'])->name('wastes.create');
Route::resource('wastes', WasteController::class);
Route::delete('/wastes/{id}', [WasteController::class, 'destroy'])->name('wastes.destroy');
Route::get('/wastes/delete-selected', [WasteController::class, 'deleteSelected'])->name('wastes.deleteSelected');



Route::get('/wastes_location', [WasteLocationFacilityController::class, 'index'])->name('wastes_location.index');
Route::get('/wastes_location/create', [WasteLocationFacilityController::class, 'create'])->name('wastes_location.create');
Route::post('/wastes_location', [WasteLocationFacilityController::class, 'store'])->name('wastes_location.store');
Route::get('/wastes_location/{id}', [WasteLocationFacilityController::class, 'show'])->name('wastes_location.show');
Route::get('/wastes_location/{id}/edit', [WasteLocationFacilityController::class, 'edit'])->name('wastes_location.edit');
Route::put('/wastes_location/{id}', [WasteLocationFacilityController::class, 'update'])->name('wastes_location.update');
Route::delete('/wastes_location/{id}', [WasteLocationFacilityController::class, 'destroy'])->name('wastes_location.destroy');
Route::get('/wastes_location/deleteSelected', [WasteLocationFacilityController::class, 'deleteSelected'])->name('wastes_location.deleteSelected');

?>