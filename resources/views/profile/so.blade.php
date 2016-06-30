@extends('layouts.master')

@section('title', 'Struktur Organisasi')

@section('maincontent')
<!-- about-page -->
<div class="about-page">
    <div class="container">
        <div class="about-bor">
            <div class="about-info">
                <div class="row">
                    <h3>{{ $struk->title }}</h3>
                <p>{!! $struk->desk !!}</p>
                </div>
            </div>
            

        </div>
    </div>
</div>
<!-- //about-page -->
@endsection