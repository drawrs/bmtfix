<?php $__env->startSection('title', 'Produk Layanan'); ?>
<?php $__env->startSection('style'); ?>
<link href="<?php echo e(URL::to('css/modal.min.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
<!-- product-page -->
<div class="services-page">
    <div class="container">
        <div class="services-bor">
            <div class="ser-info">
                <h3>Produk dan Layanan</h3>
                <p>Berikut adalah produk dan layanan pada BMT AL-ISHLAH.</p>
            </div>
            <div class="services-section-grids">
                <?php foreach($products as $product): ?>
                <div class="col-md-4 services-section-grid"  data-toggle="modal" data-target="#modal-<?php echo e($product->id); ?>">
                    <div class="services-section-grid-head">
                        <div class="service-icon">
                            <i class="event" style="background: url('<?php echo e($iconPath.''.$product->icon); ?>') no-repeat 0px 0px"></i>
                        </div>
                        <div class="service-icon-heading">
                            <h4><?php echo e($product->title); ?></h4>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <p style="text-align:justify;"><?php echo $product->desk; ?></p>
                </div>
                
                <?php endforeach; ?>
                <div class="clearfix"></div>
            </div>
            
        </div>
    </div>
</div>
<!-- //Product-page -->
<?php foreach($products as $product ): ?>
<!-- Modal -->
<div class="modal fade" id="modal-<?php echo e($product->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo e($product->title); ?></h4>
            </div>
            <div class="modal-body">
                <a href="<?php echo e(URL::to($brosurPath.''.$product->content)); ?>" target="blank"><img src="<?php echo e(URL::to($brosurPath.''.$product->content)); ?>" width="100%" alt=""></a>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('bottom-script'); ?>
<link href="<?php echo e(URL::to('js/modal.min.js')); ?>" rel="stylesheet">
<script>
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>