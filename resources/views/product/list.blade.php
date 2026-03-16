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

<h1> List Products <a  href="{{route('createProduct')}}" class="addButton">+</a> </h1>


<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Category</th>
        <th>Actions</th>
    </tr>

    @foreach($data as $row)
        <tr>
            <td>{{$row->id}}</td>
            <td>{{$row->name}}</td>
            <td>{{$row->getCategory->name}}</td>
            <td>
                <a href="{{Route('viewProduct',['id'=>$row->id])}}">View</a>

                <a href="{{Route('editProduct',['id'=>$row->id])}}">Edit</a>

                <a href="{{Route('deleteProduct2',['id'=>$row->id])}}">Delete</a>


                <form method="post" action="{{route('deleteProduct',['id'=>$row->id])}}">
                    @csrf
                    @method('delete')
                    <input type="submit" value="delete">
                </form>

            </td>
        </tr>
    @endforeach
</body>
</html>
