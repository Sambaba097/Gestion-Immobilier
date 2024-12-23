<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertieController;
use App\Models\Propertie;
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
    $property = Propertie::all();
    return view('welcome',compact('property'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('home',[PropertieController::class, 'home'])
->name('propertie.home')
->middleware('auth');
// obliger l'authentification pour l'accés à ces routes
Route::middleware('auth')->group(function () {

    Route::get('property/create',[PropertieController::class, 'create'])->name('propertie.create');
    Route::post('property/ajouter',[PropertieController::class, 'store'])->name('propertie.store');
    
    Route::get('property/admin',[PropertieController::class, 'admin'])->name('propertie.admin');
    Route::get('property/edit/{id}', [PropertieController::class, 'edit'])->name('propertie.edit');
    Route::put('property/update/{id}', [PropertieController::class, 'update'])->name('propertie.update');
    Route::delete('property/delete/{id}', [PropertieController::class, 'destroy'])->name('propertie.destroy');
    Route::get('property/show/{id}',[PropertieController::class, 'show'])->name('propertie.show');
});
// Route::get('property/list',[PropertieController::class, 'index'])->name('propertie.list');

