@extends('template')

@section('title', 'Restablecer contraseña')

@section('content')
<!-- Start Hero Section -->
<div class="hero hero-inner" style="padding: 2rem 0 !important;">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-12">
                <div class="intro-excerpt">
                    <h1 style="font-size: 2rem; margin-bottom: 15px;">Restablecer contraseña</h1>
                    <p class="mb-4" style="font-size: 1rem;">Ingresa tu correo electrónico y te enviaremos las instrucciones para una nueva contraseña.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Hero Section -->

<div class="untree_co-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="bg-light p-5 rounded shadow-sm">
                    <div class="text-center mb-4">
                        <a href="{{ route('index') }}" class="text-decoration-none h2 fw-bold text-dark">FerreMax<span style="color: #f88f01;">.</span></a>
                    </div>
                    
                    @if (session('status'))
                        <div class="alert alert-success fw-bold text-center" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('auth.forgot.send') }}" method="POST">
                        @csrf
                        <div class="form-group mb-4">
                            <label class="mb-1 fw-bold text-dark" style="font-size: 0.95rem;">Correo electrónico</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Ingresa tu correo electrónico" style="border-radius: 5px;" required autofocus>
                            @error('email')
                                <div class="invalid-feedback fw-bold text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn w-100 fw-bold py-3 mb-3" style="background-color: #3b5d50; color: #ffffff; border-radius: 5px;">Continuar</button>
                        
                        <p class="text-center mb-0 text-dark" style="font-size: 0.95rem;"><a href="{{ route('auth.login') }}" class="fw-bold text-decoration-none" style="color: #3b5d50;"><i class="fa fa-arrow-left me-1"></i> Volver al inicio de sesión</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
