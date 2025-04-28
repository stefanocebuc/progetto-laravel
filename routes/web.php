<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DrugController;
use App\Http\Controllers\IngredientController;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get("company2", [CompanyController::class, "getcompany2"]);
/* Route::get("company2/{id}", [CompanyController::class, "fetchcompany2"]); */
Route::get("drugs", [DrugController::class, "index"]);
Route::get("ingredients", [IngredientController::class, "index"]);
Route::get("drugs/{id}", [DrugController::class, "show"]);
Route::get("ingredients/{id}", [IngredientController::class, "show"]);
Route::get("drugs/{id}/company", [DrugController::class, "getCompanyByDrug"]);
Route::get("company/{id}/drugs", [CompanyController::class, "getDrugByCompany"]);
Route::get("ingredients/{id}/drugs", [IngredientController::class, "getDrugbyIngredient"]);

Route::resource('company', CompanyController::class); // shortcut per definire tutte le routes

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
