@extends('layouts.master')
@section('title', 'Produk Layanan')
@section('style')
<link href="{{URL::to('css/modal.min.css')}}" rel="stylesheet">
@endsection
@section('maincontent')
<!-- product-page -->
<div class="services-page">
    <div class="container">
        <div class="services-bor">
            <div class="ser-info">
                <h3>Produk dan Layanan</h3>
                <p>Berikut adalah produk dan layanan pada BMT AL-ISHLAH.</p>
            </div>
            <div class="services-section-grids">
                @foreach($products as $product)
                <div class="col-md-4 services-section-grid"  data-toggle="modal" data-target="#modal-{{$product->id}}">
                    <div class="services-section-grid-head">
                        <div class="service-icon">
                            <i class="event" style="background: url('{{$iconPath.''.$product->icon}}') no-repeat 0px 0px"></i>
                        </div>
                        <div class="service-icon-heading">
                            <h4>{{ $product->title }}</h4>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <p style="text-align:justify;">{!! $product->desk !!}</p>
                </div>
                
                @endforeach
                <div class="clearfix"></div>
            </div>
            
        </div>
    </div>
</div>
<!-- //Product-page -->
@foreach($products as $product )
<!-- Modal -->
<div class="modal fade" id="modal-{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">{{ $product->title}}</h4>
            </div>
            <div class="modal-body">
                <a href="{{URL::to($brosurPath.''.$product->content)}}" target="blank"><img src="{{URL::to($brosurPath.''.$product->content)}}" width="100%" alt=""></a>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
@section('bottom-script')
<link href="{{URL::to('js/modal.min.js')}}" rel="stylesheet">
<script>
</script>
@endsection