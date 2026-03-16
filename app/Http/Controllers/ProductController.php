<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $data = Product::all();
        return view('product.list',compact('data'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('product.create',compact('categories'));
    }

    public function save(Request $request){
        $row = new Product();
        $row->name = $request->body_name;
        $row->description = $request->body_description;
        $row->price = $request->body_price;
        $row->category_id = $request->body_category;
        $row->save();
        return redirect()->route('listProduct');
    }
    public function view($id)
    {
        $product = Product::findOrfail($id);
        return view('product.view',compact('product'));
    }

    public function edit($id){
        $categories = Category::all();
        $product = Product::findOrfail($id);
        return view('product.edit',compact('product','categories'));
    }

    public function update(Request $request,$id)
    {
        $row = Product::findOrFail($id);
        $row->name = $request->body_name;
        $row->description = $request->body_description;
        $row->price = $request->body_price;
        $row->category_id = $request->body_category;
        $row->save();
        return redirect()->route('listProduct');
    }

    public function delete($id)
    {
        $row = Product::findOrFail($id);
        $row->delete();
        return redirect()->route('listProduct');
    }
}
