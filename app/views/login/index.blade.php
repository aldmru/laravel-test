<html>
	<head>
	</head>

	<body>

			<?= Form::open(array('action' => 'LoginController@index')) ?> <br>

				<?= Form::text('values[email]', (isset($values['email']))?$values['email']:'' , array('placeholder' => 'Email')) ?> <br>
				<?= ($errors->has('email'))?$errors->first('email'):''?><br>

				<?= Form::password('values[password]', '' , array('placeholder' => 'Contraseña')) ?> <br>
				<?= ($errors->has('password'))?$errors->first('password'):''?><br>

				<?= Form::submit('Enviar');?>

		<?=  Form::close() ?>

	</body>

</html>
