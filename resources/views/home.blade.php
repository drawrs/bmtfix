@extends('layouts.master')

@section('title', 'Home')
@section('maincontent')
<!-- banner -->
@include('includes.slider')
<!-- //banner -->
<div class="bann-bot">
    <div class="container">
        <div class="banner-info-second">
            <div class="row bann-col">
                <div class="col-md-4">
                    <h2 class="p1">Berita dan Informasi</h2><hr />
                    @if($newest->isEmpty())
                    <div class="alert alert-warning" role="alert">Belum ada berita dengan Tag ini</div>
                    @endif
                    @foreach($newest as $news)
                        <div class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object" src="{{ Image::url(URL::to(''. $path . ''. $news->image.''),64,64,array('crop'))}}" width="64px" height="64px" alt="{{$news->title}}">
                                </a>
                            </div>
                            <div class="media-body">
                                <b class="media-heading" style="text-align:justify">{{str_limit($news->title, '60')}}</b>
                                <p style="text-align:justify">
                                    {!! str_limit(strip_tags($news->content, '110')) !!} <a href="{{route('view.news', ['tag' => str_slug($news->tag->name), 'slug' => str_slug($news->title)])}}">Lanjut..</a>
                                </p>
                            </div>
                        </div>
                    @endforeach
                    {!! $newest->links() !!}
                </div>
                <div class="col-md-4">
                    
                    <h2 class="p1">{{$ads->title}}</h2>
                    <hr>
                    {!!$ads->content!!}
                </div>
                <div class="col-md-4">
                    <h2 class="p1">{{ $klog->title }}</h2>
                    <hr>
                    <p>{!! $klog->content !!}</p>
                </div>
                
            </div>
        </div>
        
    </div>
</div>
@endsection