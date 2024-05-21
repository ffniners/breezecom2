<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use DuncanMcClean\SimpleCommerce\Tags\CartTags;
use DuncanMcClean\SimpleCommerce\Tags\SimpleCommerceTag;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Statamic\Facades\Site;
use Illuminate\Support\Facades\Log;



use DuncanMcClean\SimpleCommerce\Http\Controllers\CartItemController;
use DuncanMcClean\SimpleCommerce\Http\Controllers\CheckoutController;
use DuncanMcClean\SimpleCommerce\Http\Controllers\CouponController;
use DuncanMcClean\SimpleCommerce\Http\Controllers\CustomerController;
use DuncanMcClean\SimpleCommerce\Http\Controllers\DigitalProducts\DownloadController;
use DuncanMcClean\SimpleCommerce\Http\Controllers\DigitalProducts\VerificationController;
use DuncanMcClean\SimpleCommerce\Http\Controllers\GatewayCallbackController;
use DuncanMcClean\SimpleCommerce\Http\Controllers\GatewayWebhookController;
use DuncanMcClean\SimpleCommerce\Http\Middleware\EnsureFormParametersArriveIntact;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;



Route::name('simple-commerce.')->group(function () {
    Route::post('/checkout', [CheckoutController::class, '__invoke'])->name('checkout.store');
    Route::get('/gateways/{gateway}/callback', [GatewayCallbackController::class, 'index'])->name('gateways.callback');

    Route::post('/gateways/{gateway}/webhook', [GatewayWebhookController::class, 'index'])
        ->name('gateways.webhook')
        ->withoutMiddleware([VerifyCsrfToken::class]);
        Route::post('/checkout', [CheckoutController::class, '__invoke'])->name('checkout.store');
/*
        Route::get('/payment', function () {
            return view('payment');
        })->name('checkout.form');
  */

});


//*.



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
    return view('home');
});

Route::get('/product/{product_id}', [ProductController::class, 'show'])->name('product.show'); 



Route::get('/cart', function () {
    return view('cart');
}); 




Route::get('/payment', function () {
    return view('payment');
});


Route::get('/_stripe', function () {
    return view('/gateways/_stripe');
});

Route::get('/stripepayment', function () {
    return view('/stripepayment');
});



Route::get('/welcome', function () {
    return view('/welcome');
});
/*
Route::get('/checkout', function () {
    return view('checkout');
});
*/



/*
Route::post('/cart/remove-item', function () {
    try {
        $itemId = request('item');
        
        CartTags::removeItem($itemId);
        
        return redirect()->back();
    } catch (\Exception $e) {
        Log::error('Error removing item from cart: ' . $e->getMessage());
        
        return response()->json(['error' => 'An error occurred while removing the item from the cart'], 500);
    }
})->name('cart.remove-item');
*/