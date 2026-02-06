<?php

use App\Http\Controllers\FirstController;
use Illuminate\Support\Facades\Route;

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
