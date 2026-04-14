@extends('template')

@section('title', 'Finalizar Compra')

@section('content')
<!-- Start Hero Section -->
<div class="hero hero-inner" style="padding: 2rem 0 !important;">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-12">
                <div class="intro-excerpt">
                    <h1 style="font-size: 2rem; margin-bottom: 15px;">Finalizar Compra</h1>
                    <p class="mb-4" style="font-size: 1rem;">Completa tus datos para procesar tu pedido y calcular tu envío.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Hero Section -->

<div class="untree_co-section">
    <div class="container">
        <form method="POST" action="{{ route('finalize') }}" id="checkout-form">
            @csrf
            <!-- We keep these hidden inputs for total cart price to help JS logic -->
            <input type="hidden" id="raw-cart-total" value="{{ $total }}">
            <!-- A hidden input to store the calculated shipping price so the backend can verify -->
            <input type="hidden" name="calculated_shipping" id="calculated_shipping" value="0">
            
            <div class="row">
                <!-- Columna Izquierda: Detalles de Facturación y Envío -->
                <div class="col-md-7 mb-5 mb-md-0">
                    
                    <!-- Bloque 1: Facturación -->
                    <div class="p-4 p-lg-5 border bg-white rounded shadow-sm mb-4">
                        <h2 class="h4 mb-4 text-black border-bottom pb-2" style="color: #3b5d50 !important;">1. Datos Personales y Facturación</h2>
                        
                        <div class="form-group row mb-3">
                            <div class="col-md-6">
                                <label class="text-black fw-bold">Nombre <span class="text-danger">*</span></label>
                                <input type="text" class="form-control bg-light" name="name" value="{{ auth()->user()->name }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="text-black fw-bold">Apellidos <span class="text-danger">*</span></label>
                                <input type="text" class="form-control bg-light" name="last_name" value="{{ auth()->user()->last_name }}" readonly>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <div class="col-md-6">
                                <label class="text-black fw-bold">DNI <span class="text-danger">*</span></label>
                                <input type="text" class="form-control bg-light" name="document" value="{{ auth()->user()->document }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="text-black fw-bold">Celular <span class="text-danger">*</span></label>
                                <input type="text" class="form-control bg-light" name="phone" value="{{ auth()->user()->phone ?? '' }}" required>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <div class="col-md-12">
                                <label class="text-black fw-bold">Comprobante <span class="text-danger">*</span></label>
                                <div class="d-flex gap-4 mt-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="voucher" id="voucherBoleta" value="Boleta" checked style="cursor: pointer;">
                                        <label class="form-check-label" for="voucherBoleta" style="cursor: pointer;">Boleta</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="voucher" id="voucherFactura" value="Factura" style="cursor: pointer;">
                                        <label class="form-check-label" for="voucherFactura" style="cursor: pointer;">Factura</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Campos ocultos por defecto, mostrados cuando es Factura -->
                        <div id="factura-fields" style="display: none;" class="p-3 bg-light rounded mt-3">
                            <div class="form-group row mb-3">
                                <div class="col-md-6">
                                    <label class="text-black fw-bold">RUC <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="bussiness_document" name="bussiness_document" value="{{ old('bussiness_document') }}" maxlength="11" placeholder="Ej. 20123456789" pattern="^(10|20)\d{9}$" title="El RUC debe iniciar con 10 o 20" oninput="this.value=this.value.replace(/\D/g, '')">
                                    <div class="invalid-feedback fw-bold" id="ruc-error"></div>
                                </div>
                                <div class="col-md-6">
                                    <label class="text-black fw-bold">Razón Social <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="bussiness_name" name="bussiness_name" value="{{ old('bussiness_name') }}" placeholder="Ej. Constructora ABC" pattern="^[^0-9].*$" title="La Razón Social">
                                    <div class="invalid-feedback fw-bold" id="rs-error"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bloque 2: Dirección de Envío -->
                    <div class="p-4 p-lg-5 border bg-white rounded shadow-sm mb-4">
                        <h2 class="h4 mb-4 text-black border-bottom pb-2" style="color: #3b5d50 !important;">2. Ingresar Dirección</h2>

                        <div class="form-group row mb-3">
                            <div class="col-md-4">
                                <label class="text-black fw-bold">Departamento <span class="text-danger">*</span></label>
                                <input type="text" class="form-control bg-light" name="departamento" value="Lambayeque" readonly>
                            </div>
                            <div class="col-md-4">
                                <label class="text-black fw-bold">Provincia <span class="text-danger">*</span></label>
                                <select class="form-select" id="provincia-select" name="provincia" required>
                                    <option value="">Seleccione</option>
                                    <option value="Chiclayo">Chiclayo</option>
                                    <option value="Ferreñafe">Ferreñafe</option>
                                    <option value="Lambayeque">Lambayeque</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="text-black fw-bold">Distrito <span class="text-danger">*</span></label>
                                <select class="form-select" id="distrito-select" name="city" required disabled>
                                    <option value="">Seleccione</option>
                                    <!-- Options populated by JS -->
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <div class="col-md-8">
                                <label class="text-black fw-bold">Nombre de la vía (Av / Calle / Jr) <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="street_name" placeholder="Ej. Calle Los Cedros" required>
                            </div>
                            <div class="col-md-4">
                                <label class="text-black fw-bold">Número <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="street_number" placeholder="Ej. 123" required>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <div class="col-md-12">
                                <label class="text-black fw-bold">Dpto / Int / Piso / Lote / Bloque <span class="text-muted">(Opcional)</span></label>
                                <input type="text" class="form-control" name="street_extra" placeholder="Ej. Dpto 201">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Columna Derecha: Resumen y Pago -->
                <div class="col-md-5">
                    <div class="row mb-5">
                        <div class="col-md-12">
                            
                            <!-- Tu Pedido -->
                            <div class="p-4 bg-white border rounded shadow-sm mb-4">
                                <h2 class="h4 mb-4 text-black border-bottom pb-2" style="color: #3b5d50 !important;">Resumen de tu pedido</h2>
                                
                                <ul class="list-unstyled mb-4">
                                    @foreach($cart as $id => $item)
                                    <li class="d-flex justify-content-between align-items-center mb-2 pb-2 border-bottom">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('storage/'.$item['image']) }}" style="width: 40px; height: 40px; object-fit: contain; margin-right: 10px;" class="border rounded p-1">
                                            <span class="text-black" style="font-size: 0.9rem;">{{ $item['name'] }} <strong class="mx-2">x</strong> {{ $item['quantity'] }}</span>
                                        </div>
                                        <span class="text-black font-weight-bold" style="font-size: 0.95rem;">S/{{ number_format($item['price'] * $item['quantity'], 2) }}</span>
                                    </li>
                                    @endforeach
                                </ul>

                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-black">Subtotal</span>
                                    <span class="text-black fw-bold">S/<span id="summary-subtotal">{{ number_format($total, 2) }}</span></span>
                                </div>
                                <div class="d-flex justify-content-between mb-3 text-success">
                                    <span>Costo de Envío <small id="shipping-zone-text" class="text-muted d-block" style="font-size: 0.75rem;">(Por calcular...)</small></span>
                                    <span class="fw-bold">S/<span id="summary-shipping">0.00</span></span>
                                </div>
                                <div class="d-flex justify-content-between py-3 border-top">
                                    <span class="text-black fw-bold h5">Total a Cobrar</span>
                                    <span class="text-black fw-bold h5">S/<span id="summary-total">{{ number_format($total, 2) }}</span></span>
                                </div>
                            </div>

                            <!-- Métodos de Pago -->
                            <div class="p-4 bg-white border rounded shadow-sm mb-4">
                                <h2 class="h4 mb-4 text-black border-bottom pb-2" style="color: #3b5d50 !important;">3. Métodos de Pago</h2>
                                
                                <!-- Opciones de Pago (Radio Buttons) -->
                                <div class="form-check mb-3 p-3 border rounded shadow-sm d-flex flex-wrap align-items-center">
                                    <input class="form-check-input m-0" type="radio" name="payment_type" id="payTarjeta" value="tarjeta" style="cursor: pointer;">
                                    <label class="form-check-label fw-bold ms-2 text-dark d-flex align-items-center" for="payTarjeta" style="cursor: pointer; flex-grow: 1;">
                                        <i class="fa fa-credit-card me-2 text-primary"></i> Tarjeta de Crédito/Débito
                                    </label>
                                    
                                    <!-- Formulario de Tarjeta Plegable -->
                                    <div id="form-tarjeta" class="w-100 mt-3 p-3 bg-light rounded" style="display: none;">
                                        <div class="mb-3">
                                            <label class="fw-bold" style="font-size:0.85rem;">Número de tarjeta <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control form-control-sm" id="cc_number" name="cc_number" placeholder="XXXX XXXX XXXX XXXX" maxlength="19">
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <label class="fw-bold" style="font-size:0.85rem;">Vencimiento (MM/AA) <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control form-control-sm" id="cc_expiry" name="cc_expiry" placeholder="MM/AA" maxlength="5">
                                            </div>
                                            <div class="col-6">
                                                <label class="fw-bold" style="font-size:0.85rem;">CVV <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control form-control-sm" id="cc_cvv" name="cc_cvv" placeholder="123" maxlength="4">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-check mb-3 p-3 border rounded shadow-sm d-flex flex-wrap align-items-center">
                                    <input class="form-check-input m-0" type="radio" name="payment_type" id="payYape" value="yape" style="cursor: pointer;">
                                    <label class="form-check-label fw-bold ms-2 text-dark d-flex align-items-center" for="payYape" style="cursor: pointer; flex-grow: 1;">
                                        <img src="{{ asset('assets/web/images/yape logo.png') }}" alt="Yape" style="height: 18px; object-fit: contain; transform: scale(1.5); transform-origin: left; margin-right: 15px;"> Billetera Digital (Yape)
                                    </label>

                                    <!-- Formulario Yape Plegable -->
                                    <div id="form-yape" class="w-100 mt-3 p-3 bg-light rounded" style="display: none;">
                                        <p class="mb-3" style="font-size: 0.85rem; color: #555;">Para finalizar la compra, ingresa tu celular y el código de aprobación de tu app Yape. <strong class="text-danger">El código es válido por 2 min</strong>. Luego podrás generar otro en tu app Yape.</p>
                                        <div class="mb-3">
                                            <label class="fw-bold" style="font-size:0.85rem;">Número de Celular Yape <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control form-control-sm" name="yape_phone" placeholder="999 999 999" maxlength="9">
                                        </div>
                                        <div class="mb-2">
                                            <label class="fw-bold" style="font-size:0.85rem;">Código de Aprobación <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control form-control-sm" name="yape_code" placeholder="Ej. 135489" maxlength="6">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- Términos y Botón -->
                            <div class="border-0">
                                <div class="form-check mb-4">
                                    <input class="form-check-input" type="checkbox" id="terms" name="terms" required style="cursor: pointer;">
                                    <label class="form-check-label text-dark" for="terms" style="cursor: pointer; font-size: 0.9rem;">
                                        He leído y acepto los <a href="{{ route('legal.terms') }}" target="_blank" class="fw-bold text-decoration-none" style="color: #f88f01;">Términos y Condiciones</a> y la <a href="{{ route('legal.privacy') }}" target="_blank" class="fw-bold text-decoration-none" style="color: #f88f01;">Política de Privacidad</a>.
                                    </label>
                                </div>

                                <button class="btn btn-dark btn-lg py-3 w-100 fw-bold shadow-lg" type="submit" style="background-color: #3b5d50; border: none; border-radius: 8px;">CONFIRMAR Y PAGAR</button>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>

