<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('navigation'); ?>
<h1>
Dashboard
<small>it all starts here</small>
</h1>
<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a href="#">Dashboard</a></li>
  <li class="active">Welcome</li>
</ol>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="box">
<div class="box-header with-border">
  <h3 class="box-title">Selamat Datang Admin</h3>
  <div class="box-tools pull-right">
    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
    <i class="fa fa-minus"></i></button>
    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
    <i class="fa fa-times"></i></button>
  </div>
</div>
<div class="box-body">
  Ini adalah halaman Administrator
</div>
<!-- /.box-body -->
<div class="box-footer">
  Keep Calm
</div>
<!-- /.box-footer-->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>