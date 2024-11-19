<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MallController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\productController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\shopController;
use App\Http\Controllers\AhmadController;
use App\Http\Controllers\AswaqController;
use App\Http\Controllers\MamonController;
use App\Http\Controllers\CartController;

use App\Http\Controllers\ProductDetailsController;
use App\Http\Controllers\landingpageController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;
use App\Http\Middleware\checkAdmin;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ContantController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\OrderController;




// تحديد الراوت لعرض المول باستخدام اسم المول
// web.php

Route::get('/mall/{mall_id}', [MallController::class, 'showland'])->name('mall.show');



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




// web.php (Routes)

// web.php
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/contant', [ContantController::class, 'index'])->name('contant.index');
Route::get('/about', [AboutController::class, 'index'])->name('about.index');

Route::get('/productDetails/{id}', [ProductDetailsController::class, 'show'])->name('productDetails.show');
Route::post('/add-to-cart/{id}', [ProductDetailsController::class, 'addToCart'])->name('addToCart');


Route::post('/add-to-cart', [ShoppingCartController::class, 'addToCart'])->name('add.to.cart');
Route::get('/cart', [ShoppingCartController::class, 'index'])->name('cart.index');
Route::get('/checkout', [ShoppingCartController::class, 'checkout'])->name('checkout.index');
Route::post('/update-cart', [ShoppingCartController::class, 'updateCart'])->name('cart.update');
Route::delete('/remove-from-cart/{productId}', [ShoppingCartController::class, 'removeFromCart'])->name('cart.remove');




Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::GET('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');





Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');




Route::post('/register', [UserController::class, 'store'])->name('register');



Route::get('/', function () {
    return view('welcome');
});





Auth::routes();


// Route::get('/land', function () {
//     return view('landingpage.layout.app');
// });



/////////////////////////////////////render mall /////////////////////////////

Route::get('/malls-categories-by-email/{email}', [CategoryController::class, 'getMallCategoriesByEmail']);


Route::get('/land', [landingpageController::class, 'index'])->name('landingpags.index');
Route::get('/landingpags/{id}', [landingpageController::class, 'show'])->name('landingpags.show');



///////////////////////////////////// mall /////////////////////////////


Route::get('dashboard/malls', [MallController::class, 'index'])->name('malls.index');

Route::get('dashboard/malls/create', [MallController::class, 'create'])->name('malls.create');
Route::post('dashboard/malls', [MallController::class, 'store'])->name('malls.store');

Route::get('dashboard/malls/{id}/edit', [MallController::class, 'edit'])->name('malls.edit');
Route::put('dashboard/malls/{id}', [MallController::class, 'update'])->name('malls.update');

Route::get('dashboard/malls/{id}', [MallController::class, 'show'])->name('malls.show');

Route::delete('dashboard/malls/{id}', [MallController::class, 'destroy'])->name('malls.destroy');

/////////////////////////////////// end route mall ////////////////////


///////////////////////////////////// category /////////////////////////////

Route::get('dashboard/categories', [CategoryController::class, 'index'])->name('categories.index');

Route::get('dashboard/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('dashboard/categories', [CategoryController::class, 'store'])->name('categories.store');

Route::get('dashboard/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('dashboard/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');

Route::get('dashboard/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');

Route::delete('dashboard/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

///////////////////////////////////// End category /////////////////////////////


Route::get('dashboard/products', [ProductController::class, 'index'])->name('products.index');

Route::get('dashboard/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('dashboard/products', [ProductController::class, 'store'])->name('products.store');

Route::get('dashboard/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('dashboard/products/{id}', [ProductController::class, 'update'])->name('products.update');

Route::get('dashboard/products/{id}', [ProductController::class, 'show'])->name('products.show');

Route::delete('dashboard/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

///////////////////////////////////// user ////////////////////////////////////////


Route::get('dashboard/users', [UserController::class, 'index'])->name('users.index');

Route::get('dashboard/pusers/create', [UserController::class, 'create'])->name('users.create');
Route::post('dashboard/users', [UserController::class, 'store'])->name('users.store');

Route::get('dashboard/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('dashboard/users/{id}', [UserController::class, 'update'])->name('users.update');

Route::get('dashboard/users/{id}', [UserController::class, 'show'])->name('users.show');

Route::delete('dashboard/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

///////////////////////////////////// comment //////////////////////////////////////



Route::get('dashboard/comments', [CommentController::class, 'index'])->name('comments.index');


Route::get('dashboard/comments/{id}', [CommentController::class, 'show'])->name('comments.show');


Route::delete('dashboard/comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');

///////////////////////////////////// register /////////////////////////////

Route::post('/register', [UserController::class, 'register'])->name('register');


/////////////////////////////////////////////////////////////////

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');








Route::get('/landingpags', [LandingPageController::class, 'index'])->name('landingpags.index');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index')->middleware('check.admin');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
///////////////////////////////////////////// shop//////////////////////////////////
Route::get('/mall/{mall_id}/landing', [MallController::class, 'showland'])->name('landing.showland');

Route::get('/shop', [shopController::class, 'index'])->name('shop.index');
///////////////////////////////////////  ahmad almasry mall///////////////////////////////////////////
// Route::get('/ahmadAlmasry', [AhmadController::class, 'index'])->name('ahmad.index');
// Route::get('/aswaqaltawfer', [AswaqController::class, 'index'])->name('aswaq.index');
// Route::get('/mamoncenter', [MamonController::class, 'index'])->name('mamon.index');

//////////////////////// order ///////////////////////////////////////

Route::get('/dashboard/orders', [OrderController::class, 'index'])->name('orders.index');

Route::post('dashboard/orders', [OrderController::class, 'store'])->name('orders.store');

Route::get('dashboard/orders/{id}/edit', [OrderController::class, 'edit'])->name('orders.edit');
Route::put('dashboard/orders/{id}', [OrderController::class, 'update'])->name('orders.update');

Route::get('dashboard/orders/{id}', [OrderController::class, 'show'])->name('orders.show');

Route::delete('dashboard/orders/{id}', [OrderController::class, 'destroy'])->name('orders.destroy');