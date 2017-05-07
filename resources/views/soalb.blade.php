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
            <div class="panel-heading">
                <strong> Soal 2 </strong>
            </div>
            <div class="panel-body">
                <form role="form" method="POST" action="{{ url('/scoring2') }}">
                {{ csrf_field() }} 
                    <p class="text-white text-2x text-right"> {{$counter}}/{{$max}} </p>
                    <div class="row vertical-align">
                        <div class="col-lg-1">
                        <!-- previous -->
                        <button type="submit" class="btn btn-danger btn-circle btn-xl center-block" name="clickedbutton" id="previous" value="previous">
                                <span class="fa fa-caret-left fa-lg"></span>
                        </button>

                        </div>
                        <div class="col-lg-10 text-center">
                            <input type="hidden" name="nama_file" value="{{$source->nama_file}}" id="{{$source->nama_file}}">
                            <img class="img-soal img-responsive center-block" src="soal2/{{$source->nama_file}}">
                        </div>
                        
                        <!-- next -->
                        <div class="col-lg-1 text-right">
                                <button type="submit" class="btn btn-danger btn-circle btn-xl center-block" name="clickedbutton" id="next" value="next">
                                    <span class="fa fa-caret-right fa-lg"></span>
                                </button>
                        </div>
                    </div>

                    <div class="row text-center text-white text-150">
                        <div class="form-group">
                            <label>Nilai : </label>
                            <label class="radio-inline">
                                <input type="radio" name="nilai" id="nilai1" value="1">1
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="nilai" id="nilai2" value="2">2
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="nilai" id="nilai3" value="3">3
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="nilai" id="nilai4" value="4">4
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="nilai" id="nilai5" value="5">5
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="nilai" id="nilai0">Skip
                            </label>
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