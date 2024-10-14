<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MallController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\productController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\landingpageController;



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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/land', function () {
//     return view('landingpage.layout.app');
// });


Route::get('/d', function () {
    return view('dashboard.index');
});
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

///////////////////////////////////// single product /////////////////////////////

