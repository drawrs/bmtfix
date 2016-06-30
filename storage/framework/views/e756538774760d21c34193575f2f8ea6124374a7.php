<?php if(Session::has('status')): ?>
<div class="alert alert-success">
<?php echo e(Session::get('status')); ?>

</div>
<?php endif; ?>