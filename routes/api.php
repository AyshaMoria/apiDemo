<?php

use App\Http\Controllers\apiDemo;
use App\Http\Controllers\apiDemo2;
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

//working with testings table in modelpractice Db & apiDemo controller

Route::post('/insertsingleData',[apiDemo::class,'insertsingleData']);//1) insert single data without validation
Route::get('/insertData',[apiDemo::class,'insertData']);//2) insert multiple data without validation with post method
Route::post('/insertDatavalidator',[apiDemo::class,'insertDatavalidator']);//3) insert single data with validation
Route::get('/show',[apiDemo::class,'showData']);  //4) view static data
Route::get('/getData',[apiDemo::class,'getData']);//5) view all data in json formate
Route::post('/getSpecData',[apiDemo::class,'getSpecData']);//6) view specific data in json formate
Route::get('/getSpecDataparam/{id}',[apiDemo::class,'getSpecDataparam']);//7) view specific data with complesory argument if not getting data it will show error
Route::get('/getSpecDataOptional/{id?}',[apiDemo::class,'getSpecDataOptional']);//8) view specific data with optional argument will show that data or will show all data
Route::post('/updateData',[apiDemo::class,'updateData']);//9) update specific dataand display in json formate
Route::post('/deleteData',[apiDemo::class,'deleteData']);//10) delete data and show mwssage in json formate with get method
Route::get('/deleteDataparam/{id}',[apiDemo::class,'deleteDataParam']);//10) delete data and show mwssage in json formate with get method




//practice 
//working with studentss table in modelpractice Db & apiDemo2 controller 
/*
Route::get('/insertData',[apiDemo2::class,'insertData']);//1) insert single data without validation
Route::get('/insertData',[apiDemo2::class,'insertData']);//2) insert multiple data without validation

Route::post('/insertDatavalidator',[apiDemo2::class,'insertDatavalidator']);//3) insert single data with validation
Route::get('/showStaticData',[apiDemo2::class,'showStaticData']);  //4) view static data
Route::get('/getData',[apiDemo2::class,'getData']);//5) view all data in json formate
Route::post('/getSpecData',[apiDemo2::class,'getSpecData']);//6) view specific data in json formate
Route::get('/getSpecDataparam/{id}',[apiDemo2::class,'getSpecDataparam']);//7) view specific data with complesory argument if not getting data it will show error
Route::get('/getSpecDataOptional/{id?}',[apiDemo2::class,'getSpecDataOptional']);//8) view specific data with optional argument will show that data or will show all data
Route::post('/updateData',[apiDemo2::class,'updateData']);//9) update specific dataand display in json formate
Route::post('/deleteData',[apiDemo2::class,'deleteData']);//10) delete data and show mwssage in json formate with get method
*/
