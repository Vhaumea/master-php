<?php if(isset($fruta) && is_object($fruta)): ?>
	<h1>Editar fruta</h1>
<?php else: ?>
	<h1>Crear una fruta</h1>
<?php endif; ?>

<form action="<?php echo e(isset($fruta) ? action('FrutaController@update') : action('FrutaController@save')); ?>" method="POST">
	<?php echo e(csrf_field()); ?>

	
	<?php if(isset($fruta) && is_object($fruta)): ?>
		<input type="hidden" name="id" value="<?php echo e($fruta->id); ?>"/>
	<?php endif; ?>
	
	<label for="nombre">Nombre</label>
	<input type="text" name="nombre" value="<?php echo e(isset($fruta->nombre) ? $fruta->nombre : ''); ?>"/><br/>
	
	<label for="descripcion">Descripción</label>
	<input type="text" name="descripcion" value="<?php echo e(isset($fruta->descripcion) ? $fruta->descripcion : ''); ?>"/><br/>
	
	<label for="precio">Precio</label>
	<input type="number" name="precio" value="<?php echo e(isset($fruta->precio) ? $fruta->precio : 0); ?>"/><br/>
	
	<input type="submit" value="Guardar" />
</form>