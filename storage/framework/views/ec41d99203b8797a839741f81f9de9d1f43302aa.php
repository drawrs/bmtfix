<?php $__env->startSection('title', 'Daftar Berita'); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::to('dist/sweetalert.min.js')); ?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo e(URL::to('dist/sweetalert.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('navigation'); ?>

<h1>
Daftar Berita
</h1>
<ol class="breadcrumb">
  <li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
  <li class="active">Daftar Berita</li>
</ol>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- /.row -->
<div class="row">
  <div class="col-xs-10">
    <div class="box">
      <div class="box-header">
        <div class="box-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
            <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
            <div class="input-group-btn">
              <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
            </div>
          </div>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover"><br>
          <tr>
            <th>NO</th>
            <th width="400px">Judul</th>
            <th>Tanggal</th>
            <th width="200px">Aksi</th>
          </tr>
          <?php foreach($news as $news): ?>

          <tr>
            <td><?php echo e($no++); ?></td>
            <td><a href="<?php echo e(route('view.news', ['tag' => str_slug($news->tag->name), 'slug' => str_slug($news->title)])); ?>"><?php echo e($news->title); ?></a></td>
            <td><?php echo e($news->date); ?></td>
            <td><a href="<?php echo e(route('dashboard.edit-news', ['id' => $news->id ])); ?>" class="btn btn-success"><i class="fa fa-edit"></i>  Edit</a>
            <button type="button" class="btn btn-danger hapus-berita" value="<?php echo e($news->id); ?>"><i class="fa fa-trash"></i> Hapus</button></td>
          </tr>
          <?php endforeach; ?>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('bottom-script'); ?>
<script>
   $(document).ready(function() {
        $('.hapus-berita').click(function(){
          window.newsID = $.trim($(this).attr("value"));
          swal({
            title: "Hapus Berita Ini ?",
            text: "Berita yang sudah dihapus tidak dapat di kembalikan!",
            type: "warning",
            showCancelButton: true,
            closeOnConfirm: false,
            confirmButtonText: "Hapus",
            cancelButtonText: "Batal",
            confirmButtonColor: "#DD6B55",
            showLoaderOnConfirm: true,
          },
          function(){
            setTimeout(function(){
              $.ajax({
                type : "POST",
                url : "<?php echo e(route('news.del')); ?>",
                data : { news_id : window.newsID, _token : "<?php echo e(csrf_token()); ?>"},
                success: function(msg) {
                    if (msg == '0') {
                      swal("Berita tidak ditemukan!", "Berita tidak ditemukan! Silahkan refresh halaman.", "error");
                    } else if (msg == '1') {
                      swal("Berhasil!", "Berita telah dihapus.", "success");
                    } else {
                      swal("Gagal!", "Terjadi kesalahan, silahkan hubungi Admin atau Webmaster.", "error");
                    }
                     location.reload();
                }
              });
            }, 2000);
          });
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>