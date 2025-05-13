<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DrugController;
use App\Http\Controllers\IngredientController;
use GuzzleHttp\Middleware;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

/* Route::get("company2", [CompanyController::class, "getcompany2"]); */
/* Route::get("company2/{id}", [CompanyController::class, "fetchcompany2"]); */
Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dahsboard');


Route::get("drugs/{id}/company", [DrugController::class, "getCompanyByDrug"]);
Route::get("company/{id}/drugs", [CompanyController::class, "getDrugByCompany"]);
Route::get("ingredients/{id}/drugs", [IngredientController::class, "getDrugbyIngredient"]);

Route::resource('company', CompanyController::class)->only(['create', 'store', 'update', 'destroy'])->middleware(['auth']); // shortcut per definire tutte le routes
Route::resource('company', CompanyController::class);
Route::get('company/{id}/edit', [CompanyController::class, "edit"]);

Route::resource('drugs', DrugController::class)->only(['create', 'store', 'update', 'destroy'])->middleware(['auth']);
Route::resource('drugs', DrugController::class)->only(['index', 'show']);
Route::get('drugs/{id}/edit', [DrugController::class, "edit"]);

Route::resource('ingredients', IngredientController::class)->only(['create', 'store', 'update', 'destroy'])->middleware(['auth']);
Route::resource('ingredients', IngredientController::class)->only(['index', 'show']);

Route::get('ingredients/{id}/edit', [IngredientController::class, "edit"]);

Route::get("drugs/{id}/pay", [DrugController::class, "buy_drug"]);

Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
Route::get("cart", [CartController::class, "show"])->middleware(['auth'])->name('cart.show');
Route::get("drugs/{id}/addtocart", [CartController::class, "store"])->middleware('auth');
Route::get("cart/pay", [CartController::class, "compra_carrello"])->middleware('auth');
require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
