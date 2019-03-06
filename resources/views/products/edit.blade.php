<!DOCTYPE html>
<html>
<body>

<h2>HTML Forms</h2>

<form action="{{route('products.update',['id'=>$product->id])}}" method="post">
    {{csrf_field()}}
    {{method_field('PUT')}}

     name:<br>
    <input type="text" name="name" value="{{$product->name}}">
    <br>
    price:<br>
    <input type="number" name="price" value="{{$product->price}}">
    <br>
    image:<br>
    <input type="file" name="image">
    <br>

    description:<br>
    <input type="text" name="description" value="{{$product->description}}">
    <br>


    <br>
    <input type="submit" value="Submit">
</form>







</body>
</html>
