@extends('template')

@section('title', 'Inicio')

@section('content')
<!-- Start Hero Section -->
<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1>Tu Ferretería de Confianza</h1>
                    <p class="mb-4">Encuentra los mejores materiales de construcción, herramientas y accesorios para el hogar al mejor precio. Compra seguro y rápido.</p>
                    <p><a href="{{ route('shop') }}" class="btn btn-secondary me-2">Ver Catálogo</a></p>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="hero-img-wrap">
                    <!-- Se utiliza una imagen provisional con filtro para darle un estilo industrial mientras suben la foto de ferreteria real -->
                    <img src="{{ asset('assets/furni/images/principal2.png') }}" class="img-fluid" style="filter: grayscale(20%) opacity(0.9);"> 
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Hero Section -->

<!-- Start Product Section (Nuevos productos) -->
<div class="product-section">
    <div class="container">
        <div class="row">

            <!-- Start Column 1 -->
            <div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
                <h2 class="mb-4 section-title">Nuevos Ingresos.</h2>
                <p class="mb-4">Descubre las últimas herramientas y materiales que acaban de llegar a nuestra tienda. Renueva tu equipo de trabajo.</p>
                <p><a href="{{ route('shop') }}" class="btn">Explorar Tienda</a></p>
            </div> 
            <!-- End Column 1 -->

            @if($products->count() > 0)
                @foreach($products->take(3) as $product)
                <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                    <div class="product-item">
                        <a href="{{ route('product', $product) }}">
                            <img src="{{ asset('storage/'.$product->image) }}" class="img-fluid product-thumbnail" alt="{{ $product->name }}">
                        </a>
                        <h3 class="product-title"><a href="{{ route('product', $product) }}" class="text-dark text-decoration-none">{{ $product->name }}</a></h3>
                        <strong class="product-price">S/{{ number_format($product->price, 2) }}</strong>

                        <form method="POST" action="{{ route('cart.add') }}" class="d-inline">
                            @csrf
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <span class="icon-cross" onclick="this.closest('form').submit()" style="cursor: pointer; position: absolute; bottom: 0; left: 50%; transform: translateX(-50%); opacity: 0; visibility: hidden; transition: .3s all ease; z-index: 2;">
                                <img src="{{ asset('assets/furni/images/cross.svg') }}" class="img-fluid">
                            </span>
                        </form>
                    </div>
                </div> 
                @endforeach
            @else
                <div class="col-12 col-md-9 mb-5 mb-md-0 d-flex align-items-center">
                    <div class="alert alert-info w-100">No hay productos nuevos disponibles por ahora.</div>
                </div>
            @endif

        </div>
    </div>
</div>
<!-- End Product Section -->

<!-- Start Why Choose Us Section -->
<div class="why-choose-section">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-6">
                <h2 class="section-title">¿Por qué elegirnos?</h2>
                <p>Brindamos la mejor experiencia de compra para profesionales de la construcción y personas que buscan mejorar su hogar.</p>

                <div class="row my-5">
                    <div class="col-6 col-md-6">
                        <div class="feature">
                            <div class="icon">
                                <img src="{{ asset('assets/furni/images/truck.svg') }}" alt="Image" class="imf-fluid">
                            </div>
                            <h3>Despacho Rápido</h3>
                            <p>Envíos seguros a tu obra o domicilio.</p>
                        </div>
                    </div>

                    <div class="col-6 col-md-6">
                        <div class="feature">
                            <div class="icon">
                                <img src="{{ asset('assets/furni/images/bag.svg') }}" alt="Image" class="imf-fluid">
                            </div>
                            <h3>Compra Fácil</h3>
                            <p>Proceso de compra en línea optimizado y seguro.</p>
                        </div>
                    </div>

                    <div class="col-6 col-md-6">
                        <div class="feature">
                            <div class="icon">
                                <img src="{{ asset('assets/furni/images/support.svg') }}" alt="Image" class="imf-fluid">
                            </div>
                            <h3>Asesoría Especializada</h3>
                            <p>Te ayudamos a elegir el producto adecuado.</p>
                        </div>
                    </div>

                    <div class="col-6 col-md-6">
                        <div class="feature">
                            <div class="icon">
                                <img src="{{ asset('assets/furni/images/return.svg') }}" alt="Image" class="imf-fluid">
                            </div>
                            <h3>Garantía</h3>
                            <p>Todos nuestros productos cuentan con garantía de fábrica y de la tienda.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="img-wrap">
                    <img src="{{ asset('assets/furni/images/why-choose-us-img.jpg') }}" alt="Image" class="img-fluid" style="filter: grayscale(100%);">
                </div>
            </div>

        </div>
    </div>
</div>
<!-- End Why Choose Us Section -->

<!-- Start Popular Product (Más vendidos) -->
<div class="popular-product">
    <div class="container">
        <h2 class="mb-5 section-title">Productos más vendidos</h2>
        <div class="row">

            @if($favorites->count() > 0)
                @foreach($favorites->take(3) as $product)
                <div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
                    <div class="product-item-sm d-flex align-items-center bg-white p-3 rounded shadow-sm">
                        <div class="thumbnail" style="width: 100px; margin-right: 20px;">
                            <a href="{{ route('product', $product) }}">
                                <img src="{{ asset('storage/'.$product->image) }}" alt="Image" class="img-fluid cart-img-preview">
                            </a>
                        </div>
                        <div class="pt-3">
                            <h3><a href="{{ route('product', $product) }}" class="text-dark text-decoration-none">{{ $product->name }}</a></h3>
                            <p class="mb-2 fw-bold">S/{{ number_format($product->price, 2) }}</p>
                            <form method="POST" action="{{ route('cart.add') }}" class="d-inline">
                                @csrf
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-sm btn-outline-dark">Añadir al carrito</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <div class="col-md-12">
                    <div class="alert alert-info">No se han encontrado productos destacados.</div>
                </div>
            @endif

        </div>
    </div>
</div>
<!-- End Popular Product -->

@endsection