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
    return redirect()->route('home');
});

Auth::routes();

Route::get('register',function(){

    return redirect()->route('login');

})->name('register');

Route::post('register',function(){

    return abort(403);

})->name('register');

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => ['auth']], function () {

    Route::group(['middleware' => ['role:Administrator']], function () {
        
        Route::resource('administracion-de-usuarios','UserAdministrator')->names([
        	'index'=>'user.administrator.index',
        	'edit'=>'user.administrator.edit',
        	'create'=>'user.administrator.create',
        	'store'=>'user.administrator.store',
        	'update'=>'user.administrator.update',
        	'destroy'=>'user.administrator.destroy',
        ]);

        Route::resource('administracion-de-eventos','EventController')->names([
            'index'=>'event.administrator.index',
            'edit'=>'event.administrator.edit',
            'create'=>'event.administrator.create',
            'store'=>'event.administrator.store',
            'update'=>'event.administrator.update',
            'destroy'=>'event.administrator.destroy',
        ]);

        Route::get('administracion-de-usuarios/{id}/restore','UserAdministrator@restore')->name('user.administrator.restore');

        Route::get('administracion/permisos/{id}/{permiso}/agregar','UserAdministrator@addPermission')->name('add.permission');

        Route::get('administracion/permisos/{id}/{permiso}/eliminar','UserAdministrator@deletePermission')->name('delete.permission');

    });

    Route::resource('administracion-de-empleados','EmployeeController')->names([
            'index'=>'employee.index',
            'show'=>'employee.show',
            'edit'=>'employee.edit',
            'create'=>'employee.create',
            'store'=>'employee.store',
            'update'=>'employee.update',
            'destroy'=>'employee.destroy',
        ]);

    Route::get('empleados/consulta','EmployeeController@consult')->name('employee.consult');


    Route::resource('administracion-de-deducciones','DuctionController')->names([
            'index'=>'ductions.index',
            'show'=>'ductions.show',
            'edit'=>'ductions.edit',
            'create'=>'ductions.create',
            'store'=>'ductions.store',
            'update'=>'ductions.update',
            'destroy'=>'ductions.destroy',
        ]);

    Route::post('administracion-de-deducciones/{id}/massiveUpdate','DuctionController@massiveUpdate')->name('ductions.massive.update');


    Route::get('date/edit','DuctionController@changeDateEdit')->name('ductions.date.edit');


    Route::post('administracion-de-deducciones/date/update','DuctionController@changeDateUpdate')->name('ductions.date.update');

    Route::post('empleados/descargas','EmployeeController@download')->name('employee.download');

    Route::post('empleados/descargas/{duction}','EmployeeController@downloadDuction')->name('employee.download.duction');

    Route::get('download/excel/{file}',function(){

        return asset('storage/public/export'.$file);

    });

});
