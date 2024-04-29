@extends('layout')

@section('content')
    <h1>Login</h1>
    <a href="/">Main page</a>
    <a href="/register">Register</a>
    <form action="/login" method="post">
        @csrf
        <input name="email" placeholder="email" value="{{old('email')}}"/>
        @error('email')
        <p style="color:red">{{$message}}</p>
        @enderror
        <input type="password" name="password" placeholder="password"/>
        @error('password')
        <p style="color:red">{{$message}}</p>
        @enderror
        <button>Login</button>
    </form>
@endsection
