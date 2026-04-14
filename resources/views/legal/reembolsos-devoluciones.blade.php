@extends('template')

@section('title', 'Reembolsos y Devoluciones')

@section('content')
<!-- Start Hero Section -->
<div class="hero hero-inner" style="padding: 2rem 0 !important;">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-12">
                <div class="intro-excerpt">
                    <h1 style="font-size: 2rem; margin-bottom: 15px;">Reembolsos y Devoluciones</h1>
                    <p class="mb-4" style="font-size: 1rem;">Información importante sobre la garantía de tus herramientas.</p>
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
                <p class="mb-3">En Ferremax queremos que estés satisfecho con tu compra. Si cambias de opinión o el producto no cumple tus expectativas, puedes solicitar un cambio o devolución bajo las siguientes condiciones.</p>

                <div class="accordion" id="accordionRefunds">
                  <!-- Item 1 -->
                  <div class="accordion-item shadow-sm mb-3" style="border: none; border-radius: 8px; overflow: hidden;">
                    <h2 class="accordion-header" id="headingOne">
                      <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="color: #3b5d50; background-color: #ffffff;">
                        Plazos y Condiciones
                      </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionRefunds">
                      <div class="accordion-body" style="background-color: #ffffff;">
                        <p class="mb-2 fw-bold" style="color: #3b5d50;">Puedes solicitar un cambio o devolución dentro de los 7 días calendario desde que recibes tu pedido. El producto debe cumplir con:</p>
                        <ul class="mb-3" style="list-style-type: disc; padding-left: 20px;">
                            <li>Estar completamente sin uso y con los sellos de seguridad intactos.</li>
                            <li>Conservar su empaque original, manuales, accesorios y etiquetas.</li>
                            <li>Presentar el comprobante de pago físico o digital (Boleta/Factura).</li>
                        </ul>
                      </div>
                    </div>
                  </div>

                  <!-- Item 2 -->
                  <div class="accordion-item shadow-sm mb-3" style="border: none; border-radius: 8px; overflow: hidden;">
                    <h2 class="accordion-header" id="headingTwo">
                      <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="color: #3b5d50; background-color: #ffffff;">
                        Productos que no aplican a devolución
                      </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionRefunds">
                      <div class="accordion-body" style="background-color: #ffffff;">
                        <p class="mb-2 fw-bold" style="color: #3b5d50;">No se aceptarán devoluciones si el producto:</p>
                        <ul class="mb-3" style="list-style-type: disc; padding-left: 20px;">
                            <li>Presenta señales de uso, suciedad o daños causados por el cliente.</li>
                            <li>Ha sido instalado o manipulado internamente.</li>
                            <li>Es un artículo cortado o hecho a medida (cables, mangueras, cadenas, etc.).</li>
                        </ul>
                      </div>
                    </div>
                  </div>

                  <!-- Item 3 -->
                  <div class="accordion-item shadow-sm mb-3" style="border: none; border-radius: 8px; overflow: hidden;">
                    <h2 class="accordion-header" id="headingThree">
                      <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="color: #3b5d50; background-color: #ffffff;">
                        Productos Defectuosos o Falla de Fábrica
                      </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionRefunds">
                      <div class="accordion-body" style="background-color: #ffffff;">
                        <p class="mb-3">Si el producto llega dañado o presenta fallas de funcionamiento, podrás solicitar un cambio inmediato o reembolso completo.</p>
                        <p class="mb-2"><strong>Nota:</strong> Las herramientas eléctricas y maquinaria serán sometidas a una inspección técnica previa para validar el origen de la falla antes de proceder con el cambio o reembolso.</p>
                      </div>
                    </div>
                  </div>

                  <!-- Item 4 -->
                  <div class="accordion-item shadow-sm mb-3" style="border: none; border-radius: 8px; overflow: hidden;">
                    <h2 class="accordion-header" id="headingFour">
                      <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour" style="color: #3b5d50; background-color: #ffffff;">
                        Reembolsos
                      </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionRefunds">
                      <div class="accordion-body" style="background-color: #ffffff;">
                        <p class="mb-2 fw-bold" style="color: #3b5d50;">Una vez validado el estado del producto devuelto, el reembolso se efectuará según el medio de pago original:</p>
                        <ul class="mb-3" style="list-style-type: disc; padding-left: 20px;">
                            <li><strong>Tarjetas de crédito/débito:</strong> El tiempo depende de la entidad bancaria (usualmente 15-30 días).</li>
                            <li><strong>Transferencias:</strong> Se realizarán en un plazo máximo de 48 horas tras la aprobación.</li>                        
                        </ul>
                      </div>
                    </div>
                  </div>

                  <!-- Item 5 -->
                  <div class="accordion-item shadow-sm mb-3" style="border: none; border-radius: 8px; overflow: hidden;">
                    <h2 class="accordion-header" id="headingFive">
                      <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive" style="color: #3b5d50; background-color: #ffffff;">
                        Costos de Envío por Devolución
                      </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionRefunds">
                      <div class="accordion-body" style="background-color: #ffffff;">
                        <p class="mb-3">Si la devolución es por falla de fábrica, Ferremax asume los costos de recojo. Si es por cambio de opinión o error del cliente, el costo del flete deberá ser asumido por el usuario.</p>
                      </div>
                    </div>
                  </div>
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
