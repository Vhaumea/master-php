<?php if(Auth::user()->image): ?>
	<div class="container-avatar">
		<img src="<?php echo e(route('user.avatar',['filename'=>Auth::user()->image])); ?>" class="avatar" />
	</div>
<?php endif; ?>
