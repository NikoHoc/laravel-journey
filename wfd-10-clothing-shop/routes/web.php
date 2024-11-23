<?php

use App\Http\Controllers\ShopingController;
use App\Http\Resources\ShoppingCartResource;
use App\Models\ShoppingCart;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/product/details/{id}', [ShopingController::class, 'show'])->name('productpage');

/**
 * Get Shopping Cart Items API
 */
Route::get('/shoppingcart/{sessionid}', function(string $sessionid) {
    $listItems = ShoppingCart::with('clothes')
                            ->where('session_id', $sessionid)
                            ->get();
    return ShoppingCartResource::collection($listItems);
});

/**
 * POST - API untuk add to Cart
 */
Route::post('/addtocart',[ShopingController::class, 'addToCart'])->name('addtocart');

/**
 * POST - API untuk delete from cart
 */
Route::post('/deletefromshoppingcart',[ShopingController::class, 'deleteFromShoppingCart'])->name('deletefromshoppingcart');