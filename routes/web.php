<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => ['auth']], function ($route) {
//    $route->get('dashboard', function () {
//        return view('dashboard');
//    })->name('dashboard');
    $route->get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    $route->resource('product', ProductController::class);

//    Route::post('/tokens/create', function (Request $request) {
//    $route->post('tokens/create', function (Request $request) {
    $route->post('tokens/create', function (Request $request) {
        $token = $request->user()->createToken($request->token_name);
//return ['request' => $request->user()];
        return ['token' => $token->plainTextToken];
    })->name('tokens.create');
//    1|8Dh7AlS0MJh6C4edoWXzKbT2VmR369noHSLIKoF3
});
//Route::post('/tokens/create', function (Request $request) {
////    $token = $request->user()->createToken($request->token_name);
//    return ['request' => $request];
////    return ['token' => $token->plainTextToken];
//})->name('tokens.create');

require __DIR__.'/auth.php';
