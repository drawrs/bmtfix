<?php $__env->startSection('title', 'Visi Dan Misi'); ?>

<?php $__env->startSection('maincontent'); ?>
<!-- about-page -->
<div class="about-page">
    <div class="container">
        <div class="about-bor">
            <div class="about-info">
                <h3><?php echo e($visimisi->title); ?></h3>
                <p><?php echo $visimisi->desk; ?></p>
            </div>
            <div class="about-grids">
                <div class="col-md-5 about-left">
                    <img src="<?php echo e(Image::url(URL::to($imagePath .''. $visimisi->image),400,400,array('crop'))); ?>" alt=""/>
                </div>
                <div class="col-md-7 about-right">
                    <div class="jumbotron about-pad">
                      <h3>Visi</h3>
                      <p><?php echo $visimisi->visi; ?></p>
                        <h3>Misi</h3>
                      <p><?php echo $visimisi->misi; ?>.</p>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>

        </div>
    </div>
</div>
<!-- //about-page -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>