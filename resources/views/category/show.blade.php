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

<h1> View Category</h1>

<ul>
    <li>Name: {{$row->name}}</li>

</ul>

<a href="{{route('category.index')}}">Back</a>
</body>
</html>
