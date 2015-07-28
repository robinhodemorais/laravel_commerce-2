<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('exemplo', 'WelcomeController@exemplo');
Route::get('home', 'HomeController@index');


Route::group(['prefix' => 'admin', 'where' => ['id' => '[0-9]+']], function() {
    Route::group(['prefix' => 'categories'], function() {
        Route::get('', ['as' => 'categories', 'uses' => 'CategoriesController@index']);
        Route::post('', ['as' => 'categories.store', 'uses' => 'CategoriesController@store']);
        Route::get('create', ['as' => 'categories.create', 'uses' => 'CategoriesController@create']);
        Route::get('{id}/destroy', ['as' => 'categories.destroy', 'uses' => 'CategoriesController@destroy']);
        Route::get('{id}/edit', ['as' => 'categories.edit', 'uses' => 'CategoriesController@edit']);
        Route::put('{id}/update', ['as' => 'categories.update', 'uses' => 'CategoriesController@update']);
    });

    Route::group(['prefix' => 'products'], function() {
        Route::get('', ['as' => 'products', 'uses' => 'ProductsController@index']);
        Route::post('', ['as' => 'products.store', 'uses' => 'ProductsController@store']);
        Route::get('create', ['as' => 'products.create', 'uses' => 'ProductsController@create']);
        Route::get('{id}/destroy', ['as' => 'products.destroy', 'uses' => 'ProductsController@destroy']);
        Route::get('{id}/edit', ['as' => 'products.edit', 'uses' => 'ProductsController@edit']);
        Route::put('{id}/update', ['as' => 'products.update', 'uses' => 'ProductsController@update']);

        Route::group(['prefix' => 'images'], function() {
            Route::get('{id}/product',['as' => 'products.images', 'uses' => 'ProductsController@images']);
        });
    });


    Route::group(['prefix' => 'users'], function() {
        Route::get('', ['as' => 'users', 'uses' => 'UsersController@index']);
        Route::post('', ['as' => 'users.store', 'uses' => 'UsersController@store']);
        Route::get('create', ['as' => 'users.create', 'uses' => 'UsersController@create']);
        Route::get('{id}/destroy', ['as' => 'users.destroy', 'uses' => 'UsersController@destroy']);
        Route::get('{id}/edit', ['as' => 'users.edit', 'uses' => 'UsersController@edit']);
        Route::put('{id}/update', ['as' => 'users.update', 'uses' => 'UsersController@update']);
    });
});



Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);


/*

Route::get('produtos', ['as' => 'produtos', function(){
    echo Route::CurrentRouteName();
    // return "Produtos";
}]);


Route::get('category/{category}', function(\CodeCommerce\Category $category){
    dd($category);
});


Route::pattern('id', '[0-9]+');

Route::get('user/{id?}', function($id = 123){
   if($id)
       return "Ola $id";
    return "Não possui ID";
});


Route::get('category/{id}', function($id){
    $category = new \CodeCommerce\Category();
    $c = $category->find($id);

    return $c->name;
});

Route::get('user/{id?}', function($id = 123){
   if($id)
       return "Ola $id";
    return "Não possui ID";
})->where('id','[0-9]+');

Route::match(['get','post'], 'exemplo2', function(){
   return "oi";
});
Route::any('exemplo2', function(){

});

Route::put('exemplo2', 'WelcomeController@exemplo');
*/