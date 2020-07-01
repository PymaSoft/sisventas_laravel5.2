@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Cliente: {{ $persona->nombre }}</h3>
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
	{!!Form::model($persona,['method'=>'PATCH','route'=>['ventas.cliente.update',$persona->per_id]])!!}
	{{ Form::token() }}
	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-sx-12">
			<div class="form-group">
				<label for="art_nombre">Nombre</label>
				<input type="text" name="per_nombre" required value="{{ $persona->per_nombre }}" class="form-control">
			</div>	
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-sx-12">
			<div class="form-group">
				<label for="per_direccion">Dirección</label>
				<input type="text" name="per_direccion" value="{{ $persona->per_direccion }}" class="form-control">
			</div>	
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-sx-12">
			<div class="form-group">
				<label>Documento</label>
				<select name="per_tipodoc" class="form-control">
					@if ($persona->per_tipodoc=='CC')
						<option value="CC" selected>CC</option>
						<option value="RUT">RUT</option>
						<option value="PAS">PAS</option>
					@elseif($persona->per_tipodoc=='RUT')
						<option value="CC">CC</option>
						<option value="RUT" selected>RUT</option>
						<option value="PAS">PAS</option>
					@else
						<option value="CC">CC</option>
						<option value="RUT">RUT</option>
						<option value="PAS" selected>PAS</option>
					@endif
				</select>
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-sx-12">
			<div class="form-group">
				<label for="per_numdoc">Número Documento</label>
				<input type="text" name="per_numdoc" value="{{ $persona->per_numdoc }}" class="form-control">
			</div>	
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-sx-12">
			<div class="form-group">
				<label for="per_telefono">Teléfono</label>
				<input type="text" name="per_telefono"  value="{{ $persona->per_telefono }}" class="form-control">
			</div>	
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-sx-12">
			<div class="form-group">
				<label for="per_celular">Celular</label>
				<input type="text" name="per_celular"  value="{{ $persona->per_celular }}" class="form-control">
			</div>	
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-sx-12">
			<div class="form-group">
				<label for="per_email">Email</label>
				<input type="email" name="per_email" value="{{ $persona->per_email }}" class="form-control">
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