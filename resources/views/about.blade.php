@extends('template')

@section('title', 'Nosotros')

@section('content')
<!-- Start Hero Section -->
<div class="hero hero-inner" style="padding: 2rem 0 !important;">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-12">
                <div class="intro-excerpt">
                    <h1 style="font-size: 2rem; margin-bottom: 15px;">Quiénes Somos</h1>
                    <p class="mb-4" style="font-size: 1rem;">Conoce más sobre nuestra historia, misión y visión como ferretería líder.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Hero Section -->

<!-- Start We Help Section -->
<div class="we-help-section">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-7 mb-5 mb-lg-0">
                <div class="imgs-grid">
                    <div class="grid grid-1"><img src="{{ asset('assets/furni/images/img-grid-1.jpg') }}" alt="Store" style="filter: grayscale(100%);"></div>
                    <div class="grid grid-2"><img src="{{ asset('assets/furni/images/img-grid-2.jpg') }}" alt="Store" style="filter: grayscale(100%);"></div>
                    <div class="grid grid-3"><img src="{{ asset('assets/furni/images/img-grid-3.jpg') }}" alt="Store" style="filter: grayscale(100%);"></div>
                </div>
            </div>
            <div class="col-lg-5 ps-lg-5">
                <h2 class="section-title mb-4">Ayudamos a construir tus sueños</h2>
                <p>Somos una tienda online reconocida, especializada en brindar los mejores materiales de construcción, herramientas de última tecnología y artículos para el mejoramiento del hogar.</p>
                <p>Nuestra misión es facilitar el trabajo de profesionales y aficionados, ofreciendo productos de alta calidad, garantía comprobada y una atención al cliente excepcional.</p>

                <ul class="list-unstyled custom-list my-4">
                    <li>Más de 10 años de experiencia en el mercado.</li>
                    <li>Catálogo extenso con las mejores marcas.</li>
                    <li>Asesoría técnica para tus proyectos.</li>
                    <li>Compromiso con la puntualidad de entrega.</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End We Help Section -->
@endsection