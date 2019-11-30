
@extends('layout')

@section('title','Ususarios')

@section('content')
<div style="margin-top: 20px" class="col-sm-9" >
	<div class="d-flex justify-content-between align-items-end mb-4" >
		<h1 class="pb-1"> {{ $title }} </h1>
		<p>
			<a href=" {{ route('users.create') }} " class="btn btn-success" >nuevo usuario</a>
		</p>
	</div>
	@if ($users->isNotEmpty())
	
	<table class="table table-dark">
		<thead>
			<tr>
				<th scope="col">ID</th>
				<th scope="col">Nombre</th>
				<th scope="col">Correo electronico</th>
				<th scope="col">Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($users as $user)
			<tr>
				<th scope="row"> {{ $user->id }} </th>
				<td> {{ $user->name }} </td>
				<td> {{ $user->email }} </td>
				<td>

					<form action=" {{ route('users.destroy',$user->id) }} " method="post">
						{{ method_field('DELETE') }}
						{{ csrf_field()}}
						<a href=" {{ route('users.show',$user->id) }}" class=" btn btn-primary">ver detalles</a>
						<a  href=" {{ route('users.edit',$user->id) }}" class=" btn btn-primary">editar usuario</a>
						<button type="submit" class="btn btn-danger">eliminar</button>

					</form>
				</td>
			</tr>
			@endforeach


		</tbody>
	</table>
	{!!$users->render()!!}
	@else
</div>
<p>
	No hay usuarios registrados
</p>
@endif

@endsection
@section('sidebar')
@parent
<h2>Barra lateral personalizada !</h2>
{{-- @endsection --}}
@endsection
