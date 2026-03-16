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

<h2>Edit Product</h2>

<form method="post" action="{{route('updateProduct',['id'=>$product->id])}}">
    @csrf
    @method('put')
    <label for="name">Name</label>
    <input value="{{$product->name}}" required type="text" id="name" name="body_name" placeholder="Product name..">

    <label for="description">Description</label>
    <textarea required id="description"  placeholder="Product description..." name="body_description">{{$product->description}}</textarea>

    <label for="price">Price</label>
    <input value="{{$product->price}}" required type="number" id="price" name="body_price" placeholder="Product price..">

    <label for="category">Category</label>
    <select  required id="category" name="body_category">
        @foreach($categories as $category)
            <option @if($category->id == $product->category_id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>

    <input type="submit" value="Submit">

    <a class="btn " href="{{route('listProduct')}}">Cancel</a>

</form>

</body>
</html>


