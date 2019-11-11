<!DOCTYPE html>
<html lang="en">
<head>
	<title>listado de usuarios curso_laravel 5.5</title>
</head>
<body>
	<h1>
			 <h1> {{ $title }} </h1>

			 <hr>
			 @unless(empty($users))
		<ul>
			@foreach ($users as $user)

				<li>
					{{$user}}
				</li>
			 @endforeach

		</ul>
		@else
		<p>No hay usuarios registrados</p>
		@endif


</body>
</html>