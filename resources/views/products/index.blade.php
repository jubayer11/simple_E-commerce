@extends('layouts.app')


@section('content')

        <!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <h2>edit Table</h2>

    <table class="table table-condensed">
        <thead>
        <tr>
            <th>name</th>
            <th>price</th>
            <th>edit</th>
            <th>delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)

            <tr>
                <td>{{$product->name}}</td>
                <td>{{$product->price}}</td>
                <td>

                    <a href="{{route('products.edit',['id'=>$product->id])}}" class="btn btn-default btn-xs">Edit</a>

                </td>
                <td>
                    <form action="{{route('products.destroy',['id'=>$product->id])}}" method="post">
                        {{csrf_field()}}

                        {{method_field('DELETE')}}

                        <button class="btn btn-xs btn-danger">Delete</button>

                    </form>

                </td>


            </tr>




        @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
    @endsection