<article class="product">
    <h2>{{ $product->name }}</h2>
    @if($product->image) 
    <!-- Si hay imagen, la mostramos -->
    <img 
        src="/img/product/{{ $product->image }}" 
        title="{{ $product->name }}" 
        alt="{{ $product->name }}">
    <p>Empresa: {{ $product->company ? $product->company->name : 'Sin empresa' }}</p>

    @else
    <!-- Si no hay imagen, mostramos la descripción -->
    <p>{{ $product->description }}</p>
    @endif
    <p>Precio: {{ number_format($product->price, 2, '.', '') }} €</p>
                    

</article>