<?php $__env->startSection('title', 'Daftar Kantor'); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::to('dist/sweetalert.min.js')); ?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo e(URL::to('dist/sweetalert.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('navigation'); ?>
<h1>
Daftar Kantor
</h1>
<ol class="breadcrumb">
  <li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
  <li class="active">Daftar Kantor</li>
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
              <button class="btn btn-default" data-toggle="modal" data-target="#modal-add"><i class="fa fa-plus"></i>&nbsp;Tambah Kantor</button>
            </div>
          </div>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover"><br>
          <tr>
            <th>NO</th>
            <th width="200px">Foto Kantor</th>
            <th>Desk</th>
            <th width="200px">Aksi</th>
          </tr>
          <?php foreach($kantors as $kantor): ?>
          <tr>
            <td><?php echo e($no++); ?></td>
            <td>
              <img src="<?php echo e(URL::to($path . '' . $kantor->image)); ?>" alt="" width="200">
            </td>
            <td>
            <b><?php echo e($kantor->name); ?></b>
            <br>
            <?php echo $kantor->desk; ?>

            </td>
            <td><a href="<?php echo e(route('dashboard.form_edit_kantor', ['id' => $kantor->id ])); ?>" class="btn btn-success"><i class="fa fa-edit"></i>  Edit</a>
          <button type="button" class="btn btn-danger hapus-produk" onclick="hapus_produk(<?php echo e($kantor->id); ?>)"><i class="fa fa-trash"></i> Hapus</button></td>
        </tr>
        <?php endforeach; ?>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">×</span></button>
      <h4 class="modal-title">Tambah Kantor</h4>
    </div>
    <div class="modal-body">
      <form role="form" enctype="multipart/form-data" method="post" action="<?php echo e(route('kantor.add')); ?>">
      <?php echo e(csrf_field()); ?>

        <div class="box-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Nama Kantor</label>
            <input class="form-control" name="name" type="text">
          </div>
          <div class="form-group">
            <textarea name="desk" rows="4" class="form-control" placeholder="Info Kantor"></textarea>
          </div>
          <div class="form-group">
            <label for="exampleInputFile">Foto Kantor</label>
            <input id="exampleInputFile" type="file" name="image">
          </div>
        </div>
      
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
      <button type="submit" class="btn btn-primary">Simpan</button></form>
    </div>
  </div>
  <!-- /.modal-content -->
</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('bottom-script'); ?>
<script>
function hapus_produk(id){
window.kantorID = id;
swal({
title: "Hapus Kantor Ini ?",
text: "Data Kantor yang sudah dihapus tidak dapat di kembalikan!",
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
url : "<?php echo e(route('kantor.del')); ?>",
data : { kantor_id : window.kantorID, _token : "<?php echo e(csrf_token()); ?>"},
success: function(msg) {
if (msg == '0') {
swal("Data tidak ditemukan!", "Data tidak ditemukan! Silahkan refresh halaman.", "error");
} else if (msg == '1') {
swal("Berhasil!", "Data telah dihapus.", "success");
} else {
swal("Gagal!", "Terjadi kesalahan, silahkan hubungi Admin atau Webmaster.", "error");
}
location.reload();
}
});
}, 2000);
});
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>