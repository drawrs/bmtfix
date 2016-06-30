@extends('layouts.master')
@section('title', 'Kantor')
@section('maincontent')
<!-- about-page -->
<div class="kantor-page">
    <div class="container">
        <div class="kantor-bor">
            <div class="about-info kantor">
                <div class="container">
                    <h3>Kantor</h3>
                    <div class="image sejarah" style="text-align:center">
                    </div>
                    <div class="col-lg-10">
                        <div class="row">
                            <table class="table table-bordered" align="center">
                                <tr>
                                    <th width="10">No</th>
                                    <th width="210">Foto</th>
                                    <th>Info</th>
                                </tr>
                                @foreach($kantors as $kantor)
                                <tr>
                                    <td>#</td>
                                    <td>
                                        <a href="{{URL::to($path.''.$kantor->image)}}"><img src="{{ URL::to($path.''.$kantor->image) }}" alt="..." class="thumbnail" width="200"></a>
                                    </td>
                                    <td>
                                    <h4>{{ $kantor->name }}</h4>
                                    <p>{!! $kantor->desk !!}</p>
                                    </td>
                                </tr>
                                @endforeach
                                
                            </table>
                            {{ $kantors->links()}}
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
<!-- //about-page -->
@endsection