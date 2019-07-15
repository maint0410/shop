
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
		Route::get('list-category',['as'=>'list-category.show','uses'=>'CateController@show']);
		Route::get('add-category',['as'=>'add-category.index','uses'=>'CateController@index']);
		Route::post('add-category',['as'=>'add-category.store','uses'=>'CateController@store']);
		Route::get('edit-category/{id}',['as'=>'edit-category.edit','uses'=>'CateController@edit']);
		Route::post('edit-category/{id}',['as'=>'edit-category.show','uses'=>'CateController@showEdit']);
		Route::get('delete-category/{id}',['as'=>'delete-category.destroy','uses'=>'CateController@destroy']);

	});
	
	Route::group(['prefix'=>'product'],function(){
		//hiển thị danh sách product
		Route::get('list-product',['as'=>'list-product.index','uses'=>'ProductController@index']);

		//hiển thị form tạo-add
		Route::get('add-product',['as'=>'add-product.create','uses'=>'ProductController@create']);

		//hiển thị một tài nguyên được chỉ định
		// Route::get('list-product',['as'=>'list-product.show','uses'=>'ProductController@show']);

		//Lưu trữ một tài nguyên mới được tạo
		Route::post('add-product',['as'=>'add-product.store','uses'=>'ProductController@store']);

		//hiển thị form sửa-edit
		Route::get('edit-product/{id}',['as'=>'edit-product.edit','uses'=>'ProductController@edit']);

		//Update một tài nguyên được edit
		Route::post('edit-product/{id}',['as'=>'edit-product.update','uses'=>'ProductController@update']);

		//Xóa tài nguyên được chỉ định
		Route::get('delete-product/{id}',['as'=>'delete-product.destroy','uses'=>'ProductController@destroy']);

		//Xóa ảnh
		Route::get('delImage/{id}',['as'=>'del-image-product.destroy','uses'=>'ProductController@destroyImg']);
	});

	Route::group(['prefix'=>'user'],function(){
		
	});

});



