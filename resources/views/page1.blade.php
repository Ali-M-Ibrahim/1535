<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
    <style>
        p{
            color:red
        }
    </style>
</head>
<body>

@include('nav')
<h1>This is my first page</h1>
<p>This is a paragraph.</p>

<ul>
    @for($i=0;$i<10;$i++)
        @if($i > 4)
            @break;
        @endif

        @if($i> 9)
                @continue;
            @else
                <li>  {{ $i }} from else  </li>
        @endif
    @endfor

</ul>


<button onclick="clickMe()">Click me</button>

<script>
function clickMe(){
    alert("button clicked");
}
</script>
</body>
</html>
