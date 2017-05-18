<!DOCTYPE html>
<html lang="en">
<!-- Make sure the <html> tag is set to the .full CSS class. Change the background image in the full.css file. -->

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Canon Photo Contest - SOAL</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/custom.css" rel="stylesheet">

</head>

<body>
    <div class="col-lg-12">
        <div class="panel panel-red panel-transparent panel-full">
            <div class="panel-heading text-150">
                <div class="row">
                    <div class="col-md-4 text-left panel-title">Soal {{$soal}}</div>
                    @if($status == "UNFINISHED")
                        <div class="col-md-8 text-right">Scored : {{$counter}}/{{$max}}</div>
                    @else
                        <div class="col-md-8 text-right">Display : {{$counter}}/{{$max}}</div>
                    @endif
                </div>
            </div>
            <div class="panel-body">
                <form role="form" method="POST" action="{{ url('/scoring') }}" class="form-horizontal">
                {{ csrf_field() }} 

                    <div class="row vertical-align">
                        <!-- previous -->
                        <div class="col-lg-1">
                            <button type="submit" name="clickedbutton" id="next" value="next" style="visibility: hidden">     
                            <button type="submit" class="btn btn-danger btn-circle btn-xl center-block" name="clickedbutton" id="previous" value="previous">
                                    <span class="fa fa-caret-left fa-lg"></span>
                            </button>
                        </div>
                        <!-- image display -->
                        <div class="col-lg-10 text-center">
                            <input type="hidden" name="nama_file" value="{{$source->nama_file}}" id="{{$source->nama_file}}">
                            <img class="img-soal center-block" src="{{$kategori}}/soal{{$soal}}/{{$source->nama_file}}" alt="Loading...">
                        </div>
                        
                        <!-- next -->
                        <div class="col-lg-1 text-right">
                                <button style="visibility: hidden">
                                <button type="submit" class="btn btn-danger btn-circle btn-xl center-block" name="clickedbutton" id="next" value="next">
                                    <span class="fa fa-caret-right fa-lg"></span>
                                </button>
                        </div>
                    </div>

                    <div class="row text-center text-white text-150" style="margin-top: 5px">
                                <label class="control-label col-sm-1 col-sm-offset-5" for="nilai">Nilai : </label>
                                <div class="col-sm-1">
                                @if($score != 0)
                                    <input class="form-control" type="number" name="nilai" id="nilai" min="0.01" max="10" step="0.01" value="{{$score}}" autofocus>
                                @else
                                    <input class="form-control" type="number" name="nilai" id="nilai" min="0.01" max="10" step="0.01" value="" autofocus>
                                @endif
                                </div>
                                @if($status == "FINISHED")
                                    <div class="col-sm-1 col-sm-offset-3">
                                        <a href="{{ url('/skor') }}">
                                            <button type="button" class="btn btn-sm btn-danger">CEK SKOR AKHIR</button>
                                        </a>
                                    </div>
                                @endif
                                @if (session()->has('flash_notification.message'))
                                    <div class="alert alert-{{ session('flash_notification.level') }} alert-custom">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        {!! session('flash_notification.message') !!}
                                    </div>
                                @endif
                    </div>
                </form>   
            </div>
        </div>
    </div>


    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>