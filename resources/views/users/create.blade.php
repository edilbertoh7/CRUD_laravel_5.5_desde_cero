@extends('layout')
@section('content')
	<div class="col-sm-8" >
<div class=" card">
	<h4 class="card-header">crear usuario</h4>
	<div class="card-body">
		@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{$error}}</li>

				@endforeach
			</ul>

		</div>
		@endif
		<div class="form-group">
			<form method="POST" action="{{ url('/usuarios') }}">
				{{ csrf_field()}}
				<div style="margin-left: 40px">
					<div class="col-sm-8" >
						<label for="name">Nombre</label>
						<input type="text" name="name" class=" form-control" value=" {{ old('name') }} " >
						<label for="email">Correo electronico</label>
						<input type="email" name="email" class=" form-control" value=" {{ old('email') }} " >
						<label for="password">Contraseña</label>
						<input type="password" name="password" class=" form-control" >
						<br>

						<button type="submit"  class="btn btn-primary">crear usuario</button>
						<a href="  {{ route('users') }}  " class="btn btn-success">regresar</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	</div>





@endsection