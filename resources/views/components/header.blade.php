<header>
    <a href="/catalog">Catalog</a>
    @auth
        <form action="/logout" method="post">
            @csrf
            <button>Выйти</button>
        </form>
        @if(auth()->user()->role_id > 2)
            <a href="/product/create">Add product</a>
            <a href="/category/create">Add categories</a>
            <a href="/category">All categories</a>
        @endif
    @else
        <a href="/register">Register</a>
        <a href="/login">Login</a>
    @endauth
</header>
