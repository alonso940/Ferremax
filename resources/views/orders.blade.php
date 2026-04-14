@extends('template')
@section('title', 'Mis Pedidos')
@section('content')

<!-- Start Hero Section -->
<div class="hero hero-inner" style="padding: 2rem 0 !important;">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-12">
                <div class="intro-excerpt">
                    <h1 style="font-size: 2rem; margin-bottom: 15px;">Mis Pedidos</h1>
                    <p class="mb-4" style="font-size: 1rem;">Consulta el historial y estado de tus compras.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Hero Section -->

<div class="untree_co-section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 bg-white p-5 rounded shadow-sm">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light text-center">
                            <tr>
                                <th>Comprobante</th>
                                <th>Número</th>
                                <th>Total</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach($sales as $sale)
                            <tr>
                                <td class="fw-bold">{{ $sale->voucher }}</td>
                                <td>{{ $sale->number }}</td>
                                <td>S/ {{ number_format($sale->total, 2) }}</td>
                                <td>{{ date('d-m-Y', strtotime($sale->date)) }}</td>
                                <td>
                                    @if($sale->status == 'Completado')
                                        <span class="badge bg-success px-3 py-2">Completado</span>
                                    @elseif($sale->status == 'Pendiente')
                                        <span class="badge bg-warning text-dark px-3 py-2">Pendiente</span>
                                    @else
                                        <span class="badge bg-secondary px-3 py-2">{{ $sale->status }}</span>
                                    @endif
                                </td>
                                <td>
                                    @if($sale->status == 'Completado')
                                        <a href="{{ route('sales.pdf', $sale) }}" target="_blank" class="btn btn-sm text-white rounded-pill px-3" style="background-color: #f88f01;">
                                            <i class="fa fa-file-pdf"></i> Ver PDF
                                        </a>
                                    @else
                                        <span class="text-muted small"><i class="fa fa-clock-o me-1"></i>Verificando...</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            @if($sales->isEmpty())
                            <tr>
                                <td colspan="6" class="text-center py-4 text-muted">No tienes pedidos registrados todavía.</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-center mt-4">
                    {{ $sales->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection