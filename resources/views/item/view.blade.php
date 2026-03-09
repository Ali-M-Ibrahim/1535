<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
</head>
<body>

<h1> {{$pageTitle}}</h1>

<ul>
    <li>The id is: {{$item->id}}</li>
    <li>The title is: {{$item->title}}</li>
    <li>The description is: {{$item->description}}</li>
    <li>The price is: {{$item->price}}</li>
    <li>The created at is: {{$item->created_at}}</li>
    <li>The updated at is: {{$item->update_at}}</li>

</ul>


<ul>
    <li>The max id is: {{$maxId}}</li>
    <li>The min id is: {{$minId}}</li>
    <li>The obj1  is: {{$obj1}}</li>
</ul>


<a href="{{route('my-list')}}">Back to list</a>


</body>
</html>
