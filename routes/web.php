
<?php

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
	return view('welcome');
});

Route::group(['prefix'=>'admin'],function(){

	Route::group(['prefix'=>'category'],function(){
		// Route::get('add-category', function(){
		// 	return view('admin.cate.add');
		// });
		Route::get('list-category',['as'=>'list-category.show','uses'=>'CateController@show']);
		Route::get('add-category',['as'=>'add-category.index','uses'=>'CateController@index']);
		Route::post('add-category',['as'=>'add-category.store','uses'=>'CateController@store']);
		Route::get('edit-category/{id}',['as'=>'edit-category.edit','uses'=>'CateController@edit']);
		Route::post('edit-category/{id}',['as'=>'edit-category.show','uses'=>'CateController@showEdit']);
		Route::get('delete-category/{id}',['as'=>'delete-category.destroy','uses'=>'CateController@destroy']);

	});
	
	Route::group(['prefix'=>'product'],function(){
		Route::get('add-product',function(){
			return view('admin.product.add');
		});

		Route::get('edit-product',function(){
			return view('admin.product.edit');
		});

		Route::get('list-product', function(){
			return view('admin.product.list');
		});
	});

	Route::group(['prefix'=>'user'],function(){
		Route::get('add-user',function(){
			return view('admin.user.add');
		});

		Route::get('edit-user',function(){
			return view('admin.user.edit');
		});

		Route::get('list-user', function(){
			return view('admin.user.list');
		});
	});

});



