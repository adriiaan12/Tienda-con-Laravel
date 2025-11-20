<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internet y Negocio Electrónico - Tienda Virtual</title>
    <link rel="stylesheet" href="/css/ine.css">
</head>
<body>
   
    <x-header :product="null" />

    <main>

        <a href="{{ route('product.create') }}" class="button">Nuevo producto</a>

        <section class="product-list">
            @foreach ($aProduct as $product)
                <article class="product">

                    <!-- Llamada al componente -->
                    <x-product :product="$product" />

                    <!-- El enlace se queda aquí, NO va dentro del componente -->
                    <a href="{{ route('product.show', ['product' => $product]) }}" class="button">Ver Detalle</a>

                 </article>
            @endforeach

        </section>
        {{ $aProduct->links('layouts.pagination') }} 
    </main>


    <x-footer />

</body>
</html>
