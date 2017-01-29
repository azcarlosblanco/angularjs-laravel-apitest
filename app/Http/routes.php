<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::group(['prefix' => '','middleware' => ['jwt.auth', 'jwt.refresh']], function() {
    Route::get('/', function(){
        return view('index');
    });
//});



//Route::get('api/test',['as' => 'test', 'uses' => function () {
//    $user = \Tymon\JWTAuth\Facades\JWTAuth::parseToken();
//    dd(\Tymon\JWTAuth\Facades\JWTAuth::getToken());
//}]);

Route::get('api/test',['as' => 'test', 'uses' => 'AuthenticateController@test']);

Route::resource('api/authenticate', 'AuthenticateController', ['only' => ['index']]);
Route::post('api/authenticate', 'AuthenticateController@authenticate');

Route::group(['prefix' => 'api/v1/'], function () {

    Route::get('book/{id?}', 'BookController@index');
    Route::post('book', 'BookController@store');
    Route::post('book/{id}', 'BookController@update');
    Route::delete('book/{id}', 'BookController@destroy');

    Route::get('author/{id?}', 'AuthorController@index');
    Route::get('authorList','AuthorController@getAll');
    Route::post('author/', 'AuthorController@store');
    Route::post('author/{id}', 'AuthorController@update');
    Route::delete('author/{id}', 'AuthorController@destroy');

    Route::get('genre/{id?}', 'GenreController@index');
    Route::get('genreList','GenreController@getAll');
    Route::post('genre/', 'GenreController@store');
    Route::post('genre/{id}', 'GenreController@update');
    Route::delete('genre/{id}', 'GenreController@destroy');


});








/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

});
