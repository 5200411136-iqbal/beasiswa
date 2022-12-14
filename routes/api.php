<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('mahasiswa', 'MahasiswaController@index');
Route::post('mahasiswa','MahasiswaController@create');
Route::put('/mahasiswa/{id}','MahasiswaController@update');
Route::delete('/mahasiswa/{id}','MahasiswaController@delete');

Route::post('/mahasiswa/{id}', 'MahasiswaController@testing');