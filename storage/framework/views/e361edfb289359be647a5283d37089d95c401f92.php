<?php $__env->startSection('title', 'Sejarah'); ?>

<?php $__env->startSection('maincontent'); ?>
<!-- about-page -->
<div class="about-page">
    <div class="container">
        <div class="about-bor">
            <div class="about-info">
                <h3><?php echo e($sejarah->title); ?></h3>
                <div class="image sejarah" style="text-align:center">
                    <img src="<?php echo e(Image::url(URL::to($imagePath .''. $sejarah->image),600,400,array('crop'))); ?>" alt="">
                </div>
                <p><?php echo $sejarah->desk; ?></p>
            </div>
            

        </div>
    </div>
</div>
<!-- //about-page -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>