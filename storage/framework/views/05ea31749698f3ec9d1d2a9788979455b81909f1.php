<?php $__env->startSection('title', 'Kantor'); ?>
<?php $__env->startSection('maincontent'); ?>
<!-- about-page -->
<div class="kantor-page">
    <div class="container">
        <div class="kantor-bor">
            <div class="about-info kantor">
                <div class="container">
                    <h3>Kantor</h3>
                    <div class="image sejarah" style="text-align:center">
                    </div>
                    <div class="col-lg-10">
                        <div class="row">
                            <table class="table table-bordered" align="center">
                                <tr>
                                    <th width="10">No</th>
                                    <th width="210">Foto</th>
                                    <th>Info</th>
                                </tr>
                                <?php foreach($kantors as $kantor): ?>
                                <tr>
                                    <td>#</td>
                                    <td>
                                        <a href="<?php echo e(URL::to($path.''.$kantor->image)); ?>"><img src="<?php echo e(URL::to($path.''.$kantor->image)); ?>" alt="..." class="thumbnail" width="200"></a>
                                    </td>
                                    <td>
                                    <h4><?php echo e($kantor->name); ?></h4>
                                    <p><?php echo $kantor->desk; ?></p>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                
                            </table>
                            <?php echo e($kantors->links()); ?>

                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
<!-- //about-page -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>