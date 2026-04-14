@extends('template')

@section('title', 'Contacto')

@section('content')
<!-- Start Hero Section -->
<div class="hero hero-inner" style="padding: 2rem 0 !important;">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-12">
                <div class="intro-excerpt">
                    <h1 style="font-size: 2rem; margin-bottom: 15px;">Contacto</h1>
                    <p class="mb-4" style="font-size: 1rem;">¿Tienes alguna duda o necesitas una cotización especial? Contáctanos.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Hero Section -->

<!-- Start Contact Form -->
<div class="untree_co-section">
    <div class="container">
        <div class="block">
            <div class="row justify-content-center">

                <div class="col-md-8 col-lg-8 pb-4">

                    <div class="row mb-5">
                        <div class="col-lg-4">
                            <div class="service no-shadow align-items-center link horizontal d-flex active" data-aos="fade-left" data-aos-delay="0">
                                <div class="icon bg-dark p-3 rounded text-white d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; margin-right: 15px;">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <div class="text">
                                    <span class="d-block text-dark fw-bold">Dirección:</span>
                                    <span>321 Eufemio Lora y Lora, Chiclayo</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="service no-shadow align-items-center link horizontal d-flex active" data-aos="fade-left" data-aos-delay="0">
                                <div class="icon bg-dark p-3 rounded text-white d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; margin-right: 15px;">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <div class="text">
                                    <span class="d-block text-dark fw-bold">Correo:</span>
                                    <span>soporte@ferremax.com</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="service no-shadow align-items-center link horizontal d-flex active" data-aos="fade-left" data-aos-delay="0">
                                <div class="icon bg-dark p-3 rounded text-white d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; margin-right: 15px;">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="text">
                                    <span class="d-block text-dark fw-bold">Teléfono:</span>
                                    <span>978045931</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success fw-bold text-center" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label class="text-black fw-bold" for="fname">Nombre</label>
                                    <input type="text" class="form-control @error('fname') is-invalid @enderror" id="fname" name="fname" value="{{ old('fname') }}" required>
                                    @error('fname')<div class="invalid-feedback fw-bold text-danger">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label class="text-black fw-bold" for="lname">Apellidos</label>
                                    <input type="text" class="form-control @error('lname') is-invalid @enderror" id="lname" name="lname" value="{{ old('lname') }}" required>
                                    @error('lname')<div class="invalid-feedback fw-bold text-danger">{{ $message }}</div>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="text-black fw-bold" for="email">Dirección de correo</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                            @error('email')<div class="invalid-feedback fw-bold text-danger">{{ $message }}</div>@enderror
                        </div>
                        
                        <div class="form-group mb-3">
                            <label class="text-black fw-bold" for="phone">Teléfono</label>
                            <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" required>
                            @error('phone')<div class="invalid-feedback fw-bold text-danger">{{ $message }}</div>@enderror
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-black fw-bold" for="message">Comentario</label>
                            <textarea name="message" class="form-control @error('message') is-invalid @enderror" id="message" cols="30" rows="5" required>{{ old('message') }}</textarea>
                            @error('message')<div class="invalid-feedback fw-bold text-danger">{{ $message }}</div>@enderror
                        </div>

                        <button type="submit" class="btn w-100 fw-bold py-3 mb-3" style="background-color: #3b5d50; color: #ffffff; border-radius: 5px;">ENVIAR MENSAJE</button>
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>
<!-- End Contact Form -->
@endsection