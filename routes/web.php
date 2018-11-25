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

Route::group(['middleware' => ['auth','admin'],'prefix'=>'class'], function(){
    Route::get('/', 'ClassController@index')->name('class');
    Route::get('/create/new', 'ClassController@create')->name('class.create');
    Route::post('/store/new', 'ClassController@store')->name('class.store');
    Route::get('/edit/{id}', 'ClassController@edit')->name('class.edit');
    Route::post('/update/{id}', 'ClassController@update')->name('class.update');
    Route::get('/delete/{id}', 'ClassController@destroy')->name('class.delete');
});


Route::group([ 'middleware' => ['auth','admin'],'prefix'=>'user'], function(){
    Route::get('/', 'UsersController@index')->name('users');
    Route::get('/create/new', 'UsersController@create')->name('user.create');
    Route::post('/store/new', 'UsersController@store')->name('user.store');
    Route::get('/edit/{id}', 'UsersController@edit')->name('user.edit');
    Route::post('/update/{id}', 'UsersController@update')->name('user.update');
    Route::get('/delete/{id}', 'UsersController@destroy')->name('user.delete');
    Route::get('/reset/{id}', 'UsersController@reset')->name('user.reset.password');
});

Route::group([ 'middleware' => ['auth','admin'],'prefix'=>'department'], function(){
    Route::get('/', 'DepartmentsController@index')->name('departments');
    Route::get('/create/new', 'DepartmentsController@create')->name('dept.create');
    Route::post('/store/new', 'DepartmentsController@store')->name('dept.store');
    Route::get('/edit/{id}', 'DepartmentsController@edit')->name('dept.edit');
    Route::post('/update/{id}', 'DepartmentsController@update')->name('dept.update');
    Route::get('/delete/{id}', 'DepartmentsController@destroy')->name('dept.delete');
});


Route::group([ 'middleware' => ['auth','admin'],'prefix'=>'document'], function(){
    Route::get('/', 'DocumentsController@index')->name('documents');
    Route::get('/archive', 'DocumentsController@archive')->name('archive');
    Route::get('/create/new', 'DocumentsController@create')->name('document.create');
    Route::post('/store/new', 'DocumentsController@store')->name('document.store');
    Route::get('/edit/{id}', 'DocumentsController@edit')->name('document.edit');
    Route::post('/update/{id}', 'DocumentsController@update')->name('document.update');
    Route::get('/state/update/{id}', 'DocumentsController@state')->name('document.state.update');
    Route::get('/pending', 'DocumentsController@pending')->name('documents.pending');
    Route::get('/search', 'DocumentsController@search')->name('documents.search');
    Route::get('/document/details/{document_no}', 'DocumentsController@show')->name('document.details');
});

Route::group([ 'middleware' => ['auth','admin'],'prefix'=>'retention'], function(){
    Route::get('/', 'RetentionController@index')->name('retentions');
    Route::get('/create/new', 'RetentionController@create')->name('retention.create');
    Route::post('/store/new', 'RetentionController@store')->name('retention.store');
    Route::get('/edit/{id}', 'RetentionController@edit')->name('retention.edit');
    Route::post('/update/{id}', 'RetentionController@update')->name('retention.update');
    Route::get('/delete/{id}', 'RetentionController@destroy')->name('retention.delete');

});


Route::group([ 'middleware' => ['auth','user'],'prefix'=>'user'], function(){
    Route::get('/documents', 'UserDocumentController@index')->name('user.documents');
    Route::get('/document/details/{document_no}', 'UserDocumentController@show')->name('user.document.details');
});

Route::get('update/archive', [
    'uses' => 'DocumentsController@archive',
    'as' => 'update.archive'
]);



