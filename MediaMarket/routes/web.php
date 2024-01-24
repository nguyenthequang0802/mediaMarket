<?php

use App\Http\Controllers\Admin\BackgroundController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CodeDiscountController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DiscountOfProductController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Models\DiscountOfProduct;
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

});
Route::group(['prefix' => 'admin'], function (){
    Route::group(['prefix' => 'codediscount'], function (){
        Route::get('/', [CodeDiscountController::class, 'index'])->name("admin.codediscount.index");
        Route::get('/add', [CodeDiscountController::class, 'create'])->name("admin.codediscount.create");
        Route::post('/add', [CodeDiscountController::class, 'store'])->name("admin.codediscount.store");
        Route::get('/edit/{id}', [CodeDiscountController::class, 'edit'])->name("admin.codediscount.edit");
        Route::post('/edit/{id}', [CodeDiscountController::class, 'update'])->name("admin.codediscount.update");
        Route::get('/delete/{id}', [CodeDiscountController::class, 'destroy'])->name("admin.codediscount.destroy");
    });
    Route::group(['prefix' => 'menu'], function (){
        Route::get('/', [MenuController::class, 'index'])->name("admin.menu.index");
        Route::get('/add', [MenuController::class, 'create'])->name("admin.menu.create");
        Route::post('/add', [MenuController::class, 'store'])->name("admin.menu.store");
        Route::get('/edit/{id}', [MenuController::class, 'edit'])->name("admin.menu.edit");
        Route::post('/edit/{id}', [MenuController::class, 'update'])->name("admin.menu.update");
        Route::get('/delete/{id}', [MenuController::class, 'destroy'])->name("admin.menu.destroy");
    });
    Route::group(['prefix' => 'background'], function (){
        Route::get('/', [BackgroundController::class, 'index'])->name("admin.background.index");
        Route::get('/add', [BackgroundController::class, 'create'])->name("admin.background.create");
        Route::post('/add', [BackgroundController::class, 'store'])->name("admin.background.store");
        Route::get('/edit/{id}', [BackgroundController::class, 'edit'])->name("admin.background.edit");
        Route::post('/edit/{id}', [BackgroundController::class, 'update'])->name("admin.background.update");
        Route::get('/delete/{id}', [BackgroundController::class, 'destroy'])->name("admin.background.destroy");
    });
    Route::group(['prefix' => 'customer'], function (){
        Route::get('/', [CustomerController::class, 'index'])->name("admin.customer.index");
        Route::get('/add', [CustomerController::class, 'create'])->name("admin.customer.create");
        Route::post('/add', [CustomerController::class, 'store'])->name("admin.customer.store");
        Route::get('/edit/{id}', [CustomerController::class, 'edit'])->name("admin.customer.edit");
        Route::post('/edit/{id}', [CustomerController::class, 'update'])->name("admin.customer.update");
        Route::get('/delete/{id}', [CustomerController::class, 'destroy'])->name("admin.customer.destroy");
    });
    Route::group(['prefix' => 'brand'], function (){
        Route::get('/', [BrandController::class, 'index'])->name("admin.brand.index");
        Route::get('/add', [BrandController::class, 'create'])->name("admin.brand.create");
        Route::post('/add', [BrandController::class, 'store'])->name("admin.brand.store");
        Route::get('/edit/{id}', [BrandController::class, 'edit'])->name("admin.brand.edit");
        Route::post('/edit/{id}', [BrandController::class, 'update'])->name("admin.brand.update");
        Route::get('/delete/{id}', [BrandController::class, 'destroy'])->name("admin.brand.destroy");
    });
    Route::group(['prefix' => 'product_category'], function (){
        Route::get('/', [ProductCategoryController::class, 'index'])->name("admin.product_category.index");
        Route::get('/add', [ProductCategoryController::class, 'create'])->name("admin.product_category.create");
        Route::post('/add', [ProductCategoryController::class, 'store'])->name("admin.product_category.store");
        Route::get('/edit/{id}', [ProductCategoryController::class, 'edit'])->name("admin.product_category.edit");
        Route::post('/edit/{id}', [ProductCategoryController::class, 'update'])->name("admin.product_category.update");
        Route::get('/delete/{id}', [ProductCategoryController::class, 'destroy'])->name("admin.product_category.destroy");
    });
    Route::group(['prefix' => 'discount_product'], function (){
        Route::get('/', [DiscountOfProductController::class, 'index'])->name("admin.discount_product.index");
        Route::get('/add', [DiscountOfProductController::class, 'create'])->name("admin.discount_product.create");
        Route::post('/add', [DiscountOfProductController::class, 'store'])->name("admin.discount_product.store");
        Route::get('/edit/{id}', [DiscountOfProductController::class, 'edit'])->name("admin.discount_product.edit");
        Route::post('/edit/{id}', [DiscountOfProductController::class, 'update'])->name("admin.discount_product.update");
        Route::get('/delete/{id}', [DiscountOfProductController::class, 'destroy'])->name("admin.discount_product.destroy");
    });
    Route::group(['prefix' => 'user'], function (){
        Route::get('/', [UserController::class, 'index'])->name("admin.user.index");
        Route::get('/add', [UserController::class, 'create'])->name("admin.user.create");
        Route::post('/add', [UserController::class, 'store'])->name("admin.user.store");
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name("admin.user.edit");
        Route::post('/edit/{id}', [UserController::class, 'update'])->name("admin.user.update");
        Route::get('/delete/{id}', [UserController::class, 'destroy'])->name("admin.user.destroy");
    });
    Route::group(['prefix' => 'product'], function (){
        Route::get('/', [ProductController::class, 'index'])->name("admin.product.index");
        Route::get('/add', [ProductController::class, 'create'])->name("admin.product.create");
        Route::post('/add', [ProductController::class, 'store'])->name("admin.product.store");
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name("admin.product.edit");
        Route::post('/edit/{id}', [ProductController::class, 'update'])->name("admin.product.update");
        Route::get('/delete/{id}', [ProductController::class, 'destroy'])->name("admin.product.destroy");
    });
});
