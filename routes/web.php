<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthorizeController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\OrderController;
use App\Models\Product;


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

// categories wise products
Route::get('/', [ProductController::class, 'categorywise']);


// all pages
Route::post('/contact', [ContactController::class, 'sendMessage'])->name('contact.send');
Route::get('/contactus',[AuthorizeController::class,'contact']);
Route::get('/about',[AuthorizeController::class,'about']);
Route::get('/products',[AuthorizeController::class,'product']);


// auth 
Route::get('/register',[AuthorizeController::class,'viewregister']);
Route::get('/login',[AuthorizeController::class,'viewlogin']);
Route::post('/register',[AuthorizeController::class,'store'])->name('register');
Route::post('/login',[AuthorizeController::class,'loginpost']);

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');



// admin routes
Route::resource('products', ProductController::class);


// orders
Route::get('/cart', [OrderController::class, 'index'])->name('cart');
Route::post('/', [OrderController::class, 'store'])->name('orders.store');
Route::get('/cart/delete/{orderId}', [OrderController::class, 'delete'])->name('orders.delete');
Route::get('/cart/deleteall', [OrderController::class, 'deleteall'])->name('orders.delete');
Route::post('/cart/delete-all', [OrderController::class, 'deleteAll'])->name('orders.deleteall');


// Route::get('/singleproduct/{id}', [ProductController::class, 'showSingleProduct'])->name('singleproduct');





