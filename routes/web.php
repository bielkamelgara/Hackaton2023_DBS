<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SectorController;
use App\Livewire\SectorLive;
use App\Models\Sale;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

/*Route::get('dashboard', function ()
{
    return view('/dashboard');

});*/


//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/catalogue', [App\Http\Controllers\CatalogController::class, 'index'])->name('catalogue');


Route::middleware('auth')->group(function () {

    Route::get('os', [ProductController::class, 'index'])->name('product.index');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product/create');
    Route::post('/product/store',  [ProductController::class, 'store'])->name('product/store');
    Route::delete('/product/destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
    Route::get('/product/show/{id}', [ProductController::class, 'show'])->name('product.show');
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('product/update', [ProductController::class, 'update'])->name('product.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/sector', [SectorController::class, 'index'])->name('sector/index');
    Route::get('/sector/create', [SectorController::class, 'create'])->name('sector/create');
    Route::post('/sector/store', [SectorController::class, 'store'])->name('sector/store');
    Route::delete('/sector/destroy', [SectorController::class, 'destroy'])->name('sector/destroy');
    Route::get('/sector/show', [SectorController::class, 'show'])->name('sector/show');
    Route::get('/sector/edit', [SectorController::class, 'edit'])->name('sector/edit');
    Route::put('/sector/update', [SectorController::class, 'update'])->name('sector/update');
});

Route::get('entrances', [App\Http\Controllers\EntranceController::class, 'index'])->name('entrances.index');
Route::get('/entrances/data/{id}', [App\Http\Controllers\EntranceController::class, 'entrancesid']);
Route::get('/entrances/showproduct/{id}', [App\Http\Controllers\EntranceController::class, 'showproduct']);

Route::get('/sector/live', SectorLive::class)->name('sector/live');

Route::get('sale', [SaleController::class, 'index'])->name('sale.index');
Route::get('/sale/create', [SaleController::class, 'create'])->name('sale/create');
Route::post('/sale/store',  [SaleController::class, 'store'])->name('sale/store');
Route::delete('/sale/destroy/{id}', [SaleController::class, 'destroy'])->name('sale.destroy');
Route::get('/sale/show/{id}', [SaleController::class, 'show'])->name('sale.show');
Route::get('/sale/edit/{id}', [SaleController::class, 'edit'])->name('sale.edit');
Route::put('sale/update', [SaleController::class, 'update'])->name('sale.update');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/home/post', [App\Http\Controllers\HomeController::class, 'show'])->name('show-post');


require __DIR__ . '/auth.php';
