@extends('layout')

@section('content')
    <h1>Add product</h1>
    <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input name="name" placeholder="name" value="{{old('name')}}"/>
        @error('name')
        <p style="color:red">{{$message}}</p>
        @enderror
        <input name="price" placeholder="price" value="{{old('price')}}"/>
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
                <option @if(old('category_id') == $category['id']) selected
                        @endif value="{{$category['id']}}">{{$category['name']}}</option>
            @endforeach
        </select>
        @error('category_id')
        <p style="color:red">{{$message}}</p>
        @enderror
        <button>Register</button>
    </form>
@endsection
