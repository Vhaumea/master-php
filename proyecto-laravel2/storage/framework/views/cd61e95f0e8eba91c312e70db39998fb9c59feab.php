<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

			<div class="card">
				<div class="card-header">Subir nueva imagen</div>


				<div class="card-body">

					<form method="POST" action="<?php echo e(route('image.save')); ?>" enctype="multipart/form-data">
						<?php echo csrf_field(); ?>

						<div class="form-group row">
							<label for="image_path" class="col-md-3 col-form-label text-md-right">Imagen</label>
							<div class="col-md-7">
								<input id="image_path" type="file" name="image_path" class="form-control <?php echo e($errors->has('image_path') ? 'is-invalid' : ''); ?>" required/>

								<?php if($errors->has('image_path')): ?>
								<span class="invalid-feedback" role="alert">
									<strong><?php echo e($errors->first('image_path')); ?></strong>
								</span>
								<?php endif; ?>
							</div>
						</div>

						<div class="form-group row">
							<label for="description" class="col-md-3 col-form-label text-md-right">Descripción</label>
							<div class="col-md-7">
								<textarea id="description" name="description" class="form-control <?php echo e($errors->has('description') ? 'is-invalid' : ''); ?>" required></textarea>

								<?php if($errors->has('description')): ?>
								<span class="invalid-feedback" role="alert">
									<strong><?php echo e($errors->first('description')); ?></strong>
								</span>
								<?php endif; ?>
							</div>
						</div>

						<div class="form-group row">
							
							<div class="col-md-6 offset-md-3">
								<input type="submit" class="btn btn-primary" value="Subir imagen">
							</div>
						</div>


					</form>

				</div>
			</div>

        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>