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

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.'], function(){

    /*Formulário de login*/
	Route::get('/', 'AuthController@showLoginForm')->name('login');
    Route::post('login', 'AuthController@login')->name('login.do');

    /*Rotas Protegidas*/
    Route::group(['middleware' => ['auth']], function() {

        /*Dashboard*/
        Route::get('home', 'AuthController@home')->name('home');

        /** Usuarios */
        Route::get('users/team', 'UserController@team')->name('users.team');
        Route::post('users/get-data-company', 'UserController@getDataCompany')->name('user.getDataCompany');
        Route::resource('users', 'UserController');

        /** Empresas */
        Route::resource('companies', 'CompanyController');

        //Marcas de Veículos
        Route::resource('vehicles/brands', 'VehicleBrandController');

        //Modelos de Veículos
        Route::resource('vehicles/models', 'VehicleModelController');

        //Tipos de Veículos
        Route::resource('vehicles/types', 'VehicleTypeController');

        //Veiculos
        Route::resource('vehicles', 'VehicleController');

        //Vendedoress
        Route::resource('sellers', 'SellerController');

        //Processos
        Route::post('processes/get-data-owner', 'ProcessController@getDataOwner')->name('processes.getDataOwner');
        Route::post('processes/get-data-vehicle', 'ProcessController@getDataVehicle')->name('processes.getDataVehicle');
        Route::post('processes/get-data-company', 'ProcessController@getDataCompany')->name('processes.getDataCompany');
        Route::resource('processes', 'ProcessController');

    });

    Route::get('logout', 'AuthController@logout')->name('logout');
});
