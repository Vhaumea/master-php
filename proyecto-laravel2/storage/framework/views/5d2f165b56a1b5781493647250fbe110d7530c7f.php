<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
			<?php echo $__env->make('includes.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

			<div class="card pub_image pub_image_detail">
				<div class="card-header">

					<?php if($image->user->image): ?>
					<div class="container-avatar">
						<img src="<?php echo e(route('user.avatar',['filename'=>$image->user->image])); ?>" class="avatar" />
					</div>
					<?php endif; ?>

					<div class="data-user">
						<?php echo e($image->user->name.' '.$image->user->surname); ?>

						<span class="nickname">
							<?php echo e(' | @'.$image->user->nick); ?>

						</span>
					</div>
				</div>

				<div class="card-body">
					<div class="image-container image-detail">
						<img src="<?php echo e(route('image.file',['filename' => $image->image_path])); ?>" />
					</div>

					<div class="description">
						<span class="nickname"><?php echo e('@'.$image->user->nick); ?> </span>
						<span class="nickname date"><?php echo e(' | '.\FormatTime::LongTimeFilter($image->created_at)); ?></span>
						<p><?php echo e($image->description); ?></p>
					</div>

					<div class="likes">

						<!-- Comprobar si el usuario le dio like a la imagen -->
						<?php $user_like = false; ?>
						<?php $__currentLoopData = $image->likes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $like): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if($like->user->id == Auth::user()->id): ?>
						<?php $user_like = true; ?>
						<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

						<?php if($user_like): ?>
						<img src="<?php echo e(asset('img/heart-red.png')); ?>" data-id="<?php echo e($image->id); ?>" class="btn-dislike"/>
						<?php else: ?>
						<img src="<?php echo e(asset('img/heart-black.png')); ?>" data-id="<?php echo e($image->id); ?>" class="btn-like"/>
						<?php endif; ?>

						<span class="number_likes"><?php echo e(count($image->likes)); ?></span>
					</div>

					<?php if(Auth::user() && Auth::user()->id == $image->user->id): ?>
					<div class="actions">
						<a href="<?php echo e(route('image.edit', ['id' => $image->id])); ?>" class="btn btn-sm btn-primary">Actualizar</a>
						<!--<a href="<?php echo e(route('image.delete', ['id' => $image->id])); ?>" class="btn btn-sm btn-danger">Borrar</a>-->

						<!-- Button to Open the Modal -->
						<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal">
							Eliminar
						</button>

						<!-- The Modal -->
						<div class="modal" id="myModal">
							<div class="modal-dialog">
								<div class="modal-content">

									<!-- Modal Header -->
									<div class="modal-header">
										<h4 class="modal-title">¿Estas seguro?</h4>
										<button type="button" class="close" data-dismiss="modal">&times;</button>
									</div>

									<!-- Modal body -->
									<div class="modal-body">
										Si eliminar esta imagen nunca podrás recuperarla, ¿estas seguro de querer borrarla?
									</div>

									<!-- Modal footer -->
									<div class="modal-footer">
										<button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
										<a href="<?php echo e(route('image.delete', ['id' => $image->id])); ?>" class="btn btn-danger">Borrar definitivamente</a>
									</div>

								</div>
							</div>
						</div>
					</div>
					<?php endif; ?>

					<div class="clearfix"></div>
					<div class="comments">

						<h2>Comentarios (<?php echo e(count($image->comments)); ?>)</h2>
						<hr>

						<form method="POST" action="<?php echo e(route('comment.save')); ?>">
							<?php echo csrf_field(); ?>

							<input type="hidden" name="image_id" value="<?php echo e($image->id); ?>" />
							<p>
								<textarea class="form-control <?php echo e($errors->has('content') ? 'is-invalid' : ''); ?>" name="content"></textarea>
								<?php if($errors->has('content')): ?>
								<span class="invalid-feedback" role="alert">
									<strong><?php echo e($errors->first('content')); ?></strong>
								</span>
								<?php endif; ?>
							</p>
							<button type="submit" class="btn btn-success">
								Enviar
							</button>
						</form>

						<hr>

						<?php $__currentLoopData = $image->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="comment">

							<span class="nickname"><?php echo e('@'.$comment->user->nick); ?> </span>
							<span class="nickname date"><?php echo e(' | '.\FormatTime::LongTimeFilter($comment->created_at)); ?></span>
							<p><?php echo e($comment->content); ?><br/>

								<?php if(Auth::check() && ($comment->user_id == Auth::user()->id || $comment->image->user_id == Auth::user()->id)): ?>
								<a href="<?php echo e(route('comment.delete', ['id' => $comment->id])); ?>" class="btn btn-sm btn-danger">
									Eliminar
								</a>
								<?php endif; ?>
							</p>
						</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

					</div>
				</div>
			</div>


        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>