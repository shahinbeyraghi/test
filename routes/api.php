<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
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


Route::prefix('products')->controller(ProductController::class)->group(function () {
    Route::get('/list', 'list');

    Route::put('/change-comment-status/{id}', 'changeCommentStatus')->middleware('checkProductExist');
    Route::put('/change-vote/{id}', 'changeVote')->middleware('checkProductExist');
    Route::put('/change-status/{id}', 'changeStatus')->middleware('checkProductExist');

});

Route::prefix('orders')->controller(OrderController::class)->group(function () {
    Route::get('/has-buyer/{id}', 'orderExist')->middleware('checkProductExist');
});

Route::prefix('comments')->controller(CommentController::class)->group(function () {
    Route::post('/store/{id}', 'store')->middleware('checkIsFirstComment');
    Route::get('/get-list/{id}/{limit?}/{offset?}', 'getList');
    Route::put('/accept-comment/{id}', 'acceptComment');
});


