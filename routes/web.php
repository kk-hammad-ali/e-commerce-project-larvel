<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthorizeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [ProductController::class, 'categorywise']);


Route::post('/contact', [ContactController::class, 'sendMessage'])->name('contact.send');
Route::get('/contactus',[AuthorizeController::class,'contact']);
Route::get('/about',[AuthorizeController::class,'about']);
Route::get('/products',[AuthorizeController::class,'product']);
Route::get('/cart',[AuthorizeController::class,'cart']);

Route::get('/register',[AuthorizeController::class,'viewregister']);
Route::get('/login',[AuthorizeController::class,'viewlogin']);

Route::post('/register',[AuthorizeController::class,'store'])->name('register');
Route::post('/login',[AuthorizeController::class,'loginpost']);
Route::get('/dashboard', [AuthorizeController::class, 'dashboard'])->name('dashboard'); 

Route::resource('products', ProductController::class);



// Route::get('/singleproduct/{id}', [ProductController::class, 'showSingleProduct'])->name('singleproduct');




Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');



