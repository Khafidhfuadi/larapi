<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/siswa', 'SiswaController@get_siswa')->name('siswa');
Route::get('siswa/{id}', 'SiswaController@show');
Route::post('siswa/post', 'SiswaController@store');
Route::put('siswa/update/', 'SiswaController@update');
Route::post('siswa/hapus/', 'SiswaController@destroy');

Route::get('/status/{id}', 'UserStatusController@show');
Route::get('/materi/{id}', 'MateriController@show');
Auth::routes();