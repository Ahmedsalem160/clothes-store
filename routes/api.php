<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\AdminController;

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
################################### Auth user Api #####################################
Route::group([

    'middleware' => 'api',
    'prefix' => 'auth',

], function ($router) {

    Route::post('/login', [UserController::class, 'login'])->name('login');
    Route::post('/logout', [UserController::class,'logout']);
    Route::post('/refresh', [UserController::class,'refresh']);
    Route::post('/me', [UserController::class, 'me']);

});
############################# Category  Operation users Authenticated ############################
Route::group([
    'middleware'=> ['api', 'auth:user-api'],
    'prefix'    =>'user/category',
], function($router){
    Route::post('/create', [CategoryController::class, 'create']);
    Route::post('/update', [CategoryController::class, 'update']);
    Route::post('/all', [CategoryController::class, 'index']);
    Route::post('/delete', [CategoryController::class, 'delete']);
});
############################# Product  Operation users Authenticated ############################
Route::group([
    //'middleware'=> ['api', 'auth:user-api'],
    'prefix'    =>'/product',
], function($router){
    Route::post('/create', [ProductController::class, 'create']);
    Route::post('/update/{id}', [ProductController::class, 'update']);
    Route::get('/all', [ProductController::class, 'index']);
    Route::post('/delete/{id}', [ProductController::class, 'delete']);
});

############################# Admin  Operation users Authenticated ############################
Route::group([
    'prefix'=>'admin',
    // 'middleware'=>'auth:admin-api'
],function($router){
    Route::post('/login',[AdminController::class, 'login'])->name('admin.login');
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
