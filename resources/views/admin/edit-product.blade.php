@extends('layouts.dashboard')
@section('title', 'Edit Produk')
@section('script')
<script src="{{URL::to('ckeditor/ckeditor.js')}}"></script>
@endsection
@section('navigation')

<h1>
Edit Produk
</h1>
<ol class="breadcrumb">
  <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
  <li class="active">Edit Produk</li>
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
  <form method="post" action="{{ route('product.edit') }}" enctype="multipart/form-data">
    {{csrf_field()}}
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    <div class="box-body">
      <div class="form-group">
        <label for="judul">Judul Produk</label>
        <input class="form-control" id="title" type="text" name="title" value="{{ $product->title }}">
      </div>
      <div class="form-group">
        <label for="desk">Deskripsi</label>
        <textarea class="form-control ckeditor" name="desk" id="editor">{!! $product->desk !!}</textarea>
      </div>
      <div class="form-group">
        <label for="foto">Icon</label>
        <div class="row">
          <div class="col-xs-6 col-md-3">
              <a href="#" class="thumbnail">
                <img src="{{ URL::to($iconPath . '' .$product->icon) }}" alt="{{$product->icon}}">
              </a>
            </div>
        </div>
        <input id="foto" type="file" name="icon">
        <p class="help-block">Resolusi Icon 60px*60px</p>
      </div>
      <div class="form-group">
        <label for="foto">Foto Brosur</label>
        <div class="row">
            <div class="col-xs-6 col-md-3">
              <a href="#" class="thumbnail">
                <img src="{{ Image::url(URL::to($brosurPath . '' .$product->content), 171,180,array('crop'))}}" alt="{{$product->content}}">
              </a>
            </div>
          </div>
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