@extends('layout')

@section('content')
    <h1>Add category</h1>
    <form action="{{route('category.update', ['id' => $category->id])}}" method="post">
        @csrf
        @method('PATCH')
        <input name="name" placeholder="name" value="@if(old('name')){{old('name')}}@else{{$category->name}}@endif"/>
        @error('name')
        <p style="color:red">{{$message}}</p>
        @enderror
        <button>Edit</button>
    </form>
@endsection
