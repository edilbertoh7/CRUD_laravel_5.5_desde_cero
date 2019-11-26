<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="{{ asset('js/jquery-3.4.1.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/bootstrap.js') }}"></script>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap4.css') }}">
</head>
<body>

	<div style="margin-left: 40px">
		@yield('content')
	</div>

</body>
</html>