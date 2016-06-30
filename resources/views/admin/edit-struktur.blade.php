@extends('layouts.dashboard')
@section('title', 'Edit Struktur')
@section('script')
<script src="{{URL::to('ckeditor/ckeditor.js')}}"></script>
@endsection
@section('navigation')

<h1>
Edit Struktur
</h1>
<ol class="breadcrumb">
  <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
  <li class="active">Edit Struktur</li>
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
  <form method="post" action="{{ route('struktur.edit') }}" enctype="multipart/form-data">
    {{csrf_field()}}
    <input type="hidden" name="id" value="{{ $struk->id }}">
    <div class="box-body">
      <div class="form-group">
        <label for="judul">Judul</label>
        <input class="form-control" id="title" type="text" name="title" value="{{ $struk->title }}">
      </div>
      <div class="form-group">
        <label for="desk">Deskripsi</label>
        <textarea class="form-control ckeditor" name="desk" id="editor">{!! $struk->desk !!}</textarea>
      </div>
      <div class="form-group">
        <label for="foto">Gambar</label>
        <div class="row">
            <div class="col-xs-6 col-md-3">
              <a href="{{ URL::to($imagePath . '' .$struk->image) }}" class="thumbnail">
                <img src="{{ Image::url(URL::to($imagePath . '' .$struk->image), 171,180,array('crop'))}}" alt="{{$struk->title}}">
              </a>
            </div>
          </div>
        <input type="file" name="image">
        <p class="help-block">Maksimal Ukuran foto 3 MB</p>
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
@endsection
@section('bottom-script')
<script type="text/javascript">
  CKEDITOR.editorConfig = function( config ) {
    config.height = 200;
};
</script>
@endsection