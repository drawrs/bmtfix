@extends('layouts.dashboard')
@section('title', 'Edit Slide')
@section('script')
<script src="{{URL::to('ckeditor/ckeditor.js')}}"></script>
@endsection
@section('navigation')
<h1>
Edit Slide
</h1>
<ol class="breadcrumb">
  <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
  <li class="active">Edit Slide</li>
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
    <form method="post" action="{{ route('slide.edit')}}" enctype="multipart/form-data">
      {{csrf_field()}}
      <input type="hidden" name="slide_id" value="{{ $slide->id }}">
      <div class="box-body">
        <div class="form-group">
          <label for="judul">Judul Produk</label>
          <input class="form-control" id="title" type="text" name="title" value="{{ $slide->title }}">
        </div>
        <div class="form-group">
          <label for="desk">Deskripsi</label>
          <textarea class="form-control ckeditor" name="desk" id="editor">{!! $slide->desk !!}</textarea>
        </div>
        <div class="form-group">
          <label for="foto">Gambar Slide</label>
          <div class="row">
            <div class="col-xs-6 col-md-3">
              <a href="{{URL::to($imagePath . '' .$slide->content)}}" class="thumbnail">
                <img src="{{ Image::url(URL::to($imagePath . '' .$slide->content), 171,180,array('crop'))}}" alt="{{$slide->title}}">
              </a>
            </div>
          </div>
          <input id="foto" type="file" name="content">
          <p class="help-block">Resolusi gambar untuk slider 960x420.</p>
        </div>
        <div class="form-group">
          <label for="target">Target URL</label>
          <div class="input-group">
            <span class="input-group-addon">http:://</span>
            <input class="form-control" type="text" name="target" value="{{ $slide->target }}">
          </div>
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