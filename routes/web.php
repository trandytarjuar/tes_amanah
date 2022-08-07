<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\QrcodeController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::prefix('api')->group(function () {
//     Route::get('/', [ProjectController::class, 'index'])->name('index');
    // Route::get('apiwithkey', [ProjectController::class, 'apiWithKey'])->name('apiWithKey');
// });
Route::get('/api','App\Http\Controllers\ApiController@index');
Route::get('/api/delete/{id}','App\Http\Controllers\ApiController@delete');
Route::get('/api/edit','App\Http\Controllers\ApiController@edit');

Route::get('/qrcode','App\Http\Controllers\QrcodeController@index');
// Route::delete('/users/delete/{id}',	'admin\UserController@destroy');
