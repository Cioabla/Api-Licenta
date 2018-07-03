<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return $app->version();
});

$app->group(['prefix'=>'api/v1' , 'middleware' => 'checkJwtSecret'],function ($app){

    $app->group(['prefix' => 'posts'],function ($app){
        $app->post('add','PostController@createPost');
        $app->get('view/{name}','PostController@viewPost');
        $app->put('edit/{name}','PostController@updatePost');
        $app->delete('delete/{name}','PostController@deletePost');
        $app->get('index','PostController@index');
    });

    $app->group(['prefix' => 'users'],function ($app){
        $app->post('add','UserController@add');
        $app->get('view/{name}','UserController@viewUser');
        $app->get('login/{name}','UserController@login');
        $app->put('edit/{name}','UserController@updateUser');
        $app->delete('delete/{name}','UserController@deleteUser');
        $app->get('index','UserController@index');
    });

    $app->group(['prefix' => 'categories'],function ($app){
        $app->post('add','CategoryController@add');
        $app->get('view/{name}','CategoryController@viewPost');
        $app->put('edit/{name}','CategoryController@updatePost');
        $app->delete('delete/{name}','CategoryController@deletePost');
        $app->get('index','CategoryController@index');
    });

    $app->group(['prefix' => 'subcategories'],function ($app){
        $app->post('add','SubcategoryController@add');
        $app->get('view/{name}','SubcategoryController@viewPost');
        $app->put('edit/{name}','SubcategoryController@updatePost');
        $app->delete('delete/{name}','SubcategoryController@deletePost');
        $app->get('index','SubcategoryController@index');
    });

    $app->group(['prefix' => 'home'],function ($app){
        $app->post('add','HomeProduceController@add');
        $app->get('view/{name}','HomeProduceController@viewPost');
        $app->put('edit/{name}','HomeProduceController@updatePost');
        $app->delete('delete/{name}','HomeProduceController@deletePost');
        $app->get('index','HomeProduceController@index');
    });

    $app->group(['prefix' => 'products'],function ($app){

        $app->get('index/{name}/{page}','ProductController@index');
        $app->get('length/{name}','ProductController@length');
        $app->get('product/{name}','ProductController@oneProduct');
    });

});

$app->group(['prefix'=>'api/v1'],function ($app){

    $app->group(['prefix' => 'users'],function ($app){
        $app->get('checkUsername/{username}','UserController@checkUsername');
        $app->get('checkEmail/{email}','UserController@checkEmail');
    });

});