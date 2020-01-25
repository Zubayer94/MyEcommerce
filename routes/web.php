<?php

/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
| All Backend routes starts here
*/

Route::group(['prefix' => 'admin'] , function(){
	Route::get('/', 'backend\AdminPagesController@index')->name('admin.index');

	Route::group(['prefix' => '/products'], function(){
		Route::get('/','backend\ProductsController@index')->name('admin.products');
		Route::get('/input','backend\ProductsController@input')->name('admin.product.input');
		Route::post('/input', 'backend\ProductsController@store')->name('admin.product.store');
		Route::get('/view','backend\ProductsController@view')->name('admin.product.view');
		Route::get('/edit/{id}','backend\ProductsController@edit')->name('admin.product.edit');
		Route::post('/update/{id}','backend\ProductsController@update')->name('admin.product.update');
		Route::post('/delete/{id}','backend\ProductsController@delete')->name('admin.product.delete');
		Route::get('/statusupdate/{id}','backend\ProductsController@statusUpdate')->name('admin.product.statusUpdate');
	});
	Route::group(['prefix' => '/categories'], function(){
		Route::get('/','backend\CategoriesController@index')->name('admin.categories');
		Route::get('/input','backend\CategoriesController@input')->name('admin.category.input');
		Route::post('/input', 'backend\CategoriesController@store')->name('admin.category.store');
		Route::get('/view','backend\CategoriesController@view')->name('admin.category.view');
		Route::get('/statusupdate/{id}','backend\CategoriesController@statusUpdate')->name('admin.category.statusUpdate');
		Route::get('/edit/{id}','backend\CategoriesController@edit')->name('admin.category.edit');
		Route::post('/update/{id}','backend\CategoriesController@update')->name('admin.category.update');
		Route::post('/delete/{id}','backend\CategoriesController@delete')->name('admin.category.delete');
	});
	Route::group(['prefix' => '/brands'], function(){
		Route::get('/','backend\BrandsController@index')->name('admin.brands');
		Route::get('/input','backend\BrandsController@input')->name('admin.brand.input');
		Route::post('/input', 'backend\BrandsController@store')->name('admin.brand.store');
		Route::get('/view','backend\BrandsController@view')->name('admin.brand.view');
		Route::get('/statusupdate/{id}','backend\BrandsController@statusUpdate')->name('admin.brand.statusUpdate');
		Route::get('/edit/{id}','backend\BrandsController@edit')->name('admin.brand.edit');
		Route::post('/update/{id}','backend\BrandsController@update')->name('admin.brand.update');
		Route::post('/delete/{id}','backend\BrandsController@delete')->name('admin.brand.delete');
	});

});

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
| All Frontend routes starts here
*/

Route::get('/', 'frontend\PagesController@index')->name('index');

	Route::group(['prefix' => '/products'], function(){
		Route::get('/category/{slug}','frontend\CategoriesController@show')->name('categories.show');
	});



	// Route::group(['prefix' => '/products'], function(){
	// 	Route::get('/','backend\ProductsController@index')->name('admin.products');
	// 	Route::get('/input','backend\ProductsController@input')->name('admin.product.input');
	// 	Route::post('/input', 'backend\ProductsController@store')->name('admin.product.store');
	// 	Route::get('/view','backend\ProductsController@view')->name('admin.product.view');
	// 	Route::get('/edit/{id}','backend\ProductsController@edit')->name('admin.product.edit');
	// 	Route::post('/update/{id}','backend\ProductsController@update')->name('admin.product.update');
	// 	Route::post('/delete/{id}','backend\ProductsController@delete')->name('admin.product.delete');
	// });


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
