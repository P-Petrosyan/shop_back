<?php

use App\Http\Controllers\admin\ProductsController as adminProducts;
use App\Http\Controllers\admin\OrdersController as adminOrders;
use App\Http\Controllers\admin\UsersController as adminUsers;
use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\BasketsController;
use App\Http\Controllers\ProductsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::group([

    'middleware' => 'api'

], function ($router) {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('signup', [AuthController::class, 'signup']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);

});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/products')->group(function() {
    Route::get('/{id}', [ProductsController::class, 'customised']);
    Route::get('', [ProductsController::class, 'customised']);
    Route::post('', [ProductsController::class, 'customised']);
    Route::get('/card', [ProductsController::class, 'index']);

});
Route::get('image', [ProductsController::class, 'getImage']);

Route::prefix('/admin/products')->group(function(){
    Route::get('', [adminProducts::class, 'index']);
    Route::get('/edit/{id}', [adminProducts::class, 'edit']);
    Route::post('/edit/{id}', [adminProducts::class, 'update']);
//    Route::get('/create', [adminProducts::class, 'create'])->middleware(['operator']);
    Route::post('/create', [adminProducts::class, 'save']);
    Route::post('/delete/{id}', [adminProducts::class, 'delete']);

});
//->middleware(['notCustomer'])
Route::prefix('/admin/categories')->group(function(){
    Route::get('', [CategoriesController::class, 'index']);
    Route::get('/create', [CategoriesController::class, 'create']);
    Route::post('/create', [CategoriesController::class, 'save']);
    Route::get('/edit/{id}', [CategoriesController::class, 'edit']);
    Route::post('/edit/{id}', [CategoriesController::class, 'update']);
    Route::post('/delete/{id}', [CategoriesController::class, 'delete'])->middleware(['operator']);
});

Route::prefix("/basket")->group(function(){
    Route::get('', [BasketsController::class, 'index']);

//    Route::post('/basket', [BasketsController::class, 'index']);
//    Route::post('plus/{id}', [BasketsController::class, 'plus']);
//    Route::post('minus/{id}', [BasketsController::class, 'minus']);
    Route::post('/add/{id}', [BasketsController::class, 'add']);
//    Route::get('/delete/{id}', [BasketsController::class, 'delete']);
});
