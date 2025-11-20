<header>
    <a href="{{ route('product.index') }}">
        <img src="/img/logo-ine.png" title="{{ __('Logotipo') }}" alt="{{ __('Logotipo') }}" class="logo" />
    </a> 

    <form name="search" class="form-search" action="{{ route('product.index') }}">
        <input id="text" name="text" type="text" placeholder="{{ __('Buscar') }}" value="{{ request()->get('text') }}">
        <button>{{ __('Buscar') }}</button>
    </form>

    <div class="button-links">
        @auth
            <a href="{{ route('profile.edit') }}">{{ Auth::user()->name }}</a>
            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit">{{ __('Logout') }}</button>
            </form>
        @else
            <a href="{{ route('lang', ['sLang' => 'es']) }}">es</a> |
            <a href="{{ route('lang', ['sLang' => 'en']) }}">en</a>

            <a href="{{ route('login') }}">{{ __('Login') }}</a>
            <a href="{{ route('register') }}">{{ __('Registro') }}</a>
        @endauth

        <a href="#"><img class="cart-ico" src="/img/cart.png" title="{{ __('Carrito') }}" alt="{{ __('Carrito') }}" /></a>
    </div>

    <nav class="breadcrumbs">
        <a href="{{ route('product.index') }}">{{ __('Productos') }}</a>
        @if($product)
            &gt; {{ $product->name }}
        @endif
    </nav>
</header>
