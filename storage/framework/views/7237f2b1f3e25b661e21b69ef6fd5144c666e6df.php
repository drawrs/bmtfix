<?php $__env->startSection('title', 'Home'); ?>
<?php $__env->startSection('maincontent'); ?>
<!-- banner -->
<?php echo $__env->make('includes.slider', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- //banner -->
<div class="bann-bot">
    <div class="container">
        <div class="banner-info-second">
            <div class="row bann-col">
                <div class="col-md-4">
                    <h2 class="p1">Berita dan Informasi</h2><hr />
                    <?php if($newest->isEmpty()): ?>
                    <div class="alert alert-warning" role="alert">Belum ada berita dengan Tag ini</div>
                    <?php endif; ?>
                    <?php foreach($newest as $news): ?>
                        <div class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object" src="<?php echo e(Image::url(URL::to(''. $path . ''. $news->image.''),64,64,array('crop'))); ?>" width="64px" height="64px" alt="<?php echo e($news->title); ?>">
                                </a>
                            </div>
                            <div class="media-body">
                                <b class="media-heading" style="text-align:justify"><?php echo e(str_limit($news->title, '60')); ?></b>
                                <p style="text-align:justify">
                                    <?php echo str_limit(strip_tags($news->content, '110')); ?> <a href="<?php echo e(route('view.news', ['tag' => str_slug($news->tag->name), 'slug' => str_slug($news->title)])); ?>">Lanjut..</a>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <?php echo $newest->links(); ?>

                </div>
                <div class="col-md-4">
                    
                    <h2 class="p1"><?php echo e($ads->title); ?></h2>
                    <hr>
                    <?php echo $ads->content; ?>

                </div>
                <div class="col-md-4">
                    <h2 class="p1"><?php echo e($klog->title); ?></h2>
                    <hr>
                    <p><?php echo $klog->content; ?></p>
                </div>
                
            </div>
        </div>
        
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>