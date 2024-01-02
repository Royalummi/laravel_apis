<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\CustomersController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//<project url>/api/register
Route::post("register", [ApiController::class, "register"]);

//<project url>/api/login
Route::post("login", [ApiController::class, "login"]);

Route::get("customers", [CustomersController::class, "index"]);

Route::post("addcustomers", [CustomersController::class, "store"]);

Route::get("getcustomers/{id}", [CustomersController::class, "show"]);

Route::put("updatecustomers/{id}", [CustomersController::class, "update"]);

Route::delete("deletecustomers/{id}", [CustomersController::class, "destroy"]);

Route::get("displaycustomers", [CustomersController::class, "display"]);
