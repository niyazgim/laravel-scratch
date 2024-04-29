@extends('layout')

@section('content')
    <section class="catalog">
        @if(count($products) > 0)

            @foreach($products as $product)
                <article class="product-card">
                    <a href="/catalog/{{$product->id}}">
                        <img src="{{ asset('/storage/products/'.$product->image) }}" alt="{{$product->name}}"
                             class="product-card__image"/>
                    </a>
                    <p class="product-card__name">{{$product->name}}</p>
                    <p class="product-card__price">{{$product->price}} $</p>
                    <button class="product-card__btn">Add to cart</button>
                </article>
            @endforeach
        @else
            <h1>No products</h1>
        @endif
    </section>
@endsection
