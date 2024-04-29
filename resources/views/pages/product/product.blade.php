@extends('layout')

@section('content')
    <section class="catalog">
        <article class="product-card">
            <img src="{{ asset('/storage/products/'.$product->image) }}" alt="{{$product->name}}"
                 class="product-card__image">
            <p class="product-card__name">{{$product->name}}</p>
            <p class="product-card__price">{{$product->price}} $</p>
            <button class="product-card__btn">Add to cart</button>
            @if(auth()->user()->role_id > 2)
                <a href="/product/{{$product->id}}/edit">Change</a>
                <form action="{{route('product.destroy', ['id' => $product->id])}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button style="background: red;">Delete</button>
                </form>
            @endif
        </article>

    </section>
@endsection
