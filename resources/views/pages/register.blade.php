@extends('layout')

@section('content')
    <h1>Register</h1>
    <a href="/">Main page</a>
    <a href="/login">Login</a>
    <form action="/register" method="post">
        @csrf
        <input name="name" placeholder="name" value="{{old('name')}}"/>
        @error('name')
        <p style="color:red">{{$message}}</p>
        @enderror
        <input name="email" placeholder="email" value="{{old('email')}}"/>
        @error('email')
        <p style="color:red">{{$message}}</p>
        @enderror
        <input type="password" name="password" placeholder="password"/>
        @error('password')
        <p style="color:red">{{$message}}</p>
        @enderror
        <input type="password" name="password_confirmation" placeholder="password_confirmation"/>
        @error('password_confirmation')
        <p style="color:red">{{$message}}</p>
        @enderror
        <button>Register</button>
    </form>
@endsection
