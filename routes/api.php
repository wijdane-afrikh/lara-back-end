<?php

use App\Http\Controllers\ChargeController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\ImmeubleController;
use App\Http\Controllers\OuvrierController;
use App\Http\Controllers\ReclamationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// users
Route::post("/user/login", [UserController::class, "login"]);
Route::get("/user", [UserController::class, "index"]);
Route::get("/users", [UserController::class, "getUser"]);
Route::post("/user/delete/{id}", [UserController::class, "destroy"]);
Route::post("/user/update/{id}", [UserController::class, "update"]);
Route::post("/user/create", [UserController::class, "register"]);
// recalamtion
Route::get("/reclamtion", [ReclamationController::class, "index"]);
Route::post("/reclamtion/create", [ReclamationController::class, "store"]);
Route::post("/reclamtion/update/{reclamation}", [ReclamationController::class, "update"]);
// ouvrires
Route::get("/ouvrires", [OuvrierController::class, "index"]);
Route::post("/ouvrires/create", [OuvrierController::class, "store"]);
Route::post("/ouvrires/update/{ouvrier}", [OuvrierController::class, "update"]);
Route::post("/ouvrires/delete/{ouvrier}", [OuvrierController::class, "destroy"]);
Route::get("/ouvrires/show/{ouvrier}", [OuvrierController::class, "show"]);
// Immeuble

Route::get("/Immeuble", [ImmeubleController::class, "index"]);
Route::post("/Immeuble/create", [ImmeubleController::class, "store"]);
Route::post("/Immeuble/update/{immeuble}", [ImmeubleController::class, "update"]);
Route::post("/Immeuble/delete/{immeuble}", [ImmeubleController::class, "destroy"]);
Route::get("/Immeuble/show/{immeuble}", [ImmeubleController::class, "show"]);
// facture
Route::get("/facture", [FactureController::class, "index"]);
Route::post("/facture/create", [FactureController::class, "store"]);
Route::post("/facture/update/{facture}", [FactureController::class, "update"]);
Route::post("/facture/delete/{facture}", [FactureController::class, "destroy"]);
// charge
Route::get("/Charge", [ChargeController::class, "index"]);
Route::post("/Charge/create", [ChargeController::class, "store"]);
Route::post("/Charge/update/{charge}", [ChargeController::class, "update"]);
Route::post("/Charge/delete/{charge}", [ChargeController::class, "destroy"]);
