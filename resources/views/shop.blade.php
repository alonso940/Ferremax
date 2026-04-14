@extends('template')

@section('content')

<!-- Start Hero Section -->
<div class="hero hero-inner" style="padding: 2rem 0 !important;">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-12">
                <div class="intro-excerpt">
                    <h1 style="font-size: 2rem; margin-bottom: 15px;">Productos</h1>
                    <p class="mb-4" style="font-size: 1rem;">Filtra y encuentra los materiales y herramientas que necesitas para tu proyecto.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Hero Section -->

<div class="untree_co-section product-section before-footer-section" style="padding: 5rem 0;">
    <div class="container">
        <div class="row">

            <!-- Sidebar Filters -->
            <div class="col-md-3 mb-5">
                <form method="get" class="bg-light p-4 rounded shadow-sm">
                    <h4 class="mb-4">Filtros</h4>
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Rango de Precio</label>
                        <div class="row g-2">
                            <div class="col-6">
                                <input type="number" class="form-control form-control-sm" name="min_price" placeholder="Mín" value="{{ request()->min_price }}">
                            </div>
                            <div class="col-6">
                                <input type="number" class="form-control form-control-sm" name="max_price" placeholder="Máx" value="{{ request()->max_price }}">
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Categorías</label>
                        <input type="hidden" name="category_id" value="{{ request('category_id') }}">
                        <a href="{{ request()->fullUrlWithQuery(['category_id' => null, 'brand_id' => null]) }}" class="d-block mb-3 text-decoration-none {{ !request('category_id') ? 'text-primary fw-bold' : 'text-dark' }}">
                            <i class="bi bi-grid"></i> Todas las Categorías
                        </a>

                        @php
                            // Identificar toda la ruta de categorías activas para desplegar los acordeones correspondientes
                            $activeCatPath = [];
                            if(request('category_id')){
                                $cat = \App\Models\Category::find(request('category_id'));
                                while($cat){
                                    $activeCatPath[] = $cat->id;
                                    $cat = $cat->parent_id ? \App\Models\Category::find($cat->parent_id) : null;
                                }
                            }
                        @endphp

                        <div class="accordion accordion-flush bg-transparent" id="categoriesAccordion">
                            @foreach($categories as $l1)
                                @php $isL1Active = in_array($l1->id, $activeCatPath); @endphp
                                <div class="accordion-item bg-transparent border-0 mb-1">
                                    <h2 class="accordion-header d-flex align-items-center" id="heading-{{ $l1->id }}">
                                        <!-- Enlace Nivel 1 -->
                                        <a href="{{ request()->fullUrlWithQuery(['category_id' => $l1->id, 'brand_id' => null]) }}" class="text-decoration-none flex-grow-1 {{ request('category_id') == $l1->id ? 'text-primary fw-bold' : 'text-dark fw-bold' }}" style="font-size: 14px;">
                                            {{ $l1->name }}
                                        </a>
                                        <!-- Botón Expandir Nivel 1 -->
                                        @if($l1->subcategories->count() > 0)
                                        <button class="accordion-button {{ $isL1Active ? '' : 'collapsed' }} bg-transparent p-0 shadow-none m-0 border-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $l1->id }}" aria-expanded="{{ $isL1Active ? 'true' : 'false' }}" style="width: 25px; height: 25px; min-width: 25px;"></button>
                                        @endif
                                    </h2>
                                    
                                    @if($l1->subcategories->count() > 0)
                                    <div id="collapse-{{ $l1->id }}" class="accordion-collapse collapse {{ $isL1Active ? 'show' : '' }}">
                                        <div class="accordion-body p-0 pt-2 pb-2">
                                            <div class="accordion accordion-flush" id="subAccordion-{{ $l1->id }}">
                                                @foreach($l1->subcategories as $l2)
                                                    @php $isL2Active = in_array($l2->id, $activeCatPath); @endphp
                                                    <div class="accordion-item bg-transparent border-0 mb-1 ms-3">
                                                        <h2 class="accordion-header d-flex align-items-center" id="heading-{{ $l2->id }}">
                                                            <!-- Enlace Nivel 2 -->
                                                            <a href="{{ request()->fullUrlWithQuery(['category_id' => $l2->id, 'brand_id' => null]) }}" class="text-decoration-none flex-grow-1 {{ request('category_id') == $l2->id ? 'text-primary fw-bold' : 'text-secondary' }}" style="font-size: 13.5px;">
                                                                {{ $l2->name }}
                                                            </a>
                                                            <!-- Botón Expandir Nivel 2 -->
                                                            @if($l2->subcategories->count() > 0)
                                                            <button class="accordion-button {{ $isL2Active ? '' : 'collapsed' }} bg-transparent p-0 shadow-none m-0 border-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $l2->id }}" aria-expanded="{{ $isL2Active ? 'true' : 'false' }}" style="width: 25px; height: 25px; min-width: 25px;"></button>
                                                            @endif
                                                        </h2>

                                                        @if($l2->subcategories->count() > 0)
                                                        <div id="collapse-{{ $l2->id }}" class="accordion-collapse collapse {{ $isL2Active ? 'show' : '' }}">
                                                            <div class="accordion-body p-0 pt-1 pb-2">
                                                                <ul class="list-unstyled ms-3 mb-0 border-start ps-2">
                                                                    @foreach($l2->subcategories as $l3)
                                                                        <li class="mb-2 mt-1">
                                                                            <a href="{{ request()->fullUrlWithQuery(['category_id' => $l3->id, 'brand_id' => null]) }}" class="text-decoration-none d-block {{ request('category_id') == $l3->id ? 'text-primary fw-bold' : 'text-muted' }}" style="font-size: 12.5px;">
                                                                                {{ $l3->name }}
                                                                            </a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        @endif
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Marcas</label>
                        <select class="form-select form-select-sm" name="brand_id">
                            <option value="">Todas</option>
                            @foreach($brands as $brand)
                            <option value="{{ $brand->id }}" @if($brand->id == request()->brand_id) selected @endif>
                                {{ $brand->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 btn-sm">Aplicar Filtros</button>
                    @if(request()->anyFilled(['min_price', 'max_price', 'category_id', 'brand_id']))
                        <a href="{{ route('shop') }}" class="btn btn-outline-secondary w-100 btn-sm mt-2">Limpiar</a>
                    @endif
                </form>
            </div>
            <!-- End Sidebar -->

            <!-- Products Grid -->
            <div class="col-md-9">
                <div class="row">
                    @if($products->count() > 0)
                        @foreach($products as $product)
                        <div class="col-12 col-md-6 col-lg-4 mb-5">
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
                        <div class="col-12">
                            <div class="alert alert-info py-4 text-center">No se han encontrado productos con los filtros seleccionados.</div>
                        </div>
                    @endif
                </div>

                <div class="d-flex justify-content-center mt-5">
                    {{ $products->withQueryString()->links('pagination::bootstrap-5') }}
                </div>
            </div>
            <!-- End Products Grid -->

        </div>
    </div>
</div>

@endsection