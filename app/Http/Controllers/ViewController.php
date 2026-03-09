<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index(){
        return view("page1");
    }

    public function listItems()
    {
        $title = "List Items from database";
        $number = Item::count();
        // SELECT * FROM ITEMS
        $data = Item::all();
        $total = Item::sum('price');
//        return view("item.index",[
//            'page_title'=>$title,
//            'page_number'=>$number,
//            'page_data'=>$data]);


        $this->prepareData();
        return view("item.index")
            ->with("page_data",$data)
            ->with("page_title",$title)
            ->with("page_number",$number)
            ->with("total",$total);


    }

    public function viewItem($id)
    {
        $this->prepareData();
        $pageTitle = "View Item";
        $item = Item::findOrFail($id);
        return view("item.view",compact("pageTitle","item"));
    }

    public function prepareData()
    {
        $obj1  = "Copyrights @2026 - Antonine University";
        $maxId = Item::max("id");
        $minId = Item::min("id");
        \View::share(["obj1" => $obj1, "maxId" => $maxId, "minId" => $minId]);
    }
}
