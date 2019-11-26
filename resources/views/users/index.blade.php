
@extends('layout')

@section('title','Ususarios')

@section('content')

<h1> {{ $title }} </h1>
<p>
	<a href=" {{ route('users.create') }} " class="btn btn-success" >nuevo usuario</a>
</p>
@if ($users->isNotEmpty)
	

<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
@else
<p>
	No hay usuarios registrados
</p>
@endif
<ul>
	@forelse ($users as $user)
		<li> {{ $user->name }} ({{ $user->email }}) 
			<a style="margin-left: 150px" href=" {{ route('users.show',$user->id) }}" class=" btn btn-primary">ver detalles</a>
			<a  href=" {{ route('users.edit',$user->id) }}" class=" btn btn-primary">editar usuario</a>
			<form action=" {{ route('users.destroy',$user->id) }} " method="post">
				{{ method_field('DELETE') }}
		{{ csrf_field()}}

			<button type="submit" class="btn btn-danger">eliminar</button>
				
			</form>
		</li>
		@empty
		<li>No hay usuarios registrados.</li>
	@endforelse
</ul>
@endsection
 @section('sidebar')
 @parent
 	<h2>Barra lateral personalizada !</h2>
 {{-- @endsection --}}
@endsection
