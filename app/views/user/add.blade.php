<html>
	<head>
	</head>

	<body>
		<h1> AGREGAR </h1>


		<?= Form::open(array('action' => 'UserController@add')) ?> <br>

			<?= Form::text('values[email]', (isset($values['email']))?$values['email']:'' , array('placeholder' => 'Email')) ?> <br>
			<?= ($errors->has('email'))?$errors->first('email'):''?><br>

			<?= Form::text('values[real_name]', (isset($values['real_name']))?$values['real_name']:'' , array('placeholder' => 'Nombre')) ?> <br>
			<?= ($errors->has('real_name'))?$errors->first('real_name'):''?><br>

			<?= Form::password('values[password]', '' , array('placeholder' => 'Contraseña')) ?> <br>
			<?= ($errors->has('password'))?$errors->first('password'):''?><br>

			<?= Form::password('values[repeat_password]', '' , array('placeholder' => 'Repetir Contraseña')) ?> <br>
			<?= ($errors->has('repeat_password'))?$errors->first('repeat_password'):''?><br>

			<?= Form::select('values[level]', array('1' => 'Nivel 1', '2' => 'Nivel 2'), '1'); ?> <br>
			<?= ($errors->has('level'))?$errors->first('level'):''?><br>

			<spam>Activo: </span> <?=  Form::checkbox('values[active]', '1');?> <br>
			<?= ($errors->has('active'))?$errors->first('active'):''?><br>

			<?= Form::submit('Enviar');?>


		<?=  Form::close() ?>

	</body>

</html>
