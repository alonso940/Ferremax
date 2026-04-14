@extends('template')

@section('title', $product->name)

@section('content')

<!-- Start Hero Section -->
<!-- Se redujo drásticamente el padding superior e inferior con CSS inline para que el producto suba -->
<div class="hero hero-inner" style="padding: 2rem 0 !important;">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-12">
                <div class="intro-excerpt">
                    <!-- Título más pequeño -->
                    <h1 style="font-size: 2rem; margin-bottom: 0;">Detalle del Producto</h1>
                </div>
            </div>
            <div class="col-lg-7"></div>
        </div>
    </div>
</div>
<!-- End Hero Section -->

<div class="untree_co-section">
    <div class="container">
        
        <div class="row mb-5">
            <div class="col-md-12">
                <ol class="breadcrumb bg-transparent p-0">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}" class="text-dark">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('shop') }}" class="text-dark">Tienda</a></li>
                    <li class="breadcrumb-item active">{{ $product->name }}</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <!-- Imagen del Producto -->
            <div class="col-md-6 mb-5 mb-md-0">
                <div class="product-item">
                    <img id="main-product-image" src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" class="img-fluid" style="object-fit: contain; background: white; width: 100%; height: 400px; padding: 20px; border-radius: 10px; border: 1px solid #eee;">
                </div>
                
                <!-- Thumbnails extra si las hubieran -->
                <div class="mt-3 d-flex">
                    <img src="{{ asset('storage/'.$product->image) }}" onclick="document.getElementById('main-product-image').src=this.src" class="img-fluid" style="object-fit: contain; background: white; width: 80px; height: 80px; padding: 5px; border-radius: 5px; border: 2px solid #ccc; cursor: pointer; margin-right: 10px;">
                    @if($product->image2)
                    <img src="{{ asset('storage/'.$product->image2) }}" onclick="document.getElementById('main-product-image').src=this.src" class="img-fluid" style="object-fit: contain; background: white; width: 80px; height: 80px; padding: 5px; border-radius: 5px; border: 2px solid #ccc; cursor: pointer; margin-right: 10px;">
                    @endif
                    @if($product->image3)
                    <img src="{{ asset('storage/'.$product->image3) }}" onclick="document.getElementById('main-product-image').src=this.src" class="img-fluid" style="object-fit: contain; background: white; width: 80px; height: 80px; padding: 5px; border-radius: 5px; border: 2px solid #ccc; cursor: pointer;">
                    @endif
                </div>
            </div>
    
            <!-- Detalles del Producto -->
            <div class="col-md-6 ps-md-5">
                <h2 class="text-black mb-1">{{ $product->name }}</h2>
                <div class="mb-3 d-flex align-items-center">
                    <span class="text-muted small me-3">SKU: {{ $product->code ?? 'N/A' }}</span>
                    @if($product->stock > 10)
                        <span class="badge bg-success" style="font-size: 0.8rem; padding: 0.4em 0.8em;">¡Disponible!</span>
                    @elseif($product->stock > 0)
                        <span class="badge bg-warning text-dark" style="font-size: 0.8rem; padding: 0.4em 0.8em;">Últimas {{ $product->stock }} unidades</span>
                    @else
                        <span class="badge bg-danger" style="font-size: 0.8rem; padding: 0.4em 0.8em;">Agotado</span>
                    @endif
                </div>
                <p class="h3 fw-bold text-primary mb-4" style="color: #2f2f2f !important;">S/{{ number_format($product->price, 2) }}</p>
                
                <form method="POST" action="{{ route('cart.add') }}" class="mb-5">
                    @csrf
                    <input type="hidden" name="id" value="{{ $product->id }}">


                    <div class="d-flex align-items-center mb-4">
                        <span class="me-3 fw-bold text-black">Cantidad:</span>
                        <div class="input-group" style="max-width: 120px;">
                            <input class="form-control text-center bg-white" type="number" value="1" min="1" max="50" name="quantity">
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-black btn-lg px-5">Añadir al carrito</button>
                    </div>
                </form>

                <!-- Trust & Logistics -->
                <div class="mt-5 pt-4 border-top">
                    <!-- Envío -->
                    <div class="d-flex align-items-start mb-3">
                        <div class="me-3 text-primary mt-1">
                            <svg width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                            </svg>
                        </div>
                        <div>
                            <h6 class="mb-1 fw-bold text-dark">Envío a domicilio o Recojo en tienda</h6>
                            <p class="text-muted small mb-0">Despacho en 24/48 horas para Lambayeque.</p>
                        </div>
                    </div>
                    <!-- Garantía -->
                    <div class="d-flex align-items-start mb-3">
                        <div class="me-3 text-primary mt-1">
                            <svg width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56z"/>
                                <path d="M10.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h6 class="mb-1 fw-bold text-dark">Garantía FerreMax</h6>
                            <p class="text-muted small mb-0">Cambios y devoluciones fáciles hasta 7 días útiles.</p>
                        </div>
                    </div>
                    <!-- Pagos -->
                    <div class="d-flex align-items-start">
                        <div class="me-3 text-primary mt-1">
                            <svg width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1H2zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V7z"/>
                                <path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1z"/>
                            </svg>
                        </div>
                        <div>
                            <h6 class="mb-1 fw-bold text-dark">Pago Seguro</h6>
                            <p class="text-muted small mb-0">Aceptamos tarjetas Visa/Mastercard,Yape.</p>
                        </div>
                    </div>
                </div>
    

            </div>
        </div>

        <!-- Ficha Técnica -->
        <div class="row mt-5 pt-5 border-top">
            <div class="col-12">
                <ul class="nav nav-tabs mb-4" id="productTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active text-dark fw-bold" id="desc-tab" data-bs-toggle="tab" data-bs-target="#desc" type="button" role="tab" aria-controls="desc" aria-selected="true">Descripción Extensa</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link text-dark fw-bold" id="specs-tab" data-bs-toggle="tab" data-bs-target="#specs" type="button" role="tab" aria-controls="specs" aria-selected="false">Especificaciones Técnicas</button>
                    </li>
                </ul>
                <div class="tab-content" id="productTabContent">
                    <!-- Se aumentó el padding y el tamaño de la fuente para mejor legibilidad -->
                    <div class="tab-pane fade show active text-muted p-4" id="desc" role="tabpanel" aria-labelledby="desc-tab" style="font-size: 1.1rem; line-height: 1.8;">
                        <p>{{ $product->description }}</p>
                    </div>
                    <div class="tab-pane fade p-4" id="specs" role="tabpanel" aria-labelledby="specs-tab">
                        <div class="table-responsive">
                            <table class="table table-bordered text-muted mb-0" style="max-width: 600px; font-size: 1.05rem;">
                                <tbody>
                                    <tr>
                                        <th style="width: 35%;" class="bg-light">Marca</th>
                                        <td>{{ $product->brand->name ?? 'Genérica' }}</td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Procedencia</th>
                                        <td>Importado / Nacional</td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Material Principal</th>
                                        <td>Acero incrustado</td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Peso de Envío</th>
                                        <td>Consultar empaque final</td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Garantía</th>
                                        <td>Cumple con Garantía FerreMax</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection