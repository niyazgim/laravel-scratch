@extends('layout')

@section('content')
    <section class="catalog">
        @foreach($categories as $category)
            <article class="category-card">
                <p class="product-card__price">{{$category->name}}</p>
                @if(auth()->user()->role_id > 2)
                    <a href="/category/{{$category->id}}/edit">Change</a>
                    <form action="{{route('category.destroy', ['id' => $category->id])}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button style="background: red;">Delete</button>
                    </form>
                @endif
            </article>
        @endforeach
    </section>
@endsection
