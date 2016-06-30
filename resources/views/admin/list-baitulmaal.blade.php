@extends('layouts.dashboard')
@section('title', 'Daftar Produk Baitulmaal')
@section('script')
<script src="{{URL::to('dist/sweetalert.min.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{URL::to('dist/sweetalert.css')}}">
@endsection
@section('navigation')
<h1>
Daftar Produk Baitulmaal
</h1>
<ol class="breadcrumb">
  <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
  <li class="active">Daftar Produk Baitulmaal</li>
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
              <a href="{{route('dashboard.add-baitulmaal')}}" class="btn btn-default"><i class="fa fa-plus"></i> Tambah</a>
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
          @foreach($baitulmaals as $baitulmaal)
          <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $baitulmaal->title }}</td>
            <td>{{ str_limit(strip_tags($baitulmaal->desk, '100')) }}</td>
            <td><a href="{{ route('dashboard.edit-baitulmaal', ['id' => $baitulmaal->id ]) }}" class="btn btn-success"><i class="fa fa-edit"></i>  Edit</a>
          <button type="button" class="btn btn-danger hapus-produk" onclick="hapus_produk({{$baitulmaal->id}})"><i class="fa fa-trash"></i> Hapus</button></td>
        </tr>
        @endforeach
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>
</div>
@endsection
@section('bottom-script')
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
url : "{{route('baitulmaal.del')}}",
data : { baitulmaal_id : window.baitulmaalID, _token : "{{ csrf_token() }}"},
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