<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internet y Negocio Electrónico - Tienda Virtual</title>
    <link rel="stylesheet" href="/css/ine.css">
</head>
<body>
   
    <x-header :product="$product" />



    <main>
        <x-product :product="$product" :b-index-or-show="false" />

        <!-- Botón volver -->
        <a href=" {{ route('product.index') }} " class="button">Volver</a>

        @auth
            @if(auth()->user()->isAdmin)
                <a href="{{ route('product.edit', ['product' => $product]) }}" class="btn btn-primary">
                    Editar
                </a>
            @endif
        @endauth
    </main>




    <x-footer />
</body>
</html>
