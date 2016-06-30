@extends('layouts.master')

@section('title', 'Sejarah')

@section('maincontent')
<!-- about-page -->
<div class="about-page">
    <div class="container">
        <div class="about-bor">
            <div class="about-info">
                <h3>{{ $sejarah->title }}</h3>
                <div class="image sejarah" style="text-align:center">
                    <img src="{{Image::url(URL::to($imagePath .''. $sejarah->image),600,400,array('crop'))}}" alt="">
                </div>
                <p>{!! $sejarah->desk !!}</p>
            </div>
            

        </div>
    </div>
</div>
<!-- //about-page -->
@endsection