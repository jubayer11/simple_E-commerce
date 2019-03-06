@extends('layouts.app')
        @section('content')
            <div>

                <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}

                    name:<br>
                    <input type="text" name="name" value="{{old('name')}}">
                    <br>
                    price:<br>
                    <input type="number" name="price" value="{{old('name')}}">
                    <br>
                    image:<br>
                    <input type="file" name="image">
                    <br>

                    description:<br>
                    <input type="text" name="description" value="{{old('description')}}">
                    <br>


                    <br>
                    <input type="submit" value="Submit">
                </form>

            </div>

        @endsection

