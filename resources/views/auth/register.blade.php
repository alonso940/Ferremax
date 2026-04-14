@extends('template')

@section('title', 'Registrarse')

@section('content')
<!-- Start Hero Section -->
<div class="hero hero-inner" style="padding: 2rem 0 !important;">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-12">
                <div class="intro-excerpt">
                    <h1 style="font-size: 2rem; margin-bottom: 15px;">Crear Cuenta</h1>
                    <p class="mb-4" style="font-size: 1rem;">Únete a FerreMax y disfruta de una experiencia de compra más rápida.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Hero Section -->

<div class="untree_co-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-8">
                <div class="bg-light p-5 rounded shadow-sm">
                    <div class="text-center mb-4">
                        <a href="{{ route('index') }}" class="text-decoration-none h2 fw-bold text-dark">FerreMax<span style="color: #f88f01;">.</span></a>
                    </div>
                    
                    <form action="{{ route('auth.store') }}" method="POST">
                        @csrf
                        
                        <!-- 1. Datos Personales e Identidad -->
                        <div class="row mb-3">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <label class="mb-1 fw-bold text-dark" style="font-size: 0.95rem;">Nombres y Apellidos</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Ingresa tus nombres y apellidos" required style="border-radius: 5px;">
                                @error('name')<div class="invalid-feedback fw-bold text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="mb-1 fw-bold text-dark" style="font-size: 0.95rem;">Documento de Identidad (DNI)</label>
                                <input type="text" class="form-control @error('document') is-invalid @enderror" name="document" value="{{ old('document') }}" placeholder="Ingresa un documento de identidad" maxlength="8" pattern="\d{8}" required style="border-radius: 5px;">
                                @error('document')<div class="invalid-feedback fw-bold text-danger">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        <!-- 3. Contacto -->
                        <div class="row mb-3">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <label class="mb-1 fw-bold text-dark" style="font-size: 0.95rem;">Correo Electrónico</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="tu@correo.com" required style="border-radius: 5px;">
                                @error('email')<div class="invalid-feedback fw-bold text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="mb-1 fw-bold text-dark" style="font-size: 0.95rem;">Número de Teléfono</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Ingresa un celular" maxlength="9" pattern="\d{9}"  required style="border-radius: 5px;">
                                @error('phone')<div class="invalid-feedback fw-bold text-danger">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        <!-- 4. Seguridad -->
                        <div class="row mb-4">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <label class="mb-1 fw-bold text-dark" style="font-size: 0.95rem;">Contraseña</label>
                                <div class="input-group">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password_input" placeholder="Ingresa una contraseña" required style="border-radius: 5px 0 0 5px;">
                                    <button class="btn btn-outline-secondary" type="button" id="togglePassword" style="border-radius: 0 5px 5px 0; border: 1px solid #ced4da;">
                                        <i class="fa fa-eye" id="eyeIcon"></i>
                                    </button>
                                    @error('password')<div class="invalid-feedback fw-bold text-danger">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-1 fw-bold text-dark" style="font-size: 0.95rem;">Confirmar Contraseña</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" name="password_confirmation" id="password_confirm_input" placeholder="Repite la contraseña" required style="border-radius: 5px 0 0 5px;">
                                    <button class="btn btn-outline-secondary" type="button" id="togglePasswordConfirm" style="border-radius: 0 5px 5px 0; border: 1px solid #ced4da;">
                                        <i class="fa fa-eye" id="eyeIconConfirm"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Términos y Condiciones -->
                        <div class="form-check mb-4">
                            <input type="checkbox" class="form-check-input @error('terms') is-invalid @enderror" id="terms" name="terms" required style="cursor: pointer;">
                            <label class="form-check-label text-dark" for="terms" style="font-size: 0.9rem; cursor: pointer;">
                                He leído y acepto los <a href="{{ route('legal.terms') }}" target="_blank" style="color: #3b5d50; font-weight: bold;">Términos y Condiciones</a> y la <a href="{{ route('legal.privacy') }}" target="_blank" style="color: #3b5d50; font-weight: bold;">Política de Privacidad</a> de FerreMax.
                            </label>
                            @error('terms')<div class="invalid-feedback fw-bold text-danger">Debes aceptar los términos y condiciones para continuar.</div>@enderror
                        </div>

                        <button type="submit" class="btn w-100 fw-bold py-3 mb-3" style="background-color: #3b5d50; color: #ffffff; border-radius: 5px;">CREAR MI CUENTA</button>
                        
                        <p class="text-center mb-0 text-dark" style="font-size: 0.95rem;">¿Ya tienes una cuenta? <a href="{{ route('auth.login') }}" class="fw-bold text-decoration-none" style="color: #f88f01;">Iniciar Sesión</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Toggle Visibilidad Contraseña Principal
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

        // Toggle Visibilidad Contraseña Confirmación
        const togglePasswordConfirm = document.getElementById("togglePasswordConfirm");
        const passwordConfirmInput = document.getElementById("password_confirm_input");
        const eyeIconConfirm = document.getElementById("eyeIconConfirm");

        togglePasswordConfirm.addEventListener("click", function () {
            const type = passwordConfirmInput.getAttribute("type") === "password" ? "text" : "password";
            passwordConfirmInput.setAttribute("type", type);
            if(type === "password") {
                eyeIconConfirm.classList.remove("fa-eye-slash");
                eyeIconConfirm.classList.add("fa-eye");
            } else {
                eyeIconConfirm.classList.remove("fa-eye");
                eyeIconConfirm.classList.add("fa-eye-slash");
            }
        });
        
        // Forzar sólo números en DNI (Máximo 8 en el input de html mediante maxlength)
        document.querySelector('input[name="document"]').addEventListener('input', function (e) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
        
        // Forzar sólo números en Teléfono (Máximo 9 en el input de html mediante maxlength)
        document.querySelector('input[name="phone"]').addEventListener('input', function (e) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
    });
</script>
@endsection
