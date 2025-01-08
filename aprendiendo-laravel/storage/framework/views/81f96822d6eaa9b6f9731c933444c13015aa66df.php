<h1><?php echo e($fruta->nombre); ?></h1>
<p>
	<?php echo e($fruta->descripcion); ?>

</p>

<a href="<?php echo e(action('FrutaController@delete', ['id' => $fruta->id])); ?>">Eliminar</a>
<a href="<?php echo e(action('FrutaController@edit', ['id' => $fruta->id])); ?>">Actualizar</a>