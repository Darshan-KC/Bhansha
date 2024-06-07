<?php
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\api\CartUpadate;
use App\Http\Controllers\api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/products/search', [ProductController::class,'search'])->name('product.search');
Route::get('/products/category', [ProductController::class,'getByCategory'])->name('category');

Route::post('api/cart/update/{id}', [CartUpadate::class, '__invoke'])->name('api.cart.update');

