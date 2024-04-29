@extends('layout')

@section('content')
    <h1>Add category</h1>
    <form action="{{route('category.store')}}" method="post">
        @csrf
        <input name="name" placeholder="name" value="{{old('name')}}"/>
        @error('name')
        <p style="color:red">{{$message}}</p>
        @enderror
        <button>Create</button>
    </form>
@endsection
