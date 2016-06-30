@extends('layouts.dashboard')
@section('title', 'Edit Berita')
@section('script')
<script src="{{URL::to('ckeditor/ckeditor.js')}}"></script>
@endsection
@section('navigation')
<h1>
Edit Berita
</h1>
<ol class="breadcrumb">
  <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
  <li class="active">Edit Berita</li>
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
    <form method="post" action="{{ route('news.edit') }}" enctype="multipart/form-data">
      {{csrf_field()}}
      <input type="hidden" name="news_id" value="{{ $news->id }}">
      <div class="box-body">
        <div class="form-group">
          <label for="judul">Judul Berita</label>
          <input class="form-control" id="tag" type="text" name="title" value="{{ $news->title }}">
        </div>
        <div class="form-group">
          <label for="tag">Tag</label>
          <select class="form-control" name="tag">
            @foreach($tags as $tag)
            <option value="{{ $tag->id }}" @if($news->tag_id == $tag->id ) ? SELECTED :  ; @endif >{{ $tag->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <textarea class="form-control ckeditor" name="content" id="editor">{!! $news->content !!}</textarea>
        </div>
        <div class="form-group">
          <label for="foto">Foto</label>
          <div class="row">
            <div class="col-xs-6 col-md-3">
              <a href="#" class="thumbnail">
                <img src="{{ Image::url(URL::to($path . '' .$news->image), 171,180,array('crop'))}}" alt="{{$news->title}}">
              </a>
            </div>
          </div>
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
    Keep Calm
  </div>
  <!-- /.box-footer-->
</div>
@endsection