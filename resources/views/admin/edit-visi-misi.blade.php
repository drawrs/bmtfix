@extends('layouts.dashboard')
@section('title', 'Edit Visi & Misi')
@section('script')
<script src="{{URL::to('ckeditor/ckeditor.js')}}"></script>
@endsection
@section('navigation')

<h1>
Edit Visi & Misi
</h1>
<ol class="breadcrumb">
  <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
  <li class="active">Edit Visi & Misi</li>
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
  <form method="post" action="{{ route('visi-misi.edit') }}" enctype="multipart/form-data">
    {{csrf_field()}}
    <input type="hidden" name="id" value="{{ $visimisi->id }}">
    <div class="box-body">
      <div class="form-group">
        <label for="judul">Judul</label>
        <input class="form-control" id="title" type="text" name="title" value="{{ $visimisi->title }}">
      </div>
      <div class="form-group">
        <label for="desk">Deskripsi</label>
        <textarea class="form-control ckeditor" name="desk" id="editor">{!! $visimisi->desk !!}</textarea>
      </div>
      <div class="form-group">
        <label for="desk">Visi</label>
        <textarea class="form-control ckeditor" name="visi" id="editor">{!! $visimisi->visi !!}</textarea>
      </div>
      <div class="form-group">
        <label for="desk">Misi</label>
        <textarea class="form-control ckeditor" name="misi" id="editor">{!! $visimisi->misi !!}</textarea>
      </div>
      <div class="form-group">
        <label for="foto">Gambar</label>
        <div class="row">
            <div class="col-xs-6 col-md-3">
              <a href="#" class="thumbnail">
                <img src="{{ Image::url(URL::to($imagePath . '' .$visimisi->image), 171,180,array('crop'))}}" alt="{{$visimisi->title}}">
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