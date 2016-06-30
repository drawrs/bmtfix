<?php $__env->startSection('title', 'Edit Berita'); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::to('ckeditor/ckeditor.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('navigation'); ?>
<h1>
Edit Berita
</h1>
<ol class="breadcrumb">
  <li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
  <li class="active">Edit Berita</li>
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
    <form method="post" action="<?php echo e(route('news.edit')); ?>" enctype="multipart/form-data">
      <?php echo e(csrf_field()); ?>

      <input type="hidden" name="news_id" value="<?php echo e($news->id); ?>">
      <div class="box-body">
        <div class="form-group">
          <label for="judul">Judul Berita</label>
          <input class="form-control" id="tag" type="text" name="title" value="<?php echo e($news->title); ?>">
        </div>
        <div class="form-group">
          <label for="tag">Tag</label>
          <select class="form-control" name="tag">
            <?php foreach($tags as $tag): ?>
            <option value="<?php echo e($tag->id); ?>" <?php if($news->tag_id == $tag->id ): ?> ? SELECTED :  ; <?php endif; ?> ><?php echo e($tag->name); ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group">
          <textarea class="form-control ckeditor" name="content" id="editor"><?php echo $news->content; ?></textarea>
        </div>
        <div class="form-group">
          <label for="foto">Foto</label>
          <div class="row">
            <div class="col-xs-6 col-md-3">
              <a href="#" class="thumbnail">
                <img src="<?php echo e(Image::url(URL::to($path . '' .$news->image), 171,180,array('crop'))); ?>" alt="<?php echo e($news->title); ?>">
              </a>
            </div>
          </div>
          <input id="foto" type="file" name="image">
          <p class="help-block">Maksimal Ukuran foto 3 MB.</p>
        </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form>
  </div>
  <!-- /.box-body -->
  <div class="box-footer">
    Keep Calm
  </div>
  <!-- /.box-footer-->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>