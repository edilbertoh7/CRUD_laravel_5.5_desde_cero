

@extends('layout')

@section('title',"usuario {$user->id}")
@section('content')
	
<h1> usuario #{{ $user->id }}</h1>
<p>
	
mostrando detalles de usuario{{ $user->id }}
</p>
<p>
	
el nombre del usuario es {{ $user->name }}
</p>
<p> correo electronico {{ $user->email }} </p>
<br>
<button><a href=" {{ route('users') }} ">regresar</a></button>
@endsection
