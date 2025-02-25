<?php

use App\Http\Controllers\CatalogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

RUTAS:
Route::get('/', function () {
    return view('welcome');;
})->name('inicio')->middleware('guest');



Route::get('catalog', function () {
    return view('catalog.index');
})->name('dashboard');

Route::get('catalog/show/{id}', function ($id) {
    return view('catalog.show', ['id' => $id]);
})->name('show');

Route::get('catalog/create', function () {
    return view('catalog.create');
})->name('create');

Route::get('catalog/edit/{id}', function ($id) {
    return view('catalog.edit', ['id' => $id]);
})->name('edit');

/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// MIAS
Route::get('/', [HomeController::class, 'getHome'])->name('home');
Route::get('/catalog', [CatalogController::class, 'getIndex'])->name('index');
Route::get('/catalog/show/{id}', [CatalogController::class, 'getShow'])->name('show');
Route::get('/catalog/create', [CatalogController::class, 'getCreate'])->name('create');
Route::get('/catalog/edit/{id}', [CatalogController::class, 'getEdit'])->name('edit');

// CRUD
Route::post('/catalog/create', [CatalogController::class, 'postCreate'])->name('createPost')->middleware('auth');
Route::put('/catalog/edit/{id}', [CatalogController::class, 'putEdit'])->name('editPost')->middleware('auth');

//ULTIMAS RUTAS

Route::put('/catalog/rent/{id}', [CatalogController::class, 'putRent'])->name('rent');
Route::put('/catalog/return/{id}', [CatalogController::class, 'putReturn'])->name('return');
Route::delete('/catalog/delete/{id}', [CatalogController::class, 'deleteMovie'])->name('deleteMovie');
require __DIR__ . '/auth.php';
