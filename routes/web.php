<?php

use App\Http\Controllers\FotoController;
use App\Http\Controllers\MapaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;

Route::get('/register', [RegisteredUserController::class, 'create'])
    ->middleware('guest')
    ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest');
    
Route::get('/', function () {
    return view('welcome');
})->middleware(['auth', 'verified'])->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
   
    //videos
    Route::get('/videos/index', [VideoController::class, 'index'])->name('videos.index');
    Route::get('/videos/create', function () {
        return view('videos.create');
    })->name('videos.create');
    Route::post('/videos/create', [VideoController::class, 'create']);
    Route::get('/videos/edit/{id}', [VideoController::class, 'getEdit'])->name('videos.getEdit');
    Route::put('/videos/edit/{id}', [VideoController::class, 'putEdit'])->name('videos.putEdit');
    Route::delete('/videos/delete/{id}', [VideoController::class, "delete"])->name('videos.delete');
    //fotos
    Route::get('/fotos/index', [FotoController::class, 'index'])->name('fotos.index');
    Route::get('/fotos/create', function () {
        return view('fotos.create');
    })->middleware(['auth'])->name('fotos.create');
    Route::post('/fotos/create', [FotoController::class, 'create']);
    Route::get('/fotos/edit/{id}', [FotoController::class, 'getEdit'])->name('fotos.getEdit');
    Route::put('/fotos/edit/{id}', [FotoController::class, 'putEdit'])->name('fotos.putEdit');
    Route::delete('/fotos/delete/{id}', [FotoController::class, "delete"])->name('fotos.delete');
    Route::post('/fotos/voto/{id}', [FotoController::class, "voto"])->name('fotos.voto');
    Route::delete('/fotos/{foto}/voto', [FotoController::class, "eliminarVoto"])->name('fotos.eliminarVoto');
    //mapas
    Route::get('/mapas/index', [MapaController::class, 'index'])->name('mapas.index');
    Route::get('/mapas/show',  [MapaController::class, 'show'])->name('mapas.show');
    //productos
    Route::get('/productos/create', function () {
        return view('productos.create');
    })->middleware(['auth'])->name('productos.create');
    Route::get('/productos/index', [ProductoController::class, 'index'])->name('productos.index');
    Route::delete('/productos/{id}',  [ProductoController::class, 'delete'])->name('productos.delete');
    // Route::get('/productos/create',  [ProductoController::class, 'create'])->name('productos.create');
    Route::post('/productos',  [ProductoController::class, 'store'])->name('productos.store');
});

require __DIR__ . '/auth.php';
