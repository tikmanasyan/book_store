<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;


//Guest Routes
Route::middleware(['guest', 'web'])->group(function() {
    Route::get("/login", [AuthController::class, "login_view"])->name("login");
    Route::get("/register", [AuthController::class, "register"])->name("reg");
});


//Categories Routes
Route::middleware(['auth', 'isAdmin'])->prefix("categories")->group(function() {
    Route::get("/", [CategoryController::class, ""])->name("categories");
    Route::get("/{id}/edit", [AuthController::class, ""])->name("category-edit");
    Route::get("/{id}/delete", [AuthController::class, ""])->name("category-delete");
    Route::post("/update", [AuthController::class, ""])->name("category-update");
});
