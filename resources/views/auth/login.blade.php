@extends('template')

@section('title', 'Iniciar Sesión')

@section('content')
<!-- Start Hero Section -->
<div class="hero hero-inner" style="padding: 2rem 0 !important;">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-12">
                <div class="intro-excerpt">
                    <h1 style="font-size: 2rem; margin-bottom: 15px;">Iniciar Sesión</h1>
                    <p class="mb-4" style="font-size: 1rem;">Accede a tu cuenta en FerreMax.</p>
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
                    
                    <form action="{{ route('auth.check') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label class="mb-1 fw-bold text-dark" style="font-size: 0.95rem;">Correo electrónico</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Ingresa tu correo electrónico" style="border-radius: 5px;">
                            @error('email')
                                <div class="invalid-feedback fw-bold text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="mb-1 fw-bold text-dark" style="font-size: 0.95rem;">Contraseña</label>
                            <div class="input-group">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" name="password" id="password_input" placeholder="Tu contraseña" style="border-radius: 5px 0 0 5px;">
                                <button class="btn btn-outline-secondary" type="button" id="togglePassword" style="border-radius: 0 5px 5px 0; border: 1px solid #ced4da;">
                                    <i class="fa fa-eye" id="eyeIcon"></i>
                                </button>
                                @error('password')
                                    <div class="invalid-feedback fw-bold text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember" style="cursor: pointer;">
                                <label class="form-check-label text-dark" for="remember" style="font-size: 0.9rem; cursor: pointer;">Recordarme</label>
                            </div>
                            <a href="{{ route('auth.forgot') }}" class="text-decoration-none" style="font-size: 0.9rem; color: #3b5d50;">¿Olvidaste tu contraseña?</a>
                        </div>

                        <button type="submit" class="btn w-100 fw-bold py-3 mb-3" style="background-color: #3b5d50; color: #ffffff; border-radius: 5px;">INICIAR SESIÓN</button>
                        
                        <p class="text-center mb-0 text-dark" style="font-size: 0.95rem;">¿No tienes una cuenta? <a href="{{ route('auth.register') }}" class="fw-bold text-decoration-none" style="color: #f88f01;">Registrarse</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const togglePassword = document.getElementById("togglePassword");
        const passwordInput = document.getElementById("password_input");
        const eyeIcon = document.getElementById("eyeIcon");

        togglePassword.addEventListener("click", function () {
            const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
            passwordInput.setAttribute("type", type);
            
            if(type === "password") {
                eyeIcon.classList.remove("fa-eye-slash");
                eyeIcon.classList.add("fa-eye");
            } else {
                eyeIcon.classList.remove("fa-eye");
                eyeIcon.classList.add("fa-eye-slash");
            }
        });
    });
</script>
@endsection
