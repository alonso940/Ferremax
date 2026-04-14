@extends('admin.template')

@section('title', 'Productos - Editar')

@section('content')
<div class="col-md-12">
	<div class="card">
		<div class="card-body">
			<form method="POST" action="{{ route('products.update', $product) }}" enctype="multipart/form-data">
				@csrf
				@method('PATCH')
				<div class="row">
					<div class="col-md-3">
						<div class="mb-3">
							<label>Nombre</label>
							<input type="text" class="form-control" name="name" value="{{ old('name', $product->name) }}">
							@error('name')
							<div class="text-danger">{{ $message }}</div>
							@enderror
						</div>
					</div>
					<div class="col-md-3">
						<div class="mb-3">
							<label>Código</label>
							<input type="text" class="form-control" name="code" value="{{ old('code', $product->code) }}">
							@error('code')
							<div class="text-danger">{{ $message }}</div>
							@enderror
						</div>
					</div>
					<div class="col-md-3">
						<div class="mb-3">
							<label>Descripción</label>
							<input type="text" class="form-control" name="description" value="{{ old('description', $product->description) }}">
							@error('description')
							<div class="text-danger">{{ $message }}</div>
							@enderror
						</div>
					</div>
					<div class="col-md-3">
						<div class="mb-3">
							<label>Categoría</label>
							<select class="form-select" name="category_id">
								<option value="">Seleccionar</option>
								@foreach($categories as $category)
								<option value="{{ $category->id }}" 
									@if($category->id == old('category_id', $product->category_id)) selected @endif>
									{{ $category->name }}
								</option>
								@endforeach
							</select>
							@error('category_id')
							<div class="text-danger">{{ $message }}</div>
							@enderror
						</div>
					</div>
					<div class="col-md-3">
						<div class="mb-3">
							<label>Marca</label>
							<select class="form-select" name="brand_id">
								<option value="">Seleccionar</option>
								@foreach($brands as $brand)
								<option value="{{ $brand->id }}" 
									@if($brand->id == old('brand_id', $product->brand_id)) selected @endif>
									{{ $brand->name }}
								</option>
								@endforeach
							</select>
							@error('brand_id')
							<div class="text-danger">{{ $message }}</div>
							@enderror
						</div>
					</div>
					<div class="col-md-3">
						<div class="mb-3">
							<label>Precio</label>
							<input type="text" class="form-control" name="price" value="{{ old('price', $product->price) }}">
							@error('price')
							<div class="text-danger">{{ $message }}</div>
							@enderror
						</div>
					</div>
					<div class="col-md-3">
						<div class="mb-3">
							<label>Stock</label>
							<input type="text" class="form-control" name="stock" value="{{ old('stock', $product->stock) }}">
							@error('stock')
							<div class="text-danger">{{ $message }}</div>
							@enderror
						</div>
					</div>
					<div class="col-md-4">
						<div class="mb-3">
							<label>Imagen</label>
							@if($product->image) <a href="{{ asset('storage/'.$product->image) }}" target="_blank">Ver actual</a> @endif
							<input type="file" class="form-control mt-1" name="image" value="{{ old('image') }}">
							@error('image')
							<div class="text-danger">{{ $message }}</div>
							@enderror
						</div>
					</div>
					<div class="col-md-4">
						<div class="mb-3">
							<label>Imagen 2</label>
							@if($product->image2) <a href="{{ asset('storage/'.$product->image2) }}" target="_blank">Ver actual</a> @endif
							<input type="file" class="form-control mt-1" name="image2" value="{{ old('image2') }}">
							@error('image2')
							<div class="text-danger">{{ $message }}</div>
							@enderror
						</div>
					</div>
					<div class="col-md-4">
						<div class="mb-3">
							<label>Imagen 3</label>
							@if($product->image3) <a href="{{ asset('storage/'.$product->image3) }}" target="_blank">Ver actual</a> @endif
							<input type="file" class="form-control mt-1" name="image3" value="{{ old('image3') }}">
							@error('image3')
							<div class="text-danger">{{ $message }}</div>
							@enderror
						</div>
					</div>
				</div>
				<button type="submit" class="btn btn-primary btn-sm">Guardar</button>
			</form>
		</div>
	</div>
</div>
@endsection