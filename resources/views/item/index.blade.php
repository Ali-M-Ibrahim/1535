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
    </style>
</head>
<body>

<h1> {{$page_title}} </h1>
<h5># of items is: {{$page_number}}</h5>


<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Description</th>
        <th>Price</th>
        <th>Created At</th>
        <th>Actions</th>
    </tr>
    @foreach($page_data as $row)
        <tr>
            <td>{{$row->id}}</td>
            <td>{{$row->title}}</td>
            <td>{{$row->description}}</td>
            <td>{{$row->price}}</td>
            <td>{{$row->created_at}}</td>
            <td>
                <a href="/view-item/{{$row->id}}">Edit</a>
                <a href="{{route('my-view',['id'=>$row->id])}}">Edit Recommended</a>
            </td>
        </tr>
    @endforeach

</table>

@isset($total)
<h1>The total price is: {{$total}}</h1>
@endisset


<ul>
    <li>The max id is: {{$maxId}}</li>
    <li>The min id is: {{$minId}}</li>
    <li>The obj1  is: {{$obj1}}</li>
</ul>


</body>
</html>
