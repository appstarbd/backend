<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//auth:sanctum
//Route::apiResources([
//    'user' => UserController::class,
//    'product' => ProductController::class,
//]);
Route::get('product', [ProductController::class, 'index'])->name('api.product');
Route::group(['middleware' => ['auth:sanctum']], function ($route) {
    Route::apiResources([
//        'user' => UserController::class,
//        'product' => ProductController::class,
    ]);
    Route::post('product', [ProductController::class, 'store'])->name('api.product.store');
});

/**Route::post('login', function (Request $request)
{
    if (Auth::attempt($request->only('email', 'password'))) {
        $request->session()->regenerate();
    }

    return response()->json([
        'message' => 'Invalid login details'
    ], 401);
})->name('api.login');**/
