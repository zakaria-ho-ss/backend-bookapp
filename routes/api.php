<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/books', [BooksController::class,'index']);
Route::get('/books/{id}', [BooksController::class,'getBooksById']);
Route::post('/books', [BooksController::class,'add']);
Route::put('/books', [BooksController::class,'update']);
Route::delete('/books/{id}', [BooksController::class,'remove']);