@extends('layouts.dashboard')
@section('title', 'Tambah Produk')
@section('script')
<script src="{{URL::to('ckeditor/ckeditor.js')}}"></script>
@endsection
@section('navigation')

<h1>
Tambah Produk
</h1>
<ol class="breadcrumb">
  <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
  <li class="active">Tambah Produk</li>
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
  <form method="post" action="{{ route('product.add') }}" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="box-body">
      <div class="form-group">
        <label for="judul">Judul Produk</label>
        <input class="form-control" id="title" type="text" name="title">
      </div>
      <div class="form-group">
        <label for="desk">Deskripsi</label>
        <textarea class="form-control ckeditor" name="desk" id="editor"></textarea>
      </div>
      <div class="form-group">
        <label for="foto">Icon</label>
        <input id="foto" type="file" name="icon">
        <p class="help-block">Resolusi Icon 64px*64px</p>
      </div>
      <div class="form-group">
        <label for="foto">Foto Brosur</label>
        <input id="foto" type="file" name="content">
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