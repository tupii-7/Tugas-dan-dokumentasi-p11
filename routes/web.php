<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AnggotaController;

Route::get("/", function () {
    return view("welcome");
});

// ========== MAIN ROUTES ==========

// Dashboard Routes
Route::get("/dashboard", [DashboardController::class, "index"]);

// Buku Routes
Route::get("/buku", [BukuController::class, "index"]);
Route::get("/buku/search", [BukuController::class, "search"]);
Route::get("/buku/{buku}/edit", [BukuController::class, "edit"])->whereNumber("buku");
Route::put("/buku/{buku}", [BukuController::class, "update"])->whereNumber("buku");
Route::get("/buku/{buku}", [BukuController::class, "show"])->whereNumber("buku");

// Anggota Routes
Route::get("/anggota", [AnggotaController::class, "index"]);
Route::get("/anggota/{anggota}/edit", [AnggotaController::class, "edit"])->whereNumber("anggota");
Route::put("/anggota/{anggota}", [AnggotaController::class, "update"])->whereNumber("anggota");
