<?php

/**
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', 'FrontendController@index')->name('index');
Route::get('macros', 'FrontendController@macros')->name('macros');

/**
 * crud products table
 */
Route::get('products', 'ProductsController@listed')->name('products');
Route::get('products/create', 'ProductsController@create_get')->name('products_create');
Route::post('products/create', 'ProductsController@create_post')->name('products_create');
Route::delete('products/delete/{id}', 'ProductsController@delete')->name('products_delete');
Route::get('products/update/{id}', 'ProductsController@update_get')->name('products_update_get');
Route::put('products/update', 'ProductsController@update_put')->name('products_update_put');

/**
 * crud product-types table
 */
Route::get('products/product-types', 'ProductTypeController@listed')->name('product_types');
Route::get('products/product-types/create', 'ProductTypeController@create_get')->name('product_types_create');
Route::post('products/product-types/create', 'ProductTypeController@create_post')->name('product_types_create');
Route::delete('products/product-types/delete/{id}', 'ProductTypeController@delete')->name('product_types_delete');
Route::get('products/product-types/update/{id}', 'ProductTypeController@update_get')->name('product_types_update_get');
Route::put('products/product-types/update', 'ProductTypeController@update_put')->name('product_types_update_put');

/**
 * 
 */
Route::resource('products/attribute','AttributeController',['only'=>['index', 'create', 'store', 'edit', 'update', 'destroy']]);
Route::resource('products/attribute-value','AttributeValueController',['only'=>['create', 'store', 'edit', 'update', 'destroy']]);

/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 */
Route::group(['middleware' => 'auth'], function () {
    Route::group(['namespace' => 'User', 'as' => 'user.'], function () {
        /*
         * User Dashboard Specific
         */
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');

        /*
         * User Account Specific
         */
        Route::get('account', 'AccountController@index')->name('account');

        /*
         * User Profile Specific
         */
        Route::patch('profile/update', 'ProfileController@update')->name('profile.update');
    });
});
