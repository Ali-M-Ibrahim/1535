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

<h1> List Categories <a  href="{{route('category.create')}}" class="addButton">+</a> </h1>


<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Number of products</th>
        <th>Actions</th>
    </tr>

    @foreach($data as $row)
        <tr>
            <td>{{$row->id}}</td>
            <td>{{$row->name}}</td>
            <td>{{count($row->getProducts)}}</td>
            <td>
                <a href="{{Route('category.show',['category'=>$row->id])}}">View</a>

                <a href="{{Route('category.edit',['category'=>$row->id])}}">Edit</a>

                <a href="{{Route('deleteCategory',['id'=>$row->id])}}">Delete</a>

                <form method="post" action="{{route('category.destroy',['category'=>$row->id])}}">
                    @csrf
                    @method('delete')
                    <input type="submit" value="delete">
                </form>

            </td>
        </tr>
@endforeach
</body>
</html>
