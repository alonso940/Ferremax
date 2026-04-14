@extends('template')
@section('title', 'Mi Perfil')
@section('content')

<!-- Start Hero Section -->
<div class="hero hero-inner" style="padding: 2rem 0 !important;">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-12">
                <div class="intro-excerpt">
                    <h1 style="font-size: 2rem; margin-bottom: 15px;">Mi Perfil</h1>
                    <p class="mb-4" style="font-size: 1rem;">Gestiona tus datos personales y de contacto.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Hero Section -->

<div class="untree_co-section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 bg-white p-5 rounded shadow-sm">
                <form method="POST" action="{{ route('update') }}">
                    @csrf
                    
                    <h5 class="text-black mb-4 border-bottom pb-2">Información Personal (Solo Lectura)</h5>
                    <div class="row mb-3">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold text-black">Nombre</label>
                            <input type="text" class="form-control bg-light" value="{{ auth()->user()->name }}" disabled>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold text-black">Apellidos</label>
                            <input type="text" class="form-control bg-light" value="{{ auth()->user()->last_name }}" disabled>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label fw-bold text-black">Documento de Identidad (DNI/C.E.)</label>
                            <input type="text" class="form-control bg-light" value="{{ auth()->user()->document }}" disabled>
                        </div>
                    </div>
                    
                    <h5 class="text-black mt-5 mb-4 border-bottom pb-2">Información de Contacto (Editable)</h5>
                    <div class="row mt-4">
                        <div class="col-md-6 mb-4">
                            <label class="form-label fw-bold text-black">Dirección de Envío <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ auth()->user()->address }}">
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label fw-bold text-black">Teléfono <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ auth()->user()->phone }}">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-4">
                            <label class="form-label fw-bold text-black">Correo electrónico <span class="text-danger">*</span></label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ auth()->user()->email }}" disabled>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="text-end mt-3">
                        <button type="submit" class="btn text-white px-5 py-3 fw-bold rounded-pill" style="background-color: #3b5d50; box-shadow: 0 4px 6px rgba(0,0,0,0.1);"><i class="fa fa-save me-2"></i>Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection