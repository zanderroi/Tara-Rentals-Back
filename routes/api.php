<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APICustomer\CustomerController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;

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







Route::get('customers', [CustomerController::class, 'index']);
Route::post('login/customer', [AuthController::class, 'customerLogin']);
Route::post('customers', [CustomerController::class, 'store']);
Route::middleware('auth:customer')->group(function () {
    // Protected routes for customers
    Route::post('logout/customer', [AuthController::class, 'customerLogout']);
});