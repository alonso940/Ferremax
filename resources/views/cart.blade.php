@extends('template')

@section('title', 'Carrito de Compras')

@section('content')

<!-- Start Hero Section -->
<div class="hero hero-inner" style="padding: 2rem 0 !important;">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-12">
                <div class="intro-excerpt">
                    <h1 style="font-size: 2rem; margin-bottom: 15px;">Carrito</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Hero Section -->

<div class="untree_co-section before-footer-section">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md-12">

          @if(count($cart) > 0)
          <div class="site-blocks-table">
            <table class="table table-bordered">
              <thead class="bg-light">
                <tr>
                  <th class="product-thumbnail">Imagen</th>
                  <th class="product-name">Producto</th>
                  <th class="product-price">Precio</th>
                  <th class="product-quantity" width="150">Cantidad</th>
                  <th class="product-total">Total</th>
                  <th class="product-remove">Eliminar</th>
                </tr>
              </thead>
              <tbody>

                @foreach($cart as $id => $item)
                <tr>
                  <!-- Imagen -->
                  <td class="product-thumbnail">
                    <!-- Utilizo object-fit contain y fondo blanco que solicito el usuario -->
                    <img src="{{ asset('storage/'.$item['image']) }}" alt="Image" class="img-fluid cart-img-preview" style="width: 80px; height: 80px; object-fit: contain; background: white; border: 1px solid #dee2e6;">
                  </td>
                  
                  <!-- Producto Nombre -->
                  <td class="product-name">
                    <h2 class="h5 text-black"><a href="{{ route('product', $id) }}" class="text-dark">{{ $item['name'] }}</a></h2>
                  </td>

                  <!-- Precio Unitario -->
                  <td>S/{{ number_format($item['price'], 2) }}</td>

                  <!-- Cantidad -->
                  <td>
                    <form method="POST" action="{{ route('cart.update') }}" class="d-flex align-items-center justify-content-center">
                        @csrf
                        <input type="hidden" name="id" value="{{ $id }}">
                        
                        <div class="input-group mb-0" style="max-width: 120px;">
                            <input type="number" class="form-control text-center" name="quantity" value="{{ $item['quantity'] }}" min="1">
                            <button type="submit" class="btn btn-sm btn-outline-dark px-2" title="Actualizar">
                                <i class="fa fa-refresh"></i>
                            </button>
                        </div>
                    </form>
                  </td>

                  <!-- Subtotal -->
                  <td>S/{{ number_format($item['price'] * $item['quantity'], 2) }}</td>

                  <!-- Eliminar -->
                  <td>
                    <form method="POST" action="{{ route('cart.remove') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $id }}">
                        <button type="submit" class="btn btn-black btn-sm text-white" style="background: black;">X</button>
                    </form>
                  </td>
                </tr>
                @endforeach

              </tbody>
            </table>
          </div>
          @else
          <div class="alert alert-warning text-center">
            <h3>Tu carrito está vacío</h3>
            <p>No tienes productos en tu carrito de compras en este momento.</p>
          </div>
          @endif

        </div>
      </div>

      @if(count($cart) > 0)
      <div class="row">
        <div class="col-md-6">
          <div class="row mb-5">
            <div class="col-md-6 mb-3 mb-md-0">
                <form method="POST" action="{{ route('cart.clear') }}">
                  @csrf
                  <button class="btn btn-outline-black btn-sm btn-block" type="submit">Vaciar Carrito</button>
                </form>
            </div>
            <div class="col-md-6">
              <a href="{{ route('shop') }}" class="btn btn-outline-black btn-sm btn-block">Seguir Comprando</a>
            </div>
          </div>
        </div>

        <div class="col-md-6 pl-5">
          <div class="row justify-content-end">
            <div class="col-md-7">
              <div class="row">
                <div class="col-md-12 text-right border-bottom mb-5">
                  <h3 class="text-black h4 text-uppercase">Resumen</h3>
                </div>
              </div>
              <div class="row mb-5">
                <div class="col-md-6">
                  <span class="text-black">Total a pagar</span>
                </div>
                <div class="col-md-6 text-right">
                  <strong class="text-black h4">S/{{ number_format($total, 2) }}</strong>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <a href="{{ route('checkout') }}" class="btn btn-black btn-lg py-3 btn-block">Proceder al Pago</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @else
      <div class="row">
        <div class="col-md-12 text-center">
            <a href="{{ route('shop') }}" class="btn btn-primary btn-lg">Ir a la Tienda</a>
        </div>
      </div>
      @endif
      
    </div>
  </div>
@endsection