@extends('template')

@section('title', 'Política de Envíos')

@section('content')
<!-- Start Hero Section -->
<div class="hero hero-inner" style="padding: 2rem 0 !important;">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-12">
                <div class="intro-excerpt">
                    <h1 style="font-size: 2rem; margin-bottom: 15px;">Política de Envíos</h1>
                    <p class="mb-4" style="font-size: 1rem;">Cobertura y detalles de transporte para todo Lambayeque.</p>
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
                <p class="mb-5">En FerreMax nos comprometemos a entregar tus pedidos de manera rápida y segura. Esta política establece las condiciones de despacho, costos, tiempos de entrega y responsabilidades del cliente, para que tu experiencia de compra sea clara y confiable.</p>

                <div class="accordion" id="accordionShipping">
                  <!-- Item 1 -->
                  <div class="accordion-item shadow-sm mb-3" style="border: none; border-radius: 8px; overflow: hidden;">
                    <h2 class="accordion-header" id="headingOne">
                      <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="color: #3b5d50; background-color: #ffffff;">
                        1. Despacho a Domicilio
                      </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionShipping">
                      <div class="accordion-body" style="background-color: #ffffff;">
                        <p class="mb-3">Los pedidos serán entregados en la dirección ingresada por el cliente al momento de realizar la compra. Es responsabilidad del usuario proporcionar datos correctos y completos para garantizar la entrega.</p>
                        <ul class="mb-0" style="list-style-type: disc; padding-left: 20px;">
                            <li class="mb-2"><strong>Dirección incorrecta:</strong> Si los datos son erróneos o incompletos, el pedido no podrá entregarse. Se coordinará una nueva entrega, la cual podrá aplicar un costo adicional.</li>
                            <li><strong>Intento de entrega:</strong> Si no se encuentra a nadie en el domicilio, se reprogramará el envío previa coordinación con el cliente.</li>
                        </ul>
                      </div>
                    </div>
                  </div>

                  <!-- Item 2 -->
                  <div class="accordion-item shadow-sm mb-3" style="border: none; border-radius: 8px; overflow: hidden;">
                    <h2 class="accordion-header" id="headingTwo">
                      <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="color: #3b5d50; background-color: #ffffff;">
                        2. Costos y Cobertura
                      </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionShipping">
                      <div class="accordion-body" style="background-color: #ffffff;">
                        <p class="mb-2 fw-bold" style="color: #3b5d50;">El costo y tiempo de entrega se calculan automáticamente según el distrito:</p>
                        <ul class="mb-0" style="list-style-type: disc; padding-left: 20px;">
                            <li class="mb-2"><strong>Zona 1 (S/ 10.00):</strong> Chiclayo, La Victoria, José Leonardo Ortiz. <em>(Entrega en menos de 24h)</em>.</li>
                            <li class="mb-2"><strong>Zona 2 (S/ 12.00):</strong> Pimentel, San José, Reque, Monsefú. <em>(Entrega de 24 a 48h)</em>.</li>
                            <li><strong>Zona 3 (S/ 15.00):</strong> Lambayeque, Ferreñafe, Pomalca, Ciudad Eten. <em>(Entrega de 24 a 48h)</em>.</li>
                        </ul>
                      </div>
                    </div>
                  </div>

                  <!-- Item 3 -->
                  <div class="accordion-item shadow-sm mb-3" style="border: none; border-radius: 8px; overflow: hidden;">
                    <h2 class="accordion-header" id="headingThree">
                      <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="color: #3b5d50; background-color: #ffffff;">
                        3. Horarios y Recepción
                      </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionShipping">
                      <div class="accordion-body" style="background-color: #ffffff;">
                        <ul class="mb-0" style="list-style-type: disc; padding-left: 20px;">
                            <li class="mb-2"><strong>Horario:</strong> Las entregas se realizan de lunes a sábado en horario laboral (9:00 a.m. – 8:00 p.m.).</li>
                            <li class="mb-2"><strong>Recepción:</strong> El pedido puede ser recibido por cualquier persona mayor de edad con DNI presente en la dirección indicada.</li>
                            <li><strong>Conformidad:</strong> Al recibir el producto, el cliente debe verificar su buen estado. La firma del cargo de entrega implica plena conformidad, no aceptándose reclamos posteriores por daños físicos externos.</li>
                        </ul>
                      </div>
                    </div>
                  </div>

                  <!-- Item 4 -->
                  <div class="accordion-item shadow-sm mb-3" style="border: none; border-radius: 8px; overflow: hidden;">
                    <h2 class="accordion-header" id="headingFour">
                      <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour" style="color: #3b5d50; background-color: #ffffff;">
                        4. Consideraciones Especiales
                      </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionShipping">
                      <div class="accordion-body" style="background-color: #ffffff;">
                        <p class="mb-2 fw-bold" style="color: #3b5d50;">Productos de volumen o maquinaria:</p>
                        <p class="mb-0">Los productos pesados, cajas voluminosas o maquinaria (como rotomartillos, generadores o equipos de taller) serán entregados en la puerta principal del domicilio o recepción. Por motivos de seguridad y para evitar daños en los equipos, nuestro personal no está autorizado a trasladar mercadería a pisos superiores o interiores del domicilio.</p>
                      </div>
                    </div>
                  </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