@endsection

@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        
        // 1. Lógica Factura vs Boleta
        const voucherBoleta = document.getElementById("voucherBoleta");
        const voucherFactura = document.getElementById("voucherFactura");
        const facturaFields = document.getElementById("factura-fields");
        const rucInput = document.getElementById("bussiness_document");
        const rnInput = document.getElementById("bussiness_name");

        function toggleFacturaFields() {
            if(voucherFactura.checked) {
                facturaFields.style.display = 'block';
                rucInput.setAttribute('required', 'required');
                rnInput.setAttribute('required', 'required');
            } else {
                facturaFields.style.display = 'none';
                rucInput.removeAttribute('required');
                rnInput.removeAttribute('required');
                rucInput.value = "";
                rnInput.value = "";
            }
        }
        voucherBoleta.addEventListener('change', toggleFacturaFields);
        voucherFactura.addEventListener('change', toggleFacturaFields);

        // 2. Lógica Acordeon de Pagos
        const payTarjeta = document.getElementById("payTarjeta");
        const payYape = document.getElementById("payYape");
        const formTarjeta = document.getElementById("form-tarjeta");
        const formYape = document.getElementById("form-yape");

        function togglePaymentForms() {
            if(payTarjeta.checked) {
                formTarjeta.style.display = 'block';
                formYape.style.display = 'none';
                // Requiring inputs
                document.querySelector('input[name="cc_number"]').required = true;
                document.querySelector('input[name="cc_expiry"]').required = true;
                document.querySelector('input[name="cc_cvv"]').required = true;
                
                document.querySelector('input[name="yape_phone"]').required = false;
                document.querySelector('input[name="yape_code"]').required = false;
            } else if (payYape.checked) {
                formTarjeta.style.display = 'none';
                formYape.style.display = 'block';

                document.querySelector('input[name="cc_number"]').required = false;
                document.querySelector('input[name="cc_expiry"]').required = false;
                document.querySelector('input[name="cc_cvv"]').required = false;

                document.querySelector('input[name="yape_phone"]').required = true;
                document.querySelector('input[name="yape_code"]').required = true;
            }
        }
        payTarjeta.addEventListener('change', togglePaymentForms);
        payYape.addEventListener('change', togglePaymentForms);

        // 3. Lógica Envíos y Zonas
        const distritosPorProvincia = {
            "Chiclayo": [
                { nombre: "Chiclayo", zona: 1, precio: 10.00 },
                { nombre: "La Victoria", zona: 1, precio: 10.00 },
                { nombre: "José Leonardo Ortiz", zona: 1, precio: 10.00 },
                { nombre: "Pimentel", zona: 2, precio: 12.00 },
                { nombre: "San José", zona: 2, precio: 12.00 },
                { nombre: "Reque", zona: 2, precio: 12.00 },
                { nombre: "Monsefú", zona: 2, precio: 12.00 },
                { nombre: "Pomalca", zona: 3, precio: 15.00 },
                { nombre: "Ciudad Eten", zona: 3, precio: 15.00 }
            ],
            "Ferreñafe": [
                { nombre: "Ferreñafe", zona: 3, precio: 15.00 }
            ],
            "Lambayeque": [
                { nombre: "Lambayeque", zona: 3, precio: 15.00 }
            ]
        };

        const propSelect = document.getElementById('provincia-select');
        const distSelect = document.getElementById('distrito-select');
        const summaryShipping = document.getElementById('summary-shipping');
        const summaryTotal = document.getElementById('summary-total');
        const rawTotalInput = document.getElementById('raw-cart-total');
        const calcShippingInput = document.getElementById('calculated_shipping');
        const shippingZoneText = document.getElementById('shipping-zone-text');

        propSelect.addEventListener('change', function() {
            const provincia = this.value;
            distSelect.innerHTML = '<option value="">Seleccione Distrito</option>';
            
            if(provincia && distritosPorProvincia[provincia]) {
                distSelect.disabled = false;
                distritosPorProvincia[provincia].forEach(distrito => {
                    const option = document.createElement("option");
                    option.value = distrito.nombre;
                    // Guardar properties en dataset para facil acceso
                    option.dataset.precio = distrito.precio;
                    option.dataset.zona = distrito.zona;
                    option.textContent = distrito.nombre;
                    distSelect.appendChild(option);
                });
            } else {
                distSelect.disabled = true;
                updateShippingPrices(0); // Reset
            }
        });

        distSelect.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            if(selectedOption.value) {
                const precio = parseFloat(selectedOption.dataset.precio);
                const zona = selectedOption.dataset.zona;
                updateShippingPrices(precio, zona);
            } else {
                updateShippingPrices(0);
            }
        });

        function updateShippingPrices(precioEnvio, zonaStr = null) {
            calcShippingInput.value = precioEnvio;
            summaryShipping.textContent = precioEnvio.toFixed(2);
            
            const cartTotal = parseFloat(rawTotalInput.value);
            const total = cartTotal + precioEnvio;
            summaryTotal.textContent = total.toFixed(2);

            if(precioEnvio > 0) {
                shippingZoneText.textContent = "(Zona " + zonaStr + " - Lambayeque)";
            } else {
                shippingZoneText.textContent = "(Seleccione destino)";
            }
        }

        // 4. Formateo y Validaciones en vivo

        // Formateo de Tarjeta
        const ccNumber = document.getElementById("cc_number");
        if(ccNumber) {
            ccNumber.addEventListener("input", function (e) {
                let v = this.value.replace(/\D/g, ''); // Deja solo los dígitos
                let result = '';
                for (let i = 0; i < v.length; i++) {
                    if (i > 0 && i % 4 === 0) result += ' ';
                    result += v[i];
                }
                this.value = result;
            });
        }

        const ccExpiry = document.getElementById("cc_expiry");
        if(ccExpiry) {
            ccExpiry.addEventListener("input", function (e) {
                let v = this.value.replace(/\D/g, ''); // Deja solo los dígitos
                if (v.length >= 2) {
                    this.value = v.substring(0, 2) + '/' + v.substring(2, 4);
                } else {
                    this.value = v;
                }
            });
        }

        const ccCvv = document.getElementById("cc_cvv");
        if(ccCvv) {
            ccCvv.addEventListener("input", function () {
                this.value = this.value.replace(/\D/g, ''); // Solo números en CVV
            });
        }

        // Validación de Facturación (RUC y Razón Social)
        const form = document.getElementById("checkout-form");
        const rucError = document.getElementById("ruc-error");
        const rsError = document.getElementById("rs-error");

        // Al cambiar inputs limpiamos errores visuales previamente marcados
        rucInput.addEventListener("input", function() {
            this.value = this.value.replace(/\D/g, ""); // Borra cualquier letra/carácter especial en vivo
            this.classList.remove("is-invalid");
            rucError.textContent = "";
        });

        rnInput.addEventListener("input", function() {
            this.classList.remove("is-invalid");
            rsError.textContent = "";
        });

        form.addEventListener("submit", function(e) {
            if(voucherFactura.checked) {
                let isValid = true;
                const rucVal = rucInput.value.trim();
                const rsVal = rnInput.value.trim();
                
                // Validación del RUC (solo números ya filtrados arriba, 11 dígitos y debe empezar por 10 o 20)
                if(rucVal.length !== 11) {
                    rucInput.classList.add("is-invalid");
                    rucError.textContent = "El RUC debe tener exactamente 11 dígitos.";
                    isValid = false;
                } else if (!rucVal.startsWith("10") && !rucVal.startsWith("20")) {
                    rucInput.classList.add("is-invalid");
                    rucError.textContent = "El RUC debe iniciar con '10' o '20'.";
                    isValid = false;
                }

                // Validación Razón Social (No iniciar con números)
                if(rsVal !== "" && /^[0-9]/.test(rsVal)) {
                    rnInput.classList.add("is-invalid");
                    rsError.textContent = "La Razón Social no puede iniciar con un número.";
                    isValid = false;
                }

                if(!isValid) {
                    e.preventDefault(); // Detener el envío del formulario
                    setTimeout(() => {
                        rucInput.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }, 100);
                }
            }
        });

    });
</script>
@endsection