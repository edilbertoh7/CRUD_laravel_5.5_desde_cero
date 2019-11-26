@extends('layout')
@section('content')
	<style type="text/css"></style>
	<h1> crear usuario</h1>
	
	@if ($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{$error}}</li>
			
			@endforeach
		</ul>
		
	</div>
	@endif

	<form method="POST" action="{{ url('/usuarios') }}">
		{{ csrf_field()}}
		<div style="margin-left: 40px">
		<label for="name">Nombre</label>
		<input type="text" name="name" value=" {{ old('name') }} " >
		<label for="email">Correo electronico</label>
		<input type="email" name="email" class=" form-control" value=" {{ old('email') }} " >
		<label for="password">Contraseña</label>
		<input type="password" name="password" >
		
		<button type="submit"  class="btn btn-primary">crear usuario</button>
		<a href="  {{ route('users') }}  " class="btn btn-success">regresar</a>
		</div>
	</form>
@endsection