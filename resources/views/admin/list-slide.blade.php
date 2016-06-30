@extends('layouts.dashboard')
@section('title', 'Daftar Slide')
@section('script')
<script src="{{URL::to('dist/sweetalert.min.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{URL::to('dist/sweetalert.css')}}">
@endsection
@section('navigation')
<h1>
Daftar Slide
</h1>
<ol class="breadcrumb">
  <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
  <li class="active">Daftar Slide</li>
</ol>
@endsection
@section('content')
<!-- /.row -->
<div class="row">
  <div class="col-xs-10">
    <div class="box">
      <div class="box-header">
        <div class="box-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
            <div class="input-group-btn">
              <button class="btn btn-default" data-toggle="modal" data-target="#modal-add"><i class="fa fa-plus"></i>&nbsp;Tambah Slide</button>
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
          @foreach($slides as $slide)
          <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $slide->title }}</td>
            <td>{{ str_limit(strip_tags($slide->desk, '100')) }}</td>
            <td><a href="{{ route('dashboard.edit-slide', ['id' => $slide->id ]) }}" class="btn btn-success"><i class="fa fa-edit"></i>  Edit</a>
          <button type="button" class="btn btn-danger hapus-produk" onclick="hapus_produk({{$slide->id}})"><i class="fa fa-trash"></i> Hapus</button></td>
        </tr>
        @endforeach
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
      <h4 class="modal-title">Tambah Slide</h4>
    </div>
    <div class="modal-body">
      <form role="form" enctype="multipart/form-data" method="post" action="{{ route('slide.add') }}">
      {{csrf_field()}}
        <div class="box-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Judul Slide</label>
            <input class="form-control" name="title" type="text">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Target URL</label>
            <div class="input-group">
              <span class="input-group-addon">http:://</span>
              <input name="target" class="form-control" type="text" name="target" placeholder="example.com/tag/news.html">
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputFile">Gambar Slide</label>
            <input id="exampleInputFile" type="file" name="content">
            <p class="help-block">Resolusi gambar untuk slider 960x420.</p>
          </div>
          <div class="form-group">
            <textarea name="desk" rows="4" class="form-control" placeholder="Deskripsi Slide"></textarea>
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
@endsection
@section('bottom-script')
<script>
function hapus_produk(id){
window.slideID = id;
swal({
title: "Hapus Slide Ini ?",
text: "Slide yang sudah dihapus tidak dapat di kembalikan!",
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
url : "{{route('slide.del')}}",
data : { slide_id : window.slideID, _token : "{{ csrf_token() }}"},
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
@endsection