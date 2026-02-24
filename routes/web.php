<?php

use App\Http\Controllers\ApiResourceController;
use App\Http\Controllers\FirstController;
use App\Http\Controllers\ResourceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\ItemController;



Route::get('/', function () {
    return view('welcome');
});

// Recommended Method to define a route
Route::get("/route1",[FirstController::class, 'index']);
Route::get("/route2",[FirstController::class, 'index2']);
Route::get('/route3',[FirstController::class,'index3']);

// Second method
Route::get("/route4","App\Http\Controllers\FirstController@index");
// Third method
Route::get("/route5",[
    'uses'=>"App\Http\Controllers\FirstController@index"
]);
Route::get("/route6",[FirstController::class,'index4']);
Route::get("/route7",[FirstController::class,"index5"]);
Route::get("/route8",[FirstController::class,"index6"]);
Route::get("/route9",[FirstController::class,"index7"]);
Route::get("/route10",[FirstController::class,"index8"]);
Route::get("/route11",[FirstController::class,"index9"]);
Route::get("/route12",[FirstController::class,"index10"]);
Route::get("/find/{id}",[FirstController::class, 'index11']);
Route::get("/find2/{id}/{name}",[FirstController::class, 'index12']);
Route::get("/find3/{id?}",[FirstController::class, 'index13']);



Route::post("/post",[FirstController::class,'post']);
Route::put("/post",[FirstController::class,'post']);
Route::delete("/post",[FirstController::class,'post']);


Route::get("/DONTUSE",function (){
 return "hello";
});

Route::resource('newitem',ResourceController::class);
//->only(['index','create']);
//->except('destroy');

Route::apiResource('apislug',ApiResourceController::class);

Route::get("invoke",\App\Http\Controllers\InvokeController::class);


Route::get("relations",[DataController::class,'index']);

Route::get('create-item-1',[ItemController::class,'create1']);
Route::get('create-item-2',[ItemController::class,'create2']);
Route::post('create-item-3',[ItemController::class,'create12']);
Route::post('create-item-4',[ItemController::class,'create3']);
Route::get('create-item-5',[ItemController::class,'create4']);

Route::get("getItemById/{id}",[ItemController::class,'getItemById']);
Route::get("getItems",[ItemController::class,'getItems']);
Route::get("getItemsHavingPrice100",[ItemController::class,'getItemsHavingPrice100']);
Route::get("getItems",[ItemController::class,'getItems']);
Route::get("getItemByOperator",[ItemController::class,'getItemByOperator']);
Route::get("getItemsMultipleConditions",[ItemController::class,'getItemsMultipleConditions']);
Route::get("getItemsWithOr",[ItemController::class,'getItemsWithOr']);

Route::get("getItemsIn",[ItemController::class,'getItemsIn']);
Route::get("getItemsBetween",[ItemController::class,'getItemsBetween']);
Route::get("getItemsOrderByPrice",[ItemController::class,'getItemsOrderByPrice']);
Route::get("statistics",[ItemController::class,'statistics']);
Route::get("GroupByPrice",[ItemController::class,'GroupByPrice']);
Route::get("getElements",[ItemController::class,'getElements']);
Route::get("getDataJoin",[ItemController::class,'getDataJoin']);
Route::get("update1",[ItemController::class,'update1']);
Route::put("update2",[ItemController::class,'update2']);

Route::get("massUpdate",[ItemController::class,'massUpdate']);

Route::get("createOrUpdate1",[ItemController::class,'createOrUpdate1']);

Route::get("delete",[ItemController::class,'delete']);

Route::get("massDelete",[ItemController::class,'massDelete']);












