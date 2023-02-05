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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// API HERE
Route::get('package', 'App\Http\Controllers\MileController@GetPackage');
Route::get('package/{id}', 'App\Http\Controllers\MileController@GetPackageByID');
Route::post('package', 'App\Http\Controllers\MileController@CreatePackage');
Route::delete('package/{id}', 'App\Http\Controllers\MileController@DeletePackage');
Route::put('package', 'App\Http\Controllers\MileController@PutPackage');
Route::patch('package' , [
    'as'=>'update.package',
    'uses' => 'App\Http\Controllers\MileController@UpdatePackage' ,
]) ;

