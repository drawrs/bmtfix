<?php $__env->startSection('title', 'Daftar Produk Baitulmaal'); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::to('dist/sweetalert.min.js')); ?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo e(URL::to('dist/sweetalert.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('navigation'); ?>

<h1>
Daftar Produk Baitulmaal
</h1>
<ol class="breadcrumb">
  <li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
  <li class="active">Daftar Produk Baitulmaal</li>
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
            
            <div class="input-group-btn">
              <a href="<?php echo e(route('dashboard.add-baitulmaal')); ?>" class="btn btn-default"><i class="fa fa-plus"></i> Tambah</a>
            </div>
          </div>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover"><br>
          <tr>
            <th>NO</th>
            <th width="200px">Judul</th>
            <th>Desk</th>
            <th width="200px">Aksi</th>
          </tr>
          <?php foreach($baitulmaals as $baitulmaal): ?>

          <tr>
            <td><?php echo e($no++); ?></td>
            <td><?php echo e($baitulmaal->title); ?></td>
            <td><?php echo e(str_limit(strip_tags($baitulmaal->desk, '100'))); ?></td>
            <td><a href="<?php echo e(route('dashboard.edit-baitulmaal', ['id' => $baitulmaal->id ])); ?>" class="btn btn-success"><i class="fa fa-edit"></i>  Edit</a>
            <button type="button" class="btn btn-danger hapus-produk" onclick="hapus_produk(<?php echo e($baitulmaal->id); ?>)"><i class="fa fa-trash"></i> Hapus</button></td>
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
function hapus_produk(id){
  window.baitulmaalID = id;
          swal({
            title: "Hapus Produk Ini ?",
            text: "Produk yang sudah dihapus tidak dapat di kembalikan!",
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
                url : "<?php echo e(route('baitulmaal.del')); ?>",
                data : { baitulmaal_id : window.baitulmaalID, _token : "<?php echo e(csrf_token()); ?>"},
                success: function(msg) {
                    if (msg == '0') {
                      swal("Produk tidak ditemukan!", "Berita tidak ditemukan! Silahkan refresh halaman.", "error");
                    } else if (msg == '1') {
                      swal("Berhasil!", "Produk telah dihapus.", "success");
                    } else {
                      swal("Gagal!", "Terjadi kesalahan, silahkan hubungi Admin atau Webmaster.", "error");
                    }
                     location.reload();
                }
              });
            }, 2000);
          });
}
   $(document).ready(function() {
        $('.hapus-produk').click(function(){
          
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>