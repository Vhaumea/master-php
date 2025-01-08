<h1>Listado de frutas</h1>
<h3><a href="<?php echo e(action('FrutaController@create')); ?>"> Crear fruta</a></h3>

<?php if(session('status')): ?>
<p style="background: green; color:white;">
	<?php echo e(session('status')); ?>

</p>
<?php endif; ?>

<ul>
	<?php $__currentLoopData = $frutas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fruta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<li>
			<a href="<?php echo e(action('FrutaController@detail', ['id' => $fruta->id])); ?>">
				<?php echo e($fruta->nombre); ?>

			</a>
		</li>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>