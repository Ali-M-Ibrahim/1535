<!DOCTYPE html>
<html>
<style>
    form {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
    }

    label {display: block;}

    input, textarea, select {
        width: 100%;
        padding: 12px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type=submit], a {
        width: 100%;
        background-color: #4CAF50;
        color: white;
        padding: 14px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type=submit]:hover {
        background-color: #45a049;
    }

    .btn{
        display: block;
        padding: 14px;
        margin: 8px 0;
        text-align: center;
        margin-top: 20px;
        background: gray;
    }
</style>
<body>

<h2>Edit Category</h2>

<form method="post" action="{{route('category.update',['category'=>$row->id])}}">
    @csrf
    @method('put')
    <label for="name">Name</label>
    <input value="{{$row->name}}" required type="text" id="name" name="name" placeholder="Category name..">

    <input type="submit" value="Submit">

    <a class="btn " href="{{route('category.index')}}">Cancel</a>

</form>

</body>
</html>


