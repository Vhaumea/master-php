<h1>Formulario en Laravel</h1>
<form action="<?php echo e(action('PeliculaController@recibir')); ?>" method="POST">
	<?php echo e(csrf_field()); ?>

	<label for="nombre">Nombre</label>
	<input type="text" name="nombre" />
	
	<br/>
	<label for="email">Correo</label>
	<input type="email" name="email" />
	<br/>
	
	<input type="submit" value="Enviar" />
</form>