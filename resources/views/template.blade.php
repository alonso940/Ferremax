<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="{{ asset('assets/furni/favicon.png') }}">

  <!-- Bootstrap CSS -->
  <link href="{{ asset('assets/furni/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link href="{{ asset('assets/furni/css/tiny-slider.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/furni/css/style.css') }}" rel="stylesheet">
  <title>FerreMax | Tienda de Ferretería Online</title>

  <style>
      /* Custom Hardware Store Product Images styling */
      .product-item img.product-thumbnail, .product-item-sm img {
          object-fit: contain;
          background-color: #ffffff;
          width: 100%;
          height: 250px;
          padding: 15px;
          border-radius: 10px;
          box-shadow: 0 4px 6px rgba(0,0,0,0.05); /* Slight shadow to separate from background */
          margin-bottom: 15px;
          transition: transform .3s;
      }
      .product-item:hover img.product-thumbnail {
          transform: translateY(-5px);
      }
      
      /* Maintain aspect ratio nicely for cart and forms */
      .cart-img-preview {
          width: 100px;
          height: 100px;
          object-fit: contain;
          background-color: #fff;
          padding: 5px;
          border-radius: 5px;
      /* Pagination styling (verde en lugar de azul) */
      .pagination .page-link {
          color: #3b5d50;
      }
      .page-item.active .page-link {
          background-color: #3b5d50;
          border-color: #3b5d50;
          color: #ffffff;
      }
      .pagination .page-link:hover {
          color: #f88f01;
      }
  </style>
  @yield('styles')
</head>

<body>
  <!-- Start Header/Navigation -->
  <nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">
      <div class="container">
          <a class="navbar-brand" href="{{ route('index') }}">FerreMax<span style="color: #f88f01;">.</span></a>

          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarsFurni">
              <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('index') }}">Inicio</a>
                  </li>
                  <li><a class="nav-link" href="{{ route('shop') }}">Tienda</a></li>
                  <li><a class="nav-link" href="{{ route('about') }}">Nosotros</a></li>
                  <li><a class="nav-link" href="{{ route('contact') }}">Contáctanos</a></li>
              </ul>

              <!-- Buscador Inteligente -->
              <form class="d-flex ps-lg-4 my-2 my-lg-0" action="{{ route('shop') }}" method="GET" style="max-width: 350px; width: 100%;">
                  <div class="input-group shadow-sm" style="border-radius: 50px; overflow: hidden; background: #fff;">
                      <input type="text" name="search" class="form-control border-0 shadow-none ps-3 bg-transparent" placeholder="¿Qué herramienta buscas hoy?" aria-label="Buscar" value="{{ request('search') }}" style="font-size: 0.9rem;">
                      <button class="btn border-0 pe-3 bg-transparent" type="submit" style="color: #3b5d50;">
                          <i class="fa fa-search"></i>
                      </button>
                  </div>
              </form>

              <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-lg-4 ms-0 mt-3 mt-lg-0">
                  @if(auth()->guard('web')->check())
                     <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('assets/furni/images/user.svg') }}" alt="Usuario" style="pointer-events: none;"> 
                            <span class="ms-1 d-none d-md-inline" style="pointer-events: none;">{{ auth()->guard('web')->user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="{{ route('profile') }}">Perfil</a></li>
                            <li><a class="dropdown-item" href="{{ route('orders') }}">Mis Pedidos</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ route('auth.logout') }}">Cerrar Sesión</a></li>
                        </ul>
                     </li>
                  @else
                     <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="userGuestDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" title="Cuenta">
                            <img src="{{ asset('assets/furni/images/user.svg') }}" alt="Usuario" style="pointer-events: none;">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="userGuestDropdown" style="border: none; border-radius: 8px; z-index: 1050;">
                            <li><a class="dropdown-item" href="{{ route('auth.login') }}">Iniciar sesión</a></li>
                            <li><a class="dropdown-item" href="{{ route('auth.register') }}">Registrarse</a></li>
                        </ul>
                     </li>
                  @endif
                  <li>
                      <a class="nav-link position-relative d-inline-block" href="{{ route('cart') }}">
                          <img src="{{ asset('assets/furni/images/cart.svg') }}" alt="Carrito">
                          @if(session('cart') && count(session('cart')) > 0)
                              @php
                                  $cartItemCount = array_sum(array_column(session('cart', []), 'quantity'));
                              @endphp
                              <span class="position-absolute top-10 start-100 translate-middle badge rounded-pill" style="background-color: #f88f01; font-size: 0.65rem; padding: 0.25em 0.5em; top: 5px !important; margin-left: -5px;">
                                  {{ $cartItemCount }}
                              </span>
                          @endif
                      </a>
                  </li>
              </ul>
          </div>
      </div>
  </nav>
  <!-- End Header/Navigation -->

  @yield('content')

  <!-- Start Footer Section -->
  <footer class="footer-section" style="background-color: #3b5d50; color: #ffffff; padding-top: 4rem; padding-bottom: 2rem;">
      <div class="container relative">
          <div class="row g-5 mb-5">
              <!-- Columna 1: Marca -->
              <div class="col-lg-3">
                  <div class="mb-4 footer-logo-wrap">
                      <a href="{{ route('index') }}" class="footer-logo text-white text-decoration-none h2 fw-bold" style="font-size: 2rem;">FerreMax<span style="color: #f88f01;">.</span></a>
                  </div>
                  <p class="mb-4 text-white-50" style="font-size: 0.9rem;">Los mejores materiales de construcción y herramientas al mejor precio. Confianza y calidad en cada proyecto.</p>

                  <ul class="list-unstyled custom-social d-flex gap-3">
                      <li><a href="https://www.facebook.com/profile.php?id=61574307974469" target="_blank" class="text-gray" style="font-size: 1.5rem;"><span class="fa fa-brands fa-facebook-f"></span></a></li>
                      <li><a href="https://www.instagram.com/ferremax.oficial/" target="_blank" class="text-gray" style="font-size: 1.5rem;"><span class="fa fa-brands fa-instagram"></span></a></li>
                      <li><a href="https://wa.me/51978045931" target="_blank" class="text-gray" style="font-size: 1.5rem;"><span class="fa fa-brands fa-whatsapp"></span></a></li>
                  </ul>
              </div>

              <div class="col-lg-9">
                  <div class="row links-wrap">
                      <!-- Columna 2: Enlaces Rápidos -->
                      <div class="col-12 col-sm-6 col-md-3 mb-4">
                          <h3 class="text-white h6 mb-3 fw-bold">Accesos Rápidos</h3>
                          <ul class="list-unstyled">
                              <li class="mb-2"><a href="{{ route('index') }}" class="text-white-50 text-decoration-none">Inicio</a></li>
                              <li class="mb-2"><a href="{{ route('about') }}" class="text-white-50 text-decoration-none">Nosotros</a></li>
                              <li class="mb-2"><a href="{{ route('shop') }}" class="text-white-50 text-decoration-none">Tienda</a></li>
                          </ul>
                      </div>

                      <!-- Columna 3: Atención al Cliente -->
                      <div class="col-12 col-sm-6 col-md-3 mb-4">
                          <h3 class="text-white h6 mb-3 fw-bold">Atención al Cliente</h3>
                          <ul class="list-unstyled">
                              <li class="mb-3"><a href="{{ route('contact') }}" class="text-white-50 text-decoration-none"><i class="fa fa-envelope me-1"></i> Contacto</a></li>
                              <li class="mb-2 mt-4">
                                  <a href="{{ route('book') }}" class="d-inline-block" title="Libro de Reclamaciones">
                                      <img src="{{ asset('assets/web/images/libroreclamasiones.png') }}" alt="Libro de Reclamaciones" style="max-height: 95px; width: auto; object-fit: contain; background-color: #ffffff; padding: 4px; border-radius: 4px;">
                                  </a>
                              </li>
                          </ul>
                      </div>

                      <!-- Columna 4: Políticas de Compra -->
                      <div class="col-12 col-sm-6 col-md-3 mb-4">
                          <h3 class="text-white h6 mb-3 fw-bold">Políticas de Compra</h3>
                          <ul class="list-unstyled">
                              <li class="mb-3">
                                  <a href="{{ route('legal.shipping') }}" class="text-white-50 text-decoration-none">Política de Envíos</a>
                                  <div style="font-size: 0.70rem; color: #a5b5af; line-height: 1.2; margin-top:2px;">Envíos solo Lambayeque (24-48h).</div>
                              </li>
                              <li class="mb-3">
                                  <a href="{{ route('legal.refunds') }}" class="text-white-50 text-decoration-none">Reembolsos y Devoluciones</a>
                                  <div style="font-size: 0.70rem; color: #a5b5af; line-height: 1.2; margin-top:2px;"></div>
                              </li>
                              <li class="mb-2">
                                  <a href="{{ route('legal.terms') }}" class="text-white-50 text-decoration-none">Términos del Servicio</a>
                              </li>
                          </ul>
                      </div>

                      <!-- Columna 5: Compra Segura -->
                      <div class="col-12 col-sm-6 col-md-3 mb-4">
                          <h3 class="text-white h6 mb-3 fw-bold">Compra Segura</h3>
                          <p class="text-white-50 mb-3" style="font-size: 0.85rem;">Pagos 100% seguros con:</p>
                          <div class="d-flex flex-wrap gap-2">
                              <div class="bg-white rounded px-2 py-1 text-dark fw-bold d-flex align-items-center mb-1 shadow-sm" style="font-size:0.8rem;">
                                  <i class="fa fa-brands fa-cc-visa fs-5 me-1" style="color: #1434CB;"></i> VISA
                              </div>
                              <div class="bg-white rounded px-2 py-1 text-dark fw-bold d-flex align-items-center mb-1 shadow-sm" style="font-size:0.8rem;">
                                  <img src="{{ asset('assets/web/images/logo-Mastercard.png') }}" alt="Mastercard" style="height: 16px; object-fit: contain; margin-right: 4px;"> Master
                              </div>
                              <div class="bg-white rounded px-2 py-1 fw-bold d-flex align-items-center mb-1 shadow-sm" style="font-size:0.8rem; color: #6f2282;">
                                  <img src="{{ asset('assets/web/images/yape logo.png') }}" alt="Yape" style="height: 18px; object-fit: contain; transform: scale(1.3); transform-origin: left;" class="me-2"> Yape
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <!-- Barra Inferior Legales -->
          <div class="border-top border-secondary copyright mt-0 pt-4">
              <div class="row align-items-center">
                  <div class="col-lg-5 text-center text-lg-start mb-3 mb-lg-0">
                      <p class="mb-0 text-white-50" style="font-size: 0.9rem;">
                          Copyright &copy;<script>document.write(new Date().getFullYear());</script>. Todos los derechos reservados.
                      </p>
                  </div>
                  <div class="col-lg-7 text-center text-lg-end">
                      <ul class="list-unstyled d-inline-flex flex-wrap justify-content-center justify-content-lg-end ms-auto mb-0 gap-3">
                          <li><a href="{{ route('legal.privacy') }}" class="text-white-50 text-decoration-none" style="font-size: 0.85rem;">Política de Privacidad</a></li>
                          <li><a href="{{ route('legal.cookies') }}" class="text-white-50 text-decoration-none" style="font-size: 0.85rem;">Política de Cookies</a></li>
                          <li class="d-none d-sm-inline"><span class="text-white-50" style="font-size: 0.85rem;">|</span></li>
                          <li><span class="text-white-50 fw-bold" style="font-size: 0.85rem;">Tu Ferretería de Confianza</span></li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
  </footer>
  <!-- End Footer Section -->

  <script src="{{ asset('assets/furni/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/furni/js/tiny-slider.js') }}"></script>
  <script src="{{ asset('assets/furni/js/custom.js') }}"></script>
  @yield('scripts')

  <!-- Cookie Banner -->
  <div id="cookie-banner" style="display: none; position: fixed; bottom: 0; left: 0; width: 100%; background-color: rgba(0, 0, 0, 0.95); color: #ffffff; padding: 20px 0; z-index: 9999; box-shadow: 0 -4px 15px rgba(0,0,0,0.3);">
      <div class="container">
          <div class="row align-items-center">
              <div class="col-md-9 mb-3 mb-md-0 text-center text-md-start">
                  <p class="mb-0" style="font-size: 0.95rem; line-height: 1.6;">
                      En FerreMax utilizamos cookies propias y de terceros para que tu experiencia de compra sea fluida, analizar el tráfico y mostrarte herramientas que realmente te interesen. Al continuar navegando, aceptas su uso conforme a nuestra <a href="{{ route('legal.cookies') }}" target="_blank" style="color: #f88f01; text-decoration: none; font-weight: bold;">Política de Cookies</a>.
                  </p>
              </div>
              <div class="col-md-3 text-center text-md-end">
                  <button id="accept-cookies" class="btn fw-bold px-4 py-2" style="background-color: #3b5d50; color: #ffffff; border-radius: 5px;">Aceptar</button>
              </div>
          </div>
      </div>
  </div>

  <script>
      document.addEventListener("DOMContentLoaded", function() {
          if (!localStorage.getItem("cookies_accepted")) {
              document.getElementById("cookie-banner").style.display = "block";
          }

          document.getElementById("accept-cookies").addEventListener("click", function() {
              localStorage.setItem("cookies_accepted", "true");
              document.getElementById("cookie-banner").style.opacity = "0";
              setTimeout(() => {
                  document.getElementById("cookie-banner").style.display = "none";
              }, 300);
          });
      });
  </script>
</body>
</html>
