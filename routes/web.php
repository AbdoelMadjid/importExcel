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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::group(['middleware' => ['role:Administrator']], function () {
    
    Route::resource('administracion-de-usuarios','UserAdministrator')->names([
    	'index'=>'user.administrator.index',
    	'edit'=>'user.administrator.edit',
    	'create'=>'user.administrator.create',
    	'store'=>'user.administrator.store',
    	'update'=>'user.administrator.update',
    	'destroy'=>'user.administrator.destroy',
    ]);

    Route::resource('administracion-de-empleados','EmployeeController')->names([
    	'index'=>'employee.index',
    	'edit'=>'employee.edit',
    	'create'=>'employee.create',
    	'store'=>'employee.store',
    	'update'=>'employee.update',
    	'destroy'=>'employee.destroy',
    ]);

});
