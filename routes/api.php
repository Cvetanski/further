<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Venue\VenueController;
use App\Http\Controllers\Vote\VoteController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register',[RegisteredUserController::class,'store']);
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::group([ 'prefix' => 'venue', 'middleware' => 'auth:sanctum'],(function (){
    Route::get('/',[VenueController::class,'index']);
    Route::post('/store', [VenueController::class, 'store']);
}));


Route::group([ 'prefix' => 'vote', 'middleware' => 'auth:sanctum'],(function (){
    Route::get('/',[VoteController::class,'index']);
    Route::post('/store', [VoteController::class, 'store']);
    Route::put('/update/{id}', [VoteController::class, 'update']);
}));

