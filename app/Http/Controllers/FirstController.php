<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FirstController extends Controller
{
    public function index(){
        return "Hello i am first controller and i am index function";
    }

    public function index2(){
        return 5+5;
    }

    public function index3(){
        return true;
    }

    public function index4(){
        return response()->json([
            "firstname"=>"Ali",
            "lastname"=>"Ibrahim",
            "address"=>"Beirut"
        ]);
    }


    public function index5(Request $request){

        if($request->header('secret')=="123"){
            return response()->json([
                'message'=>'Your request has been processed'
            ]);
        }else{
            return response()->json([
                'message'=>'You are not authorized to perform this request'
            ]);
        }

    }

    public function index6(Request $request){
        if($request->header('secret')=="123"){
            return response(['message'=>'Your request has been processed'],200);
        }else{
            return response(['message'=>'You are not authorized to perform this request'],404);
        }
    }

    public function index7(Request $request){
        if($request->header('secret')=="123"){
            return response(['message'=>'Your request has been processed'],Response::HTTP_CREATED);
        }else{
            return response(['message'=>'You are not authorized to perform this request'],Response::HTTP_NOT_FOUND);
        }
    }

    public function index8(Request $request){
        // method 1
        $codeServer = $request->code;
        $courseServer = $request->course;


        //method2
        $codeServer2 = $request->input('code','0000');
        $courseServer2 = $request->input('course', "Unknown");

        $sentence =  "The code is " . $codeServer2 . " and the course name is: " . $courseServer2;
        return $sentence;

    }

    public function index9(){
        return response()
            ->json(["message"=>"data with headers"])
//            ->header("hello","Hello Class")
//            ->header("bye","3malo drop");
        ->withHeaders([
            'hello'=>"Hello class",
            "bye"=>"drop the class"
            ]);
    }

    public function index10(){
        return response(["message"=>"data with headers",'message2'=>"another message"],
            250,
            [    'hello'=>"hi class",
                'bye'=>"please drop the course"]);
    }

    public function index11(Request $request, $id){
        $sentence = "The received id is: " .$id;
        return $sentence;
    }

    public function index12(Request $request, $id, $name){
        $sentence = "The received id is: " .$id  . " and the name is: " . $name;
        return $sentence;
    }

    public function index13 (Request $request, $id= 0 ){
        $sentence = "The received id is: " .$id;
        return $sentence;
    }


    public function post(Request $request){
        return "i am post function";
    }

}
