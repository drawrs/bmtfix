@extends('layouts.dashboard')
@section('title', 'Tambah Berita
')
@section('script')
<script src="{{URL::to('ckeditor/ckeditor.js')}}"></script>
<script src="{{URL::to('dist/sweetalert.min.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{URL::to('dist/sweetalert.css')}}">
@endsection

@section('navigation')
<h1>
Tambah Berita
</h1>
<ol class="breadcrumb">
  <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
  <li class="active">Tambah Berita</li>
</ol>
@endsection
@section('content')
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
    <form method="post" action="{{ route('news.add') }}" enctype="multipart/form-data">
      {{csrf_field()}}
      <div class="box-body">
        <div class="form-group">
          <label for="judul">Judul Berita</label>
          <input class="form-control" id="tag" type="text" name="title">
        </div>
        <div class="form-group">
          <label for="tag">Tag</label> &nbsp;&nbsp;&nbsp;&nbsp;<a style="cursor:pointer" onclick="tambah_berita()"><strong><u>Tambah tag</u></strong></a> | <a style="cursor:pointer" id="list-tag" data-toggle="modal" data-target=".bs-example-modal-sm"><strong><u>Hapus tag</u></strong></a>
          <select class="form-control" name="tag">
            @foreach($tags as $tag)
            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <textarea class="form-control ckeditor" name="content" id="editor"></textarea>
        </div>
        <div class="form-group">
          <label for="foto">Foto</label>
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
    Footer
  </div>
  <!-- /.box-footer-->
</div>
<!-- Tag Modal -->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="tag-modal">
  <div class="modal-dialog modal-sm">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color:#FFF">&times;</span> <small style="color:#FFF">tutup</small></button>
    </div>
    <div class="modal-content">
      <div class="container">
      <div class="col-sm-3">
        <table class="table">
        <tr>
          <th width="180px">Nama Tag</th>
          <th>Aksi</th>
        </tr>
        @foreach($tags as $tag)
        <tr>
          <td>{{ $tag->name }}</td>
          <td align="right"><a value="{{ $tag->id }}" style="cursor:pointer" onclick="hapus_tag({{ $tag->id }})">Hapus <i class="fa fa-trash"></i></a></td>
        </tr>
        @endforeach
      </table>
      </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('bottom-script')
<script>
function tambah_berita(){
  swal({
            title: "Tambah Tag Baru",
            text: "Ketikan tag baru di bawah ini:",
            type: "input",
            showCancelButton: true,
            closeOnConfirm: false,
            animation: "slide-from-top",
            showLoaderOnConfirm: true,
          },
          function(tag){
            if (tag === false) return false;
            
            if (tag === "") {
              swal.showInputError("Kolom masih kosong!");
              return false
            }
            setTimeout(function(){
              $.ajax({
                type : "POST",
                url : "{{ route('dashboard.add-tag') }}",
                data : { tagName : tag, _token : "{{ csrf_token() }}"},
                success: function(msg){
                    if (msg == '1') {
                      swal({
                        timer: 2000,
                        title : "Disimpan!",
                        text : "Tag baru telah ditambahkan.",
                        type: "success"
                      });
                    } else {
                      swal({
                        timer: 2000,
                        title : "Gagal!",
                        text : "Terjadi kesalahan, silahkan hubungi Admin atau Webmaster.",
                        type: "error"
                      });
                    }
                     location.reload();
                }
              });
            }, 2000);
            /*swal("Nice!", "You wrote: " + inputValue, "success");*/
          });
}
function hapus_tag(id){
          window.tagID = id;
          swal({
            title: "Hapus Tag Ini ?",
            text: "Semua Berita Terkait Juga Akan Terhapus!",
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
                url : "{{route('dashboard.del-tag')}}",
                data : { tag_id : window.tagID, _token : "{{ csrf_token() }}"},
                success: function(msg) {
                    if (msg == '0') {
                      swal("Tag tidak ditemukan!", "Tag tidak ditemukan! Silahkan refresh halaman.", "error");
                    } else if (msg == '1') {
                      swal("Berhasil!", "Tag & Berita Terkait telah dihapus.", "success");
                    } else {
                      swal("Gagal!", "Terjadi kesalahan, silahkan hubungi Admin atau Webmaster.", "error");
                    }
                     location.reload();
                }
              });
            }, 2000);
          });
}
  $(document).ready(function(){
     // Tambah tag
        $('#tambah-tag').on('click', function(){
          
        });
        // Hapus tag
        $('.hapus-tag').click(function(){
          
          
        });
  });
</script>
@endsection