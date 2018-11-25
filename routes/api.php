<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/user', function(){
    return Response::json(['users' => \App\User::all() ]);
})->name('api.users');

Route::get('/update/read_status/{id}', function(){
    return Response::json(['users' => \App\User::all() ]);
})->name('api.users');

Route::get('/notification/{id}', 'UserDocumentController@notification');
Route::get('/notification/read/{id}', 'UserDocumentController@read');