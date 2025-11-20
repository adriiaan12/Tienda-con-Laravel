<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product ? 'Editar producto - ' . $product->name : 'Nuevo producto' }}</title>

    <link rel="stylesheet" href="/css/ine.css">
</head>
<body>

<header>
    <a href="{{ route('product.index') }}">
        <img src="/img/logo-ine.png" title="logotipo" alt="logotipo" class="logo" />
    </a>

    <form name="search" class="form-search" action="{{ route('product.index') }}">
        <input id="text" name="text" type="text" placeholder="Buscar..." value="{{ request()->get('text') }}">
        <button>Buscar</button>
    </form>

    <div class="button-links">
        @auth
            <!-- Nombre del usuario con enlace al perfil -->
            <a href="{{ route('profile.edit') }}">{{ Auth::user()->name }}</a>

            <!-- Logout como formulario POST -->
            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit">Logout</button>
            </form>
        @else
            <!-- Login y Registro si no hay sesión -->
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Registro</a>
        @endauth

        <!-- Carrito siempre visible -->
        <a href="#"><img class="cart-ico" src="/img/cart.png" title="carrito" alt="carrito" /></a>
    </div>

    <nav class="breadcrumbs">
        <a href="{{ route('product.index') }}">Productos</a> &gt;

        @if ($product)
            <a href="{{ route('product.show', ['product' => $product]) }}">
                {{ $product->name }}
            </a> &gt; edición
        @else
            Nuevo producto
        @endif
    </nav>
</header>


<main>
    {{-- Mensaje de estado (éxito o error del controlador) --}}
    @if (session('sState'))
        <div class="status">{{ session('sState') }}</div>
    @endif

   <form 
        method="POST" 
        action="{{ $product ? route('product.update', ['product' => $product]) : route('product.store') }}"
    >
        @csrf
        @method($product ? 'PATCH' : 'POST')

        <!-- Nombre -->
        <div class="input">
            <label for="name">Nombre</label>
            <input type="text" name="name" value="{{ old('name', $product ? $product->name : '') }}">
            @error('name')
                <div class="fielderror">{{ $message }}</div>
            @enderror
        </div>

        <!-- Empresa -->
        <div class="input">
            <label for="company">Empresa</label>
            <select id="company" name="company_id">
                @foreach(App\Models\Company::orderBy('name')->get() as $company)
                    <option value="{{ $company->id }}"
                        {{ old('company_id', $product ? $product->company_id : null) == $company->id ? 'selected' : '' }}
>
                        {{ $company->name }}
                    </option>
                @endforeach
            </select>
            @error('company_id')
                <div class="fielderror">{{ $message }}</div>
            @enderror
        </div>

        <!-- Descripción -->
        <div class="input">
            <label for="description">Descripción</label>
            <textarea id="description" name="description" rows="4">{{ old('description', $product ? $product->description : '') }}</textarea>
            @error('description')
                <div class="fielderror">{{ $message }}</div>
            @enderror
        </div>

        <!-- Precio -->
        <div class="input">
            <label for="price">Precio (€)</label>
            <input type="number" name="price" value="{{ old('price', $product ? $product->price : '') }}">
            @error('price')
                <div class="fielderror">{{ $message }}</div>
            @enderror
        </div>

        <button class="button" type="submit">Guardar</button>
        <a href=" {{ route('product.show', ['product' => $product]) }} " class="button">Cancelar</a>
    </form>
</main>

<footer>
    <p>&copy; 2024 Tienda Virtual. Todos los derechos reservados.</p>
</footer>

</body>
</html>
