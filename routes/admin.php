<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::view('/admin', 'admin.layout');

Route::group([
    'prefix' => LaravelLocalization::setlocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ],
], function(){
    /**  ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
    Route::get('/hello', function()
	{
		return view("test");
	})->name('hello');
    ################################    Auth User Routes    ################################
        // Route::get('/login', [UserController::class, 'login']);
        // Route::post('/login', [UserController::class, 'postLogin'])->name('user.login');
        // Route::post('/logout', [UserController::class, 'logout'])->name('user.logout');
    ################################    Auth User Routes    ################################
});
/** OTHER PAGES THAT SHOULD NOT BE LOCALIZED **/


