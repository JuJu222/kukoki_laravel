<?php

use App\Http\Controllers\API\CheckoutController;
use App\Http\Controllers\API\UserController;

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

//Return Midtrans' snap token in JSON to be passed on to the mobile app through existing User ID.
Route::post('/checkout', [CheckoutController::class, 'getSnapToken']);

//Add an order in database through POST API method.
Route::post('/createOrder', [CheckoutController::class, 'createOrder']);

//Get a single user based on a specific user ID.
Route::get('/user/{user_id}', [UserController::class, 'getUser']);
