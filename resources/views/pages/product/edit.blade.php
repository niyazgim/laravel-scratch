@extends('layout')

@section('content')
    <h1>Edit product</h1>
    <form action="{{route('product.update', ['id' => $product->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <input name="name" placeholder="name" value="@if(old('name')){{old('name')}}@else{{$product->name}}@endif"/>
        @error('name')
        <p style="color:red">{{$message}}</p>
        @enderror
        <input name="price" placeholder="price"
               value="@if(old('price')){{old('price')}}@else{{$product->price}}@endif"/>
        @error('price')
        <p style="color:red">{{$message}}</p>
        @enderror
        <input type="file" name="image"/>
        @error('image')
        <p style="color:red">{{$message}}</p>
        @enderror
        <select name="category_id">
            <option value="" selected disabled>--Choose category</option>
            @foreach($categories as $category)
                <option @if(old('category_id') == $category['id'] || $product->category_id == $category['id']) selected
                        @endif value="{{$category['id']}}">{{$category['name']}}</option>
            @endforeach
        </select>
        @error('category_id')
        <p style="color:red">{{$message}}</p>
        @enderror
        <button>Edit</button>
    </form>
@endsection
