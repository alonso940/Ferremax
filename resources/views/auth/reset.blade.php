@extends('template')

@section('title', 'Nueva contraseña')

@section('content')
<!-- Start Hero Section -->
<div class="hero hero-inner" style="padding: 2rem 0 !important;">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-12">
                <div class="intro-excerpt">
                    <h1 style="font-size: 2rem; margin-bottom: 15px;">Nueva contraseña</h1>
                    <p class="mb-4" style="font-size: 1rem;">Crea una nueva contraseña para tu cuenta de FerreMax.</p>
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

                    <form action="{{ route('password.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        
                        <div class="form-group mb-3">
                            <label class="mb-1 fw-bold text-dark" style="font-size: 0.95rem;">Correo electrónico</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" readonly style="border-radius: 5px; background-color: #e9ecef;">
                            @error('email')
                                <div class="invalid-feedback fw-bold text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="mb-1 fw-bold text-dark" style="font-size: 0.95rem;">Nueva contraseña</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Tu nueva contraseña" style="border-radius: 5px;" required autofocus>
                            @error('password')
                                <div class="invalid-feedback fw-bold text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label class="mb-1 fw-bold text-dark" style="font-size: 0.95rem;">Confirmar contraseña</label>
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Repite tu contraseña" style="border-radius: 5px;" required>
                        </div>

                        <button type="submit" class="btn w-100 fw-bold py-3 mb-3" style="background-color: #3b5d50; color: #ffffff; border-radius: 5px;">GUARDAR CONTRASEÑA</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
