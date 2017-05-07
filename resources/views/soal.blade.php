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
                    <div class="col-md-4 text-left panel-title">Soal 1</div>
                    <div class="col-md-8 text-right">{{$counter}}/{{$max}} </div>
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
                            <img class="img-soal img-responsive center-block" src="{{$kategori}}/soal{{$soal}}/{{$source->nama_file}}">
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
                                    <input class="form-control" type="number" name="nilai" id="nilai" min="1" max="10" step="1" value="" autofocus>
                                </div>
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