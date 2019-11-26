@extends('layout')
@section('content')

	<h1> {{ $title }} </h1>
	@forelse ($users as $user)
	
		<ul>
			<li>
				{{ $user->id }} {{ $user->name }}
			</li>
		</ul>
	    
	@empty
	<h1>no hay registros</h1>
	@endforelse
@endsection