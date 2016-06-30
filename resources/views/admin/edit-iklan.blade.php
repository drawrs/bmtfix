@extends('layouts.dashboard')
@section('title', 'Edit Iklan')
@section('script')
<script src="{{URL::to('ckeditor/ckeditor.js')}}"></script>
@endsection
@section('navigation')
<h1>
Edit Iklan
</h1>
<ol class="breadcrumb">
  <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
  <li class="active">Edit Iklan</li>
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
    <form method="post" action="{{ route('iklan.edit')}}" enctype="multipart/form-data">
      {{csrf_field()}}
      <input type="hidden" name="id" value="{{ $ads->id }}">
      <div class="box-body">
        <div class="form-group">
          <label for="judul">Judul Produk</label>
          <input class="form-control" id="title" type="text" name="title" value="{{ $ads->title }}">
        </div>
        <div class="form-group">
          <label for="desk">Isi Iklan</label>
          <textarea class="form-control ckeditor" name="content" id="editor">{!! $ads->content !!}</textarea>
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