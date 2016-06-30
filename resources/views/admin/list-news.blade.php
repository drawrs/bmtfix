@extends('layouts.dashboard')
@section('title', 'Daftar Berita')
@section('script')
<script src="{{URL::to('dist/sweetalert.min.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{URL::to('dist/sweetalert.css')}}">
@endsection
@section('navigation')

<h1>
Daftar Berita
</h1>
<ol class="breadcrumb">
  <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
  <li class="active">Daftar Berita</li>
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
          @foreach($news as $news)

          <tr>
            <td>{{ $no++ }}</td>
            <td><a href="{{route('view.news', ['tag' => str_slug($news->tag->name), 'slug' => str_slug($news->title)])}}">{{ $news->title }}</a></td>
            <td>{{ $news->date }}</td>
            <td><a href="{{ route('dashboard.edit-news', ['id' => $news->id ]) }}" class="btn btn-success"><i class="fa fa-edit"></i>  Edit</a>
            <button type="button" class="btn btn-danger hapus-berita" value="{{$news->id}}"><i class="fa fa-trash"></i> Hapus</button></td>
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
                url : "{{route('news.del')}}",
                data : { news_id : window.newsID, _token : "{{ csrf_token() }}"},
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
@endsection