<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
    <style>
        table {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        tr:nth-child(even){background-color: #f2f2f2;}

        tr:hover {background-color: #ddd;}

        th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }


        .addButton{
            font-size: 30px;
        }
    </style>
</head>
<body>

<h1> View Product</h1>

<ul>
    <li>Name: {{$product->name}}</li>
    <li>Description: {{$product->description}}</li>
    <li>Price: {{$product->price}}</li>
    <li>Category ID: {{$product->category_id}}</li>
    <li>Category Name: {{$product->getCategory->name}}</li>
</ul>

<a href="{{route('listProduct')}}">Back</a>
</body>
</html>
