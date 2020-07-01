@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Cliente</h3>
			@if (count($errors) > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
		</div>
	</div>
	{!!Form::open(array('url'=>'ventas/cliente','method'=>'POST','autocomplete'=>'off'))!!}
	{{ Form::token() }}
	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-sx-12">
			<div class="form-group">
				<label for="art_nombre">Nombre</label>
				<input type="text" name="per_nombre" required value="{{ old('per_nombre') }}" class="form-control" placeholder="Nombre...">
			</div>	
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-sx-12">
			<div class="form-group">
				<label for="per_direccion">Dirección</label>
				<input type="text" name="per_direccion" value="{{ old('per_direccion') }}" class="form-control" placeholder="Dirección...">
			</div>	
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-sx-12">
			<div class="form-group">
				<label>Documento</label>
				<select name="per_tipodoc" class="form-control">
						<option value="CC">CC</option>
						<option value="RUT">RUT</option>
						<option value="PAS">PAS</option>
				</select>
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-sx-12">
			<div class="form-group">
				<label for="per_numdoc">Número Documento</label>
				<input type="text" name="per_numdoc" value="{{ old('per_numdoc') }}" class="form-control" placeholder="Número de Documento...">
			</div>	
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-sx-12">
			<div class="form-group">
				<label for="per_telefono">Teléfono</label>
				<input type="text" name="art_stock"  value="{{ old('per_telefono') }}" class="form-control" placeholder="Teléfono...">
			</div>	
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-sx-12">
			<div class="form-group">
				<label for="per_celular">Celular</label>
				<input type="text" name="per_celular"  value="{{ old('per_celular') }}" class="form-control" placeholder="Celular...">
			</div>	
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-sx-12">
			<div class="form-group">
				<label for="per_email">Email</label>
				<input type="email" name="per_email" value="{{ old('per_email') }}" class="form-control" placeholder="Email...">
			</div>	
		</div>
		<div class="col-lg-6">
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
		</div>
	</div>				
	{!!Form::close()!!}
@endsection