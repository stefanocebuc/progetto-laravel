<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\CompanyController;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/* Route::get("company2", [CompanyController::class, "getcompany2"]);
Route::get("company2/{id}", [CompanyController::class, "fetchcompany2"]); */

Route::resource('company', CompanyController::class); // shortcut per definire tutte le routes

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
