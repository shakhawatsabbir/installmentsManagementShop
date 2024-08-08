<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InstallmentCustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SalesController;

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/',                                 [AdminController::class,                'index'                         ])->name('dashboard');
    Route::get('/dashboard',                        [AdminController::class,                'index'                     ])->name('dashboard');
    Route::get('/add-sale',                         [SalesController::class,                'index'                     ])->name('makeSale');
    Route::get('/add-sale/customer-detail',         [SalesController::class,                'customarDetail'            ])->name('makeSaleCustomer');
    Route::post('/sales/save',                      [SalesController::class,                'Store'                     ])->name('addSales');
    Route::get('/sales/complete/{customer_id}',     [SalesController::class,                'orderComplete'             ])->name('order.complete');
    Route::get('/sales/manage',                     [SalesController::class,                'salesManage'               ])->name('saleManage');
    Route::get('/sales/details/{id}',               [SalesController::class,                'salesDetails'              ])->name('sales.details');
    Route::get('/customer',                         [CustomerController::class,             'index'                     ])->name('customer');
    Route::get('/customer/profile/{id}',            [CustomerController::class,             'profile'                   ])->name('customerProfile');
    Route::get('/customer/Vehicle/{id}',            [CustomerController::class,             'customerVehicle'           ])->name('customerVehicle');
    Route::get('/customer/instalment',              [InstallmentCustomerController::class,  'index'                     ])->name('makeInstallment');
    Route::post('/customer/instalment',             [InstallmentCustomerController::class,  'store'                     ])->name('makeInstallmentSave');
    Route::get('/customer/instalment/manage',       [InstallmentCustomerController::class,  'instalmentCustomerManaage' ])->name('instalmentCustomerManaage');
    Route::get('/customer/instalment/details/{id}', [InstallmentCustomerController::class,  'instalmentCustomerDetails' ])->name('instalment.customer.details');
    Route::get('/customer/instalment/pay/{id}',     [InstallmentCustomerController::class,  'installmentPay'            ])->name('installmentPay');
    Route::post('category/update/model',            [CategoryController::class,             'categoryUpdate'            ])->name('category.update.model');
    Route::post('/product/cart/add',                [ProductController::class,              'productAddCart'            ])->name('cartAdd');
    Route::get('/product/cart/delete/{id}',         [ProductController::class,              'productDeleteCart'         ])->name('cartProductDelet');
    Route::get('/product/details/{id}',             [ProductController::class,              'productDetails'            ])->name('product.details');
    Route::get('/product/edit/{id}',                [ProductController::class,              'prodctEdit'                ])->name('productEdit');
    Route::post('/product/update',                  [ProductController::class,              'productUpdate'             ])->name('productUpdate');
    Route::resource('category', 'App\Http\Controllers\CategoryController');
    Route::resource('product', 'App\Http\Controllers\ProductController');
});

Route::post('/json/instalment/search',  [InstallmentCustomerController::class, 'searchInstallment']);
Route::post('/json/product/search',     [ProductController::class, 'searchProductDetail']);
Route::post('/json/product/addCart',    [ProductController::class, 'productAddCart']);
Route::post('/json/product/category',   [CategoryController::class, 'searchcategory']);
