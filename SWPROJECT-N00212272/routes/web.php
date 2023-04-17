<?php
//VSC is told where to find the product controller
//product controllers
use App\Models\Product;
use App\Models\Material;
use App\Models\Category;
use App\Models\Size;
use App\Models\Condition;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Customer\ProductController as CustomerProductController;
//Material controllers
use App\Http\Controllers\Admin\MaterialController as AdminMaterialController;
//Category controllers
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
//Condition controllers
use App\Http\Controllers\Admin\ConditionController as AdminConditionController;
//Size controllers
use App\Http\Controllers\Admin\SizeController as AdminSizeController;



Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome.index');

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');

Route::resource('/admin/products', AdminProductController::class)->middleware(['auth'])->names('admin.products');

Route::get('/customer/products/{product}/buy', [App\Http\Controllers\Customer\ProductController::class, 'buy'])->name('customer.products.buy');  

Route::resource('/customer/products', CustomerProductController::class)->middleware(['auth'])->names('customer.products');

Route::resource('/admin/materials', AdminMaterialController::class)->middleware(['auth'])->names('admin.materials');

Route::resource('/admin/categories', AdminCategoryController::class)->middleware(['auth'])->names('admin.categories');

Route::resource('/admin/conditions', AdminConditionController::class)->middleware(['auth'])->names('admin.conditions');

Route::resource('/admin/sizes', AdminSizeController::class)->middleware(['auth'])->names('admin.sizes');