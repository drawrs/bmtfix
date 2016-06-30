@extends('layouts.master')

@section('title', 'Visi Dan Misi')

@section('maincontent')
<!-- about-page -->
<div class="about-page">
    <div class="container">
        <div class="about-bor">
            <div class="about-info">
                <h3>{{ $visimisi->title }}</h3>
                <p>{!! $visimisi->desk !!}</p>
            </div>
            <div class="about-grids">
                <div class="col-md-5 about-left">
                    <img src="{{Image::url(URL::to($imagePath .''. $visimisi->image),400,400,array('crop'))}}" alt=""/>
                </div>
                <div class="col-md-7 about-right">
                    <div class="jumbotron about-pad">
                      <h3>Visi</h3>
                      <p>{!! $visimisi->visi !!}</p>
                        <h3>Misi</h3>
                      <p>{!! $visimisi->misi !!}.</p>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>

        </div>
    </div>
</div>
<!-- //about-page -->
@endsection