<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//group routes for vitural
// Route::get('/tung', function(){
//         dd(212);
//     } );
Route::group(array('prefix'=>'tungtt','namespace' => 'Vitural'), function () {

    Route::get('/login', array('as'=>'vitural.getlogin','uses'=>'VituralController@getLogin'));

    Route::post('/login', array('as'=>'vitural.postlogin','uses'=>'VituralController@postLogin'));

    Route::get('/', array('as'=>'employee.top','uses'=>'VituralController@employeeTop'));

    Route::get('/member/{id}/edit', array('as'=>'employee.edit','uses'=>'VituralController@employeeEdit'));

    Route::post('/member/{id}/edit/conf', array('as'=>'employee.conf','uses'=>'VituralController@employeeConfirm'));

    Route::get('/member/{id}/edit/conf', array('as'=>'employee.getconf','uses'=>'VituralController@employeeGetConfirm'));

    Route::post('/member/{id}/edit/comp', array('as'=>'employee.comp','uses'=>'VituralController@employeeComplete'));

    Route::get('/logout', array('as'=>'logout','uses'=>'VituralController@logout'));

    Route::get('/boss', array('as'=>'boss.top','uses'=>'VituralController@bossTop'));

    Route::get('/search', array('as'=>'boss.search','uses'=>'VituralController@bossSearch'));

    Route::get('/search?', array('as'=>'boss.search_detail','uses'=>'VituralController@bossSearchDetail'));

    Route::get('/member/{id}/detail', array('as'=>'employee.detail','uses'=>'VituralController@employeeDetail'));

    Route::get('/member/{id}/edit', array('as'=>'employee.editdetail','uses'=>'VituralController@employeeEditDetail'));

    Route::post('/member/{id}/edit/conf', array('as'=>'employee.editdetailconf','uses'=>'VituralController@employeeEditDetailConfirm'));

    Route::get('/member/{id}/edit/conf', array('as'=>'employee.editdetailgetconf','uses'=>'VituralController@employeeGetEditDetailConfirm'));

    Route::post('/member/{id}/edit/comp', array('as'=>'employee.editdetailcomp','uses'=>'VituralController@employeeEditDetailComplete'));

    Route::get('/member/{id}/delete/conf', array('as'=>'employee.getdeleteconf','uses'=>'VituralController@employeeGetDeleteConfirm'));

    Route::post('/member/{id}/delete/conf', array('as'=>'employee.deleteconf','uses'=>'VituralController@employeeDeleteConfirm'));

    Route::post('/member/{id}/delete/comp', array('as'=>'employee.deletecomp','uses'=>'VituralController@employeeDeleteComplete'));

    Route::get('/add', array('as'=>'boss.add','uses'=>'VituralController@add'));

    Route::post('/add/conf', array('as'=>'boss.addconf','uses'=>'VituralController@addConfirm'));

    Route::post('/add/comp', array('as'=>'boss.addcomp','uses'=>'VituralController@addComplete'));

    Route::get('/admin', array('as'=>'admin.top','uses'=>'VituralController@adminTop'));
    
    Route::get('/admin', array('as'=>'admin.top','uses'=>'VituralController@adminTop'));

    // Route::get('/search', array('as'=>'admin.search','uses'=>'VituralController@bossSearch'));

    Route::get('/search?admin', array('as'=>'admin.search_detail','uses'=>'VituralController@adminSearchDetail'));

    
});

