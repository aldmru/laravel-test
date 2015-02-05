<html>
	<head>
	</head>

	<body>
		<h1> USUARIOS </h1>

		<h2>Hola: <?=(NULL!=Session::get('user')?Session::get('user')->real_name:'')?></h2>

		<?= link_to_action('LoginController@logout', 'Cerrar Sesi&oacute;n')?> 

		@foreach ($users as $user)

		{{$user->real_name}} - {{$user->email}} //// <?= link_to_action('UserController@edit', 'editar', array('id'=>$user->id), $attributes = array())?> <br> 

		@endforeach

		<?= link_to_action('UserController@add', 'agregar')?> 

	</body>

</html>
