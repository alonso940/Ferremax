@extends('template')

@section('title', 'Política de Privacidad')

@section('content')
<!-- Start Hero Section -->
<div class="hero hero-inner" style="padding: 2rem 0 !important;">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-12">
                <div class="intro-excerpt">
                    <h1 style="font-size: 2rem; margin-bottom: 15px;">Política de Privacidad</h1>
                    <p class="mb-4" style="font-size: 1rem;">Protegemos tus datos al máximo.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Hero Section -->

<div class="untree_co-section">
    <div class="container bg-light p-5 rounded shadow-sm">
        <div class="row">
            <div class="col-12 text-black" style="text-align: justify;">
                <p class="mb-3">En este sitio web respetamos la privacidad de nuestros usuarios y nos comprometemos a proteger sus datos personales. La presente Política de Privacidad describe cómo recopilamos, utilizamos y protegemos la información proporcionada por los usuarios al momento de registrarse, realizar compras o utilizar nuestros servicios.</p>
                <p class="mb-5">Al utilizar este sitio web, el usuario acepta las prácticas descritas en esta Política de Privacidad.</p>

                <div class="accordion" id="accordionPrivacy">
                  <!-- Item 1 -->
                  <div class="accordion-item shadow-sm mb-3" style="border: none; border-radius: 8px; overflow: hidden;">
                    <h2 class="accordion-header" id="headingOne">
                      <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="color: #3b5d50; background-color: #ffffff;">
                        Datos que recopilamos
                      </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionPrivacy">
                      <div class="accordion-body" style="background-color: #ffffff;">
                        <p class="mb-2 fw-bold" style="color: #3b5d50;">Para el uso de nuestros servicios, el sitio web puede recopilar los siguientes datos personales:</p>
                        <ul class="mb-3" style="list-style-type: disc; padding-left: 20px;">
                            <li>Nombres y apellidos</li>
                            <li>Documento de identidad (DNI)</li>
                            <li>Correo electrónico</li>
                            <li>Número de teléfono</li>
                            <li>Dirección de envío</li>
                            <li>RUC (en caso de solicitar factura)</li>
                            <li>Información de pedidos y compras realizadas</li>
                        </ul>
                        <p class="mb-0">Estos datos son proporcionados directamente por el usuario durante el registro, inicio de sesión o proceso de compra.</p>
                      </div>
                    </div>
                  </div>

                  <!-- Item 2 -->
                  <div class="accordion-item shadow-sm mb-3" style="border: none; border-radius: 8px; overflow: hidden;">
                    <h2 class="accordion-header" id="headingTwo">
                      <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="color: #3b5d50; background-color: #ffffff;">
                        Finalidad del Uso de la información
                      </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionPrivacy">
                      <div class="accordion-body" style="background-color: #ffffff;">
                        <ul class="mb-3" style="list-style-type: disc; padding-left: 20px;">
                            <li>Gestionar el registro de usuarios</li>
                            <li>Permitir el inicio de sesión en el sitio web</li>
                            <li>Procesar pedidos realizados mediante el checkout</li>
                            <li>Emitir boleta o factura según corresponda</li>
                            <li>Coordinar el envío de los productos</li>
                            <li>Contactar al usuario sobre su pedido</li>
                            <li>Mejorar la experiencia del usuario en el sitio web</li>
                        </ul>
                      </div>
                    </div>
                  </div>

                  <!-- Item 3 -->
                  <div class="accordion-item shadow-sm mb-3" style="border: none; border-radius: 8px; overflow: hidden;">
                    <h2 class="accordion-header" id="headingThree">
                      <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="color: #3b5d50; background-color: #ffffff;">
                        Protección de la información
                      </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionPrivacy">
                      <div class="accordion-body" style="background-color: #ffffff;">
                        <p class="mb-3">El sitio web adopta medidas de seguridad razonables para proteger los datos personales de los usuarios y evitar el acceso no autorizado, alteración o divulgación de la información.</p>
                        <p class="mb-2">Los datos personales no serán vendidos ni compartidos con terceros, salvo cuando sea necesario para la prestación del servicio. En estos casos, la información podrá ser compartida únicamente con proveedores de servicios de pago, entidades financieras o servicios de logística y transporte, con la finalidad de procesar pagos y realizar la entrega de los pedidos.</p>
                        <p class="mb-2">En todos los casos, solo se compartirá la información estrictamente necesaria para cumplir con el servicio solicitado por el usuario.</p>
                      </div>
                    </div>
                  </div>

                  <!-- Item 4 -->
                  <div class="accordion-item shadow-sm mb-3" style="border: none; border-radius: 8px; overflow: hidden;">
                    <h2 class="accordion-header" id="headingFour">
                      <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour" style="color: #3b5d50; background-color: #ffffff;">
                        Uso de cookies
                      </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionPrivacy">
                      <div class="accordion-body" style="background-color: #ffffff;">
                        <p class="mb-3">Este sitio web utiliza cookies para mejorar la experiencia del usuario, permitir el inicio de sesión, mantener el carrito de compras y analizar el uso del sitio web. Para más información, el usuario puede revisar <a href="{{ route('legal.cookies') }}" style="color: #f88f01; font-weight: bold; text-decoration: none;">la Política de Cookies</a> correspondiente.</p>
                      </div>
                    </div>
                  </div>

                  <!-- Item 5 -->
                  <div class="accordion-item shadow-sm mb-3" style="border: none; border-radius: 8px; overflow: hidden;">
                    <h2 class="accordion-header" id="headingFive">
                      <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive" style="color: #3b5d50; background-color: #ffffff;">
                        Derechos del usuario (Derechos ARCO)
                      </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionPrivacy">
                      <div class="accordion-body" style="background-color: #ffffff;">
                        <p class="mb-3">De conformidad con la Ley N° 29733, Ley de Protección de Datos Personales, el usuario puede ejercer sus derechos de Acceso, Rectificación, Cancelación y Oposición (ARCO) respecto a sus datos personales.</p>
                        <p class="mb-3">Para ejercer estos derechos, el usuario podrá enviar una solicitud a través de los medios de <a href="{{ route('contact') }}" style="color: #f88f01; font-weight: bold; text-decoration: none;">contacto</a> disponibles en el sitio web, indicando claramente su solicitud y los datos necesarios para su atención.</p>
                      </div>
                    </div>
                  </div>

                  <!-- Item 6 -->
                  <div class="accordion-item shadow-sm mb-3" style="border: none; border-radius: 8px; overflow: hidden;">
                    <h2 class="accordion-header" id="headingSix">
                      <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix" style="color: #3b5d50; background-color: #ffffff;">
                        Tiempo de conservación de los datos
                      </button>
                    </h2>
                    <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionPrivacy">
                      <div class="accordion-body" style="background-color: #ffffff;">
                        <p class="mb-3">Los datos personales proporcionados por el usuario serán conservados mientras se mantenga la relación comercial o sean necesarios para cumplir con las finalidades para las cuales fueron recopilados, como la gestión de pedidos, emisión de comprobantes y atención de reclamos.</p>
                        <p class="mb-3">Asimismo, los datos podrán conservarse durante el plazo requerido por las obligaciones legales y tributarias vigentes.</p>
                      </div>
                    </div>
                  </div>

                  <!-- Item 7 -->
                  <div class="accordion-item shadow-sm" style="border: none; border-radius: 8px; overflow: hidden;">
                    <h2 class="accordion-header" id="headingSeven">
                      <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven" style="color: #3b5d50; background-color: #ffffff;">
                        Cambios en la Política de Privacidad
                      </button>
                    </h2>
                    <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionPrivacy">
                      <div class="accordion-body" style="background-color: #ffffff;">
                        <p class="mb-3">El sitio web se reserva el derecho de modificar la presente Política de Privacidad en cualquier momento. Las modificaciones entrarán en vigencia desde su publicación en el sitio web.</p>
                      </div>
                    </div>
                  </div>
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

