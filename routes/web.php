<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\insertTestingData;

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


Route::view('/ajaxDemo', 'ajaxDemo');

Route::get('/insertTestingData',[insertTestingData::class,'insert']);
Route::get('/updateTestingData',[insertTestingData::class,'update']);
