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
Route::delete('/wastes/delete-selected', [WasteController::class, 'deleteSelected'])->name('wastes.deleteSelected');


    // Use Route::resource for standard CRUD routes
    // Route::resource('wastes', WasteController::class);

    // Route::get('/wastes/create', [WasteController::class, 'create'])->name('wastes.create');

    // Additional route for deleting selected records
    //Route::delete('/wastes/delete-selected', [WasteController::class, 'deleteSelected'])->name('wastes.deleteSelected');

?>