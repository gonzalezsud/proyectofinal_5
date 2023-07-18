<?php

use App\Http\Controllers\ItemsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ListnameController;
use App\Http\Controllers\ItemListnameController;

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

Route::resource('/items', ItemsController::class)->names('items');
Route::get('/items/{itemId}', 'ItemController@show');
Route::get('/items/create', [ItemController::class, 'create'])->name('items.create');
Route::post('/items', [ItemController::class, 'store'])->name('items.store');


Route::resource('categories', CategoryController::class);
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', 'CategoryController@create')->name('categories.create');


Route::resource('items', ItemController::class);
Route::resource('listnames', ListnameController::class);
Route::resource('itemlistnames', ItemListnameController::class);

Route::get('/items', [ItemController::class, 'index'])->name('items.index');
Route::get('/items/create', [ItemController::class, 'create'])->name('items.create');
Route::post('/items', [ItemController::class, 'store'])->name('items.store');
Route::get('/items/{item}/edit', [ItemController::class, 'edit'])->name('items.edit');
Route::put('/items/{item}', [ItemController::class, 'update'])->name('items.update');
Route::delete('/items/{item}', [ItemController::class, 'destroy'])->name('items.destroy');
// Route::get('/', function () {
//     return view('home');
// })->name('home');

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/', function () {
//     return view('home');
// })->name('home');


Route::get('/dashboard', function () {
    // Lógica de la vista del dashboard
})->name('dashboard');

Route::get('/', function () {
    $categories = App\Models\Category::all(); // Obtener todas las categorías desde el modelo Category
    return view('welcome', compact('categories'));
});