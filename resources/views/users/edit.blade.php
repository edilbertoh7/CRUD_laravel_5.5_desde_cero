@extends('layout')
@section('content')
<div style="margin-top: 30px" class="col-sm-8" >
	<div class=" card">
		<h4 class="card-header">editar usuario</h4>
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

			<form method="POST" action="{{ url("/usuarios/{$user->id}") }}">
				{{ method_field('put') }}
				{{ csrf_field()}}
				<div style="margin-left: 40px">
					<div class="col-sm-8">
						<label for="name">Nombre</label>
						<input type="text" name="name" class=" form-control"  value=" {{ old('name',$user->name) }} " >
						<label for="email">Correo electronico</label>
						<input type="email" name="email" class=" form-control" value=" {{ old('email',$user->email) }} " >
						<label for="password">Contraseña</label>
						<input type="password" name="password" class=" form-control"  placeholder="Mayor a 6 caracteres" >
					</div><br>

					<button type="submit"  class="btn btn-primary">Actualizar usuario</button>
					<a href="  {{ route('users') }}  " class="btn btn-success">regresar</a>
				</div>
			</form>
		</div>
	</div>
</div>
</div>
@endsection