@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center">PENJURIAN</div>
                <div class="panel-body text-center">
                    <img class="image-responsive" width="200" height="200" src="camera.jpg">
                    <div class="row">
                    <div class="col-lg-6 text-center">
                        <a href="{{ url('/soal')}}">
                            <button type="button" class="btn btn-lg btn-primary">Soal</button>
                        </a>
                    </div>
                    <div class="col-lg-6 text-center">
                        <button type="button" class="btn btn-lg btn-primary">Soal 2</button>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
