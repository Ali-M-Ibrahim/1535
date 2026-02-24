<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    // C R U D
    //Create Read Update Delete
    public function create1(){
        //first method to create a row in database
        $obj = new Item();
        $obj->title = "Title 1";
        $obj->description = "Description 1";
        $obj->price = 100;
        $obj->save();
        return response(["msg"=>"row created successfully"],Response::HTTP_CREATED);
    }

    public function create2(){
        Item::create([
           'title' => "Title 2",
           'description' => "Description 2",
           'price' => 200,
        ]);
        return response(["msg"=>"row created successfully"],Response::HTTP_CREATED);
    }

    public function create12 (Request $request)
    {
        // Body in request should be as follows:
        /*
         *
         *
         * {
                "body_title": "Item Title",
                "body_description": "Item Description",
                "body_price": 500,
                    }

         *
         *
         */
        $obj = new Item();
        $obj->title = $request->body_title;
        $obj->description = $request->body_description;
        $obj->price = $request->body_price;
        $obj->save();

        Item::create([
            'title' => $request->body_title,
            'description' =>  $request->body_description,
            'price' => $request->body_price,
        ]);
        return response(["msg"=>"row created successfully"],Response::HTTP_CREATED);


    }

    public function create3(Request $request){
        Item::create($request->all());
        return response(["msg"=>"row created successfully"],Response::HTTP_CREATED);
    }

    public function create4()
    {
        DB::table('items')->insert([
            'title' => 'title4',
            'description' => "description4",
            'price' => 100,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response(["msg"=>"row created successfully"],Response::HTTP_CREATED);
    }

    public function getItemById($id){
        // SELECT * FROM ITEMS WHERE ID =?
//        $row  = Item::find($id);

        //if you want to display an error if the id does not exist
        $row = Item::findOrFail($id);

        //if you want to return something specific if the id does not exist
//        $row = Item::findOr($id,function(){
//           return [];
//        });
        return $row;
    }

    public function getItems(){
        // SELECT * FROM ITEMS;
        $data = Item::all();
        return $data;
    }

    public function getItemsHavingPrice100()
    {
        // SELECT * FROM ITEMS WHERE PRICE = 100;
        $data = Item::where("price",100)->get();
        return $data;

    }

    public function getItemByOperator()
    {
        // SELECT * FROM ITEMS WHERE PRICE >= 100;
        $data = Item::where("price", '>=' , 100)->get();
        return $data;
    }

    public function getItemsMultipleConditions()
    {
        // select * from items where price > 100 and title= title 1;
        $data = Item::where('price',100)
            ->where('title',"title 1")
            ->get();
                //when using get, laravel will return array
                // when using first, laravel will return first row
//        ->first();
        return $data;
    }

    public function getItemsWithOr(){
        $data = Item::where('title','Title 1')
            ->OrWhere("price",">","150")
            ->get();
        return $data;
    }

    public function getItemsIn()
    {
        // SELECT * FROM ITEMS WHERE ID IN (1,2,3,4);
        $data = Item::whereIn("id",[1,2,3,4])->get();
        return $data;
    }

    public function getItemsBetween()
    {
        $data = Item::whereBetween('price',[20,200])->get();
        return $data;
    }

    public function getItemsOrderByPrice()
    {
        $data = Item::orderBy("price","asc")->get();
        $data = Item::orderBy("price","desc")->get();
        return $data;
    }

    public function statistics(){
        $maxId = Item::max("id");
        $minIn = Item::min("id");
        $avgPrice = Item::avg("price");
        $countItems = Item::count("id");
        $sumPrice = Item::sum("price");
        return response()->json([
            'maxId' => $maxId,
            'minIn' => $minIn,
            'avgPrice' => $avgPrice,
            'countItems' => $countItems,
            'sumPrice' => $sumPrice,
        ]);
    }

    public function GroupByPrice()
    {

        $data = Item::select(["price"])->groupBy("price")->get();
        return $data;
    }

    public function getElements()
    {
        //select title, description from items
        $data = Item::select(['title','description','price'])->get();
        return $data;
    }

    public function getDataJoin(){
        $data = Student::join('passports','students.id','passports.student_id')
            ->get();
        return $data;

    }

    public function update1()
    {
        $obj = Item::find(1);
        $obj->title = "Title updated";
        $obj->description = "Description updated";
        $obj->price = 1;
        $obj->save();
        return "object updated successfully";
    }

    public function update2(Request $request)
    {
        $obj = Item::find(1);
        $obj->fill($request->all());
        if($obj->isClean()){
            return "data not changed";
        }
        $obj->save();
        return "object updated successfully";

    }

    public function massUpdate()
    {
        Item::where('price',100)->update(['price' => 10,'title'=>"updated price"]);
        return "object updated successfully";
    }

    public function createOrUpdate1()
    {
       $state =  Item::updateOrCreate(
            [
                'id'=>11
            ],
            [
                'title' => "Title createupdate",
                'description' => "Description createupdate",
                'price' => 200,
            ]
        );

        return $state;
    }


    public function delete(){
        $row = Item::find(1);
        $row->delete();

        return "row deleted successfully";
    }

    public function massDelete()
    {
        Item::where('price','>',200)->delete();
        return "items deleted successfully";
    }






}
