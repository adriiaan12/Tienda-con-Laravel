<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internet y Negocio Electrónico - Tienda Virtual</title>
    <link rel="stylesheet" href="/css/ine.css">
</head>
<body>
   
    <header>
        <a href="{{ route('product.index') }}">
            <img src="/img/logo-ine.png" title="logotipo" alt="logotipo" class="logo" />
        </a> 

        <form name="search" class="form-search" action="{{ Route('product.index') }}" >
            <input id="text" name="text" type="text" placeholder="Buscar..." value="{{ request()->get('text') }}">
            <button>Buscar</button>
        </form>
        <div class="button-links">
            <a href="#">Login</a>
            <a href="#">Registro</a>
            <a href="#"><img class="cart-ico" src="/img/cart.png" title="carrito" alt="carrito" /></a>
        </div>

        <nav class="breadcrumbs">
            <a>Productos<a>
        </nav>

    </header>

    <main>

        <a href="{{ route('product.create') }}" class="button">Nuevo producto</a>

        <section class="product-list">
            @foreach ($aProduct as $product)
                <article class="product">
                    <h2>{{ $product->name }}</h2>
                    @if($product->image) 
                    <!-- Si hay imagen, la mostramos -->
                    <img 
                        src="/img/product/{{ $product->image }}" 
                        title="{{ $product->name }}" 
                        alt="{{ $product->name }}"
                        
                    >
                    <p>Empresa: {{ $product->company ? $product->company->name : 'Sin empresa' }}</p>

                @else
                    <!-- Si no hay imagen, mostramos la descripción -->
                    <p>{{ $product->description }}</p>
                @endif
                    <p>Precio: {{ number_format($product->price, 2, '.', '') }} €</p>
                    <a href="{{ route('product.show', ['product' => $product]) }}" class="button">Ver Detalle</a>

                </article>
            @endforeach
        </section>
        {{ $aProduct->links('layouts.pagination') }} 
    </main>


    <footer>
        <p>&copy; 2024 Tienda Virtual. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
