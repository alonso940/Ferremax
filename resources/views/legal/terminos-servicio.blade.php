@extends('template')

@section('title', 'Términos del Servicio')

@section('content')
<!-- Start Hero Section -->
<div class="hero hero-inner" style="padding: 2rem 0 !important;">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-12">
                <div class="intro-excerpt">
                    <h1 style="font-size: 2rem; margin-bottom: 15px;">Términos del Servicio</h1>
                    <p class="mb-4" style="font-size: 1rem;">Reglas generales para el uso de nuestra plataforma FerreMax.</p>
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
                <p class="mb-3">El uso del sitio web de FerreMax está sujeto a los presentes Términos y Condiciones, los cuales deberán ser cumplidos por todos los usuarios y clientes. Al acceder y utilizar este sitio web, el usuario acepta expresamente estas condiciones.</p>
                <p class="mb-2">FerreMax se reserva el derecho de modificar, actualizar o ampliar los presentes Términos y Condiciones en cualquier momento. Las modificaciones entrarán en vigencia desde su publicación en el sitio web.</p>
                <p class="mb-2">Es responsabilidad del usuario revisar periódicamente los Términos y Condiciones vigentes al momento de utilizar el sitio. En caso de no estar de acuerdo con estos términos, el usuario deberá abstenerse de utilizar el sitio web.</p>

                <div class="accordion" id="accordionTerms">
                  <!-- Item 1 -->
                  <div class="accordion-item shadow-sm mb-3" style="border: none; border-radius: 8px; overflow: hidden;">
                    <h2 class="accordion-header" id="headingOne">
                      <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="color: #3b5d50; background-color: #ffffff;">
                        Uso del sitio web
                      </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionTerms">
                      <div class="accordion-body" style="background-color: #ffffff;">
                        <p class="mb-3">El usuario se compromete a utilizar el sitio web de manera responsable, respetando la legislación vigente y evitando cualquier actividad que pueda afectar el funcionamiento del sistema.</p>
                      </div>
                    </div>
                  </div>

                  <!-- Item 2 -->
                  <div class="accordion-item shadow-sm mb-3" style="border: none; border-radius: 8px; overflow: hidden;">
                    <h2 class="accordion-header" id="headingTwo">
                      <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="color: #3b5d50; background-color: #ffffff;">
                        Registro de usuario
                      </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionTerms">
                      <div class="accordion-body" style="background-color: #ffffff;">
                        <p class="mb-3">Para realizar compras en el sitio web, el usuario deberá registrarse o iniciar sesión.</p>
                        <p class="mb-2">El usuario es responsable de proporcionar información veraz y mantener la confidencialidad de su cuenta y contraseña.</p>
                        <p class="mb-2">El sitio web no se hace responsable por el uso indebido de la cuenta por parte de terceros.</p>
                      </div>
                    </div>
                  </div>

                  <!-- Item 3 -->
                  <div class="accordion-item shadow-sm mb-3" style="border: none; border-radius: 8px; overflow: hidden;">
                    <h2 class="accordion-header" id="headingThree">
                      <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="color: #3b5d50; background-color: #ffffff;">
                        Carrito de compras
                      </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionTerms">
                      <div class="accordion-body" style="background-color: #ffffff;">
                        <p class="mb-3">El usuario puede agregar o eliminar productos del carrito antes de confirmar el pedido.</p>
                        <p class="mb-2">Los productos añadidos al carrito no garantizan su disponibilidad hasta que la compra sea confirmada.</p>
                      </div>
                    </div>
                  </div>

                  <!-- Item 4 -->
                  <div class="accordion-item shadow-sm mb-3" style="border: none; border-radius: 8px; overflow: hidden;">
                    <h2 class="accordion-header" id="headingFour">
                      <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour" style="color: #3b5d50; background-color: #ffffff;">
                        Proceso de compra
                      </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionTerms">
                      <div class="accordion-body" style="background-color: #ffffff;">
                        <p class="mb-2 fw-bold" style="color: #3b5d50;">Para finalizar una compra, el usuario deberá:</p>
                        <ul class="mb-3" style="list-style-type: disc; padding-left: 20px;">
                            <li>Iniciar sesión en su cuenta</li>
                            <li>Verificar los productos del carrito</li>
                            <li>Ingresar los datos de envío</li>
                            <li>Seleccionar el tipo de comprobante (boleta o factura)</li>
                            <li>Confirmar el pedido</li>
                        </ul>
                        <p class="mb-3">Una vez confirmado, el pedido será procesado por el sistema.</p>
                      </div>
                    </div>
                  </div>

                  <!-- Item 5 -->
                  <div class="accordion-item shadow-sm mb-3" style="border: none; border-radius: 8px; overflow: hidden;">
                    <h2 class="accordion-header" id="headingFive">
                      <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive" style="color: #3b5d50; background-color: #ffffff;">
                        Precios y disponibilidad
                      </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionTerms">
                      <div class="accordion-body" style="background-color: #ffffff;">
                        <p class="mb-3">Los precios mostrados en el sitio web están expresados en moneda local y pueden cambiar sin previo aviso.</p>
                        <p class="mb-2">Todos los productos están sujetos a disponibilidad de stock.</p>
                        <p class="mb-2">En caso de no contar con stock, el pedido podrá ser cancelado y se notificará al usuario.</p>
                        <p class="mb-2">FerreMax se reserva el derecho de cancelar pedidos en caso de errores evidentes en el precio publicado, ya sea por fallas técnicas, errores tipográficos o digitación incorrecta.</p>
                      </div>
                    </div>
                  </div>

                  <!-- Item 6 -->
                  <div class="accordion-item shadow-sm mb-3" style="border: none; border-radius: 8px; overflow: hidden;">
                    <h2 class="accordion-header" id="headingSix">
                      <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix" style="color: #3b5d50; background-color: #ffffff;">
                        Boleta y Factura
                      </button>
                    </h2>
                    <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionTerms">
                      <div class="accordion-body" style="background-color: #ffffff;">
                        <p class="mb-3">El usuario podrá elegir entre boleta o factura durante el proceso de compra Para la emisión de factura, el usuario deberá ingresar correctamente los datos requeridos, incluyendo RUC y razón social.</p>
                        <p class="mb-2">Una vez emitido el comprobante, no se podrán realizar modificaciones.</p>
                      </div>
                    </div>
                  </div>

                  <!-- Item 7 -->
                  <div class="accordion-item shadow-sm mb-3" style="border: none; border-radius: 8px; overflow: hidden;">
                    <h2 class="accordion-header" id="headingSeven">
                      <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven" style="color: #3b5d50; background-color: #ffffff;">
                        Envíos y Entregas
                      </button>
                    </h2>
                    <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionTerms">
                      <div class="accordion-body" style="background-color: #ffffff;">
                        <p class="mb-3">Los pedidos serán enviados a la dirección proporcionada por el usuario durante el proceso de compra. El usuario es responsable de ingresar correctamente la información de envío.</p>
                        <p class="mb-2">Los tiempos de entrega pueden variar según la ubicación y disponibilidad de stock.</p>
                        <p class="mb-2">En caso no se encuentre a nadie en la dirección indicada, se realizará un nuevo intento de entrega. Si tras los intentos de entrega no se logra concretar la entrega, el pedido retornará al almacén y el cliente deberá coordinar un nuevo envío, asumiendo el costo adicional correspondiente.</p>
                      </div>
                    </div>
                  </div>

                  <!-- Item 8 -->
                  <div class="accordion-item shadow-sm mb-3" style="border: none; border-radius: 8px; overflow: hidden;">
                    <h2 class="accordion-header" id="headingEight">
                      <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight" style="color: #3b5d50; background-color: #ffffff;">
                        Cancelaciones y Devoluciones
                      </button>
                    </h2>
                    <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#accordionTerms">
                      <div class="accordion-body" style="background-color: #ffffff;">
                        <p class="mb-3">Las cancelaciones o devoluciones se regirán conforme a las políticas establecidas en la sección correspondiente del sitio web.</p>
                        <p class="mb-2">El sitio web se reserva el derecho de evaluar cada caso.</p>
                      </div>
                    </div>
                  </div>

                  <!-- Item 9 -->
                  <div class="accordion-item shadow-sm mb-3" style="border: none; border-radius: 8px; overflow: hidden;">
                    <h2 class="accordion-header" id="headingNine">
                      <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine" style="color: #3b5d50; background-color: #ffffff;">
                        Responsabilidad del Usuario
                      </button>
                    </h2>
                    <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine" data-bs-parent="#accordionTerms">
                      <div class="accordion-body" style="background-color: #ffffff;">
                        <p class="mb-2 fw-bold" style="color: #3b5d50;">El usuario se compromete a:</p>
                        <ul class="mb-3" style="list-style-type: disc; padding-left: 20px;">
                            <li>Proporcionar información verídica</li>
                            <li>No realizar compras fraudulentas</li>
                            <li>No alterar el funcionamiento del sitio</li>
                            <li>Utilizar el sitio solo con fines legales</li>
                        </ul>
                      </div>
                    </div>
                  </div>

                  <!-- Item 10 -->
                  <div class="accordion-item shadow-sm mb-3" style="border: none; border-radius: 8px; overflow: hidden;">
                    <h2 class="accordion-header" id="headingTen">
                      <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen" style="color: #3b5d50; background-color: #ffffff;">
                        Protección de datos
                      </button>
                    </h2>
                    <div id="collapseTen" class="accordion-collapse collapse" aria-labelledby="headingTen" data-bs-parent="#accordionTerms">
                      <div class="accordion-body" style="background-color: #ffffff;">
                        <p class="mb-3">El tratamiento de los datos personales del usuario se realiza conforme a la <a href="{{ route('legal.privacy') }}" style="color: #f88f01; font-weight: bold; text-decoration: none;">la Política de Privacidad</a> del sitio web.</p>
                      </div>
                    </div>
                  </div>

                  <!-- Item 11 -->
                  <div class="accordion-item shadow-sm mb-3" style="border: none; border-radius: 8px; overflow: hidden;">
                    <h2 class="accordion-header" id="headingEleven">
                      <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven" style="color: #3b5d50; background-color: #ffffff;">
                        Garantías
                      </button>
                    </h2>
                    <div id="collapseEleven" class="accordion-collapse collapse" aria-labelledby="headingEleven" data-bs-parent="#accordionTerms">
                      <div class="accordion-body" style="background-color: #ffffff;">
                        <p class="mb-3">Los productos comercializados en el sitio web cuentan con garantía del fabricante cuando corresponda. Las garantías de herramientas eléctricas u otros productos de marca serán atendidas por los servicios técnicos autorizados de cada fabricante.</p>           
                        <p class="mb-3">El sitio web podrá brindar apoyo informativo para canalizar la garantía, sin asumir responsabilidad directa sobre la misma.</p>           
                        <p class="mb-2 fw-bold" style="color: #3b5d50;">Exclusiones</p>
                        <p class="mb-3">No están cubiertos por esta garantía los desperfectos y daños siguientes:</p> 
                        <ul class="mb-3" style="list-style-type: disc; padding-left: 20px;">
                            <li>Aquellos causados por mal uso, maltrato intencional o negligente, quemaduras, raspaduras, cortaduras, caídas, impactos, accidentes, abolladuras, quiñes, ralladuras, corrosión, óxido, humedad, incendio, sismo, inundación, desastre natural, animales, entre otros supuestos similares.</li>
                            <li>Cualquier modificación, cambio o alteración en sus características originales a los productos o en cualquiera de sus partes anula esta garantía. Igualmente la anula, en aquellos casos donde corresponda, el incumplimiento de las instrucciones del fabricante en lo que se refiere a la instalación, uso o mantenimiento del producto.</li>
                            <li>Dependiendo de la naturaleza de los productos, éstos no deben ser expuestos o estar en contacto con agua, humedad, arena, tierra, polvo, calor, animales o insectos ni, en general, condiciones ambientales no apropiadas. Los daños resultantes de tales circunstancias también se encuentran excluidos de la garantía</li>
                        </ul>
                      </div>
                    </div>
                  </div>

                  <!-- Item 12 -->
                  <div class="accordion-item shadow-sm mb-3" style="border: none; border-radius: 8px; overflow: hidden;">
                    <h2 class="accordion-header" id="headingTwelve">
                      <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwelve" aria-expanded="false" aria-controls="collapseTwelve" style="color: #3b5d50; background-color: #ffffff;">
                        Legislación aplicable
                      </button>
                    </h2>
                    <div id="collapseTwelve" class="accordion-collapse collapse" aria-labelledby="headingTwelve" data-bs-parent="#accordionTerms">
                      <div class="accordion-body" style="background-color: #ffffff;">
                        <p class="mb-3">Los presentes Términos del Servicio se rigen por la legislación vigente en Perú.</p>           
                      </div>
                    </div>
                  </div>

                  <!-- Item 13 -->
                  <div class="accordion-item shadow-sm mb-3" style="border: none; border-radius: 8px; overflow: hidden;">
                    <h2 class="accordion-header" id="headingThirteen">
                      <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThirteen" aria-expanded="false" aria-controls="collapseThirteen" style="color: #3b5d50; background-color: #ffffff;">
                        Modificaciones
                      </button>
                    </h2>
                    <div id="collapseThirteen" class="accordion-collapse collapse" aria-labelledby="headingThirteen" data-bs-parent="#accordionTerms">
                      <div class="accordion-body" style="background-color: #ffffff;">
                        <p class="mb-3">El sitio web se reserva el derecho de modificar estos Términos del Servicio en cualquier momento. Las modificaciones entrarán en vigencia desde su publicación en el sitio web.</p>           
                      </div>
                    </div>
                  </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection