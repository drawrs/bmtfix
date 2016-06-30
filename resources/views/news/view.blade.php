@extends('layouts.master')
@section('title', $news->title)
@section('script')
<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "fa2b4634-bf08-4049-8e3d-45ab93ddcf90", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
@endsection
@section('maincontent')
<div class="news-page">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">Beranda</a></li>
            <li><a href="{{ route('news') }}">Berita</a></li>
            <li class="active"><a href="{{ route('view.tag', ['tag' => $news->tag->slug]) }}">{{$news->tag->name}}</a></li>
            <li>{{ $news->title }}</li>
        </ol>
        <div class="news-bor">
            <div class="col-lg-8">
                <div class="news-post">
                    <h2 class="news-post-title">{{ $news->title }}</h2>
                    <p class="news-post-meta"><span class="glyphicon glyphicon-time" aria-hidden="true"></span> {{ $news->date }} | <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Penulis <a href="#">{{ $news->user->name }}</a>
                </p>
                <img src="{{ Image::url(URL::to($path. '' .$news->image), 800,700,array('crop'))}}" alt="{{ $news->title }}" class="img-thumbnail news-image">
                <p>{!! $news->content !!}</p>
                <br>
                <p> <b>Bagikan Berita : <span class='st_facebook_hcount' displayText='Facebook'></span>
                <span class='st_fblike_hcount' displayText='Facebook Like'></span>
                <span class='st_twitter_hcount' displayText='Tweet'></span>
                <span class='st_linkedin_hcount' displayText='LinkedIn'></span>
                <span class='st_pinterest_hcount' displayText='Pinterest'></span>
                <span class='st_email_hcount' displayText='Email'></span>
            </b></p>
            <br />
            <div class="blog-post other-post">
                <h3 class="other-title">Berita lainnya</h3>
                @foreach($otherPosts as $otherPost)
                <div class="col-sm-4 posts">
                    <div class="caption">
                        <a href="{{route('view.news', ['tag' => str_slug($news->tag->name), 'slug' => str_slug($news->title)])}}"><b>{{str_limit($otherPost->title, '40')}}</b></a>
                        <p>{!! str_limit(strip_tags($news->content), '60') !!}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="row">
            <h3 class="p1">{{$klog->title}}</h3>
            <hr>
            {!!$klog->content!!}
        </div>
        <div class="row">
            <h3 class="p1">{{$ads->title}}</h3>
            <hr>
            {!!$ads->content!!}
        </div>
    </div>
    <div class="clearfix"></div>
</div>
</div>
</div>
</div>
@endsection