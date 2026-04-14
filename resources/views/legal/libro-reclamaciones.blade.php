@extends('template')

@section('title', 'Libro de Reclamaciones')

@section('content')
<!-- Start Hero Section -->
<div class="hero hero-inner" style="padding: 2rem 0 !important;">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-12">
                <div class="intro-excerpt">
                    <h1 style="font-size: 2rem; margin-bottom: 15px;">Libro de Reclamaciones</h1>
                    <p class="mb-4" style="font-size: 1rem;">Conforme a lo establecido en el Código de Protección y Defensa del Consumidor, contamos con un Libro de Reclamaciones a tu disposición.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Hero Section -->

<div class="untree_co-section">
    <div class="container bg-light p-5 rounded shadow-sm text-black">
        <div class="row">
            <div class="col-md-12">
                <div class="dashboard-wrapper user-dashboard">
					<form method="POST" action="{{ route('book_store') }}">
						@csrf
						<div class="row g-4">
							<div class="col-md-12">
								<h3 class="mb-2" style="color: #3b5d50; border-bottom: 2px solid #e9ecef; padding-bottom: 10px;">Datos del consumidor</h3>
							</div>
							<div class="col-md-4">
								<div class="form-group mb-4">
									<label class="mb-1 text-dark fw-bold" style="font-size: 0.95rem;">Nombre</label>
									<input type="text" class="form-control" name="name" style="border-radius: 5px;">
									@error('name')
									<div class="text-danger mt-1" style="font-size: 0.85rem; color: #d9534f !important;">
										{{ $message }}
									</div>
									@enderror
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group mb-4">
									<label class="mb-1 text-dark fw-bold" style="font-size: 0.95rem;">Apellidos</label>
									<input type="text" class="form-control" name="last_name" style="border-radius: 5px;">
									@error('last_name')
									<div class="text-danger mt-1" style="font-size: 0.85rem; color: #d9534f !important;">
										{{ $message }}
									</div>
									@enderror
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group mb-4">
									<label class="mb-1 text-dark fw-bold" style="font-size: 0.95rem;">DNI</label>
									<input type="text" class="form-control" name="document" style="border-radius: 5px;">
									@error('document')
									<div class="text-danger mt-1" style="font-size: 0.85rem; color: #d9534f !important;">
										{{ $message }}
									</div>
									@enderror
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group mb-4">
									<label class="mb-1 text-dark fw-bold" style="font-size: 0.95rem;">Dirección</label>
									<input type="text" class="form-control" name="address" style="border-radius: 5px;">
									@error('address')
									<div class="text-danger mt-1" style="font-size: 0.85rem; color: #d9534f !important;">
										{{ $message }}
									</div>
									@enderror
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group mb-4">
									<label class="mb-1 text-dark fw-bold" style="font-size: 0.95rem;">Teléfono</label>
									<input type="text" class="form-control" name="phone" style="border-radius: 5px;">
									@error('phone')
									<div class="text-danger mt-1" style="font-size: 0.85rem; color: #d9534f !important;">
										{{ $message }}
									</div>
									@enderror
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group mb-4">
									<label class="mb-1 text-dark fw-bold" style="font-size: 0.95rem;">Correo electrónico</label>
									<input type="text" class="form-control" name="email" style="border-radius: 5px;">
									@error('email')
									<div class="text-danger mt-1" style="font-size: 0.85rem; color: #d9534f !important;">
										{{ $message }}
									</div>
									@enderror
								</div>
							</div>

							<div class="col-md-12 mt-3">
								<div class="form-group mb-4 px-3 py-3" style="background-color: #f1f3f5; border-radius: 8px;">
									<label class="mb-3 text-dark fw-bold d-block" style="font-size: 0.95rem;">Tipo de Reclamo</label>
									<div class="form-check form-check-inline mb-2">
										<input class="form-check-input" type="radio" name="claim_type" id="queja" value="Queja" checked style="cursor: pointer;">
										<label class="form-check-label text-dark" for="queja" style="cursor: pointer;"><strong>Queja:</strong> Malestar que no está relacionado directamente con el producto (ej. demora en atención).</label>
									</div>
                                    <br>
									<div class="form-check form-check-inline mt-1">
										<input class="form-check-input" type="radio" name="claim_type" id="reclamo" value="Reclamo" style="cursor: pointer;">
										<label class="form-check-label text-dark" for="reclamo" style="cursor: pointer;"><strong>Reclamo:</strong> Disconformidad directa con el producto o el servicio adquirido.</label>
									</div>
									@error('claim_type')
									<div class="text-danger mt-1" style="font-size: 0.85rem; color: #d9534f !important;">
										{{ $message }}
									</div>
									@enderror
								</div>
							</div>
							
							<div class="col-md-12 mt-5">
								<h3 class="mb-2" style="color: #3b5d50; border-bottom: 2px solid #e9ecef; padding-bottom: 10px;">Bien contratado</h3>
							</div>
							<div class="col-md-4">
								<div class="form-group mb-4">
									<label class="mb-1 text-dark fw-bold" style="font-size: 0.95rem;">Tipo de consumo</label>
									<select class="form-control" name="product_type" style="border-radius: 5px;">
										<option value="">Seleccionar</option>
										<option value="Falla en el producto">Falla en el producto (herramienta defectuosa, oxidada, etc.)</option>
										<option value="Falla en la atención">Falla en la atención (trato inadecuado, información errónea)</option>
										<option value="Otro">Otro</option>
									</select>
									@error('product_type')
									<div class="text-danger mt-1" style="font-size: 0.85rem; color: #d9534f !important;">
										{{ $message }}
									</div>
									@enderror
								</div>
							</div>
							<div class="col-md-12 mt-5">
								<h3 class="mb-3" style="color: #3b5d50; border-bottom: 2px solid #e9ecef; padding-bottom: 10px;">Detalle de la reclamación</h3>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-5">
									<label class="mb-2 text-dark fw-bold" style="font-size: 0.95rem;">Detalle del reclamo</label>
									<textarea class="form-control" name="claim" rows="6" placeholder="Cuéntanos lo que ocurrió..." style="border-radius: 5px;"></textarea>
									@error('claim')
									<div class="text-danger mt-1" style="font-size: 0.85rem; color: #d9534f !important;">
										{{ $message }}
									</div>
									@enderror
								</div>
							</div>
                            <div class="col-md-12 mb-4 mt-1">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="privacy_policy" name="privacy_policy" required style="cursor: pointer;">
                                    <label class="form-check-label text-dark" for="privacy_policy" style="cursor: pointer;">
                                        He leído y acepto la <a href="{{ route('legal.privacy') }}" target="_blank" style="color: #f88f01; text-decoration: none; font-weight: bold;">Política de Privacidad</a> de FerreMax.
                                    </label>
                                </div>
                            </div>
						</div>
						<button type="submit" class="btn w-100 fw-bold py-3 mb-3" style="background-color: #3b5d50; color: #ffffff; border-radius: 5px;">ENVIAR RECLAMACIÓN</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection