<h2>{{ $product->name }}</h2>

@if($product->image)
    <img src="/img/product/{{ $product->image }}" title="{{ $product->name }}" alt="{{ $product->name }}">
@endif

@if($bIndexOrShow)
    <!-- Vista index -->
    <p>Empresa: {{ $product->company ? $product->company->name : 'Sin empresa' }}</p>
@else
    <!-- Vista show -->
    <p>Empresa: {{ $product->company ? $product->company->name : 'Sin empresa' }}</p>
    <p>Descripción: {{ $product->description }}</p>
    <p>Precio: {{ number_format($product->price, 2, '.', '') }} €</p>
@endif
