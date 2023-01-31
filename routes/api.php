<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// option head "/api/"
Route::get("/users", [ApiController::class, "getAllUsers"])->name("getAllUsers");
Route::get("/users/{id}", [ApiController::class, "getUser"])->name("getUser");
Route::post("/users", [ApiController::class, "createUser"])->name("createUser");
Route::put("/users/{id}", [ApiController::class, "updateUser"])->name("updateUser");
Route::delete("/users/{id}", [ApiController::class, "deleteUser"])->name("deleteUser");