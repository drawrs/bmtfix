<?php $__env->startSection('title', 'Struktur Organisasi'); ?>

<?php $__env->startSection('maincontent'); ?>
<!-- about-page -->
<div class="about-page">
    <div class="container">
        <div class="about-bor">
            <div class="about-info">
                <div class="row">
                    <h3><?php echo e($struk->title); ?></h3>
                <p><?php echo $struk->desk; ?></p>
                </div>
            </div>
            

        </div>
    </div>
</div>
<!-- //about-page -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>