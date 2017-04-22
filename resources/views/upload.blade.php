<!DOCTYPE html>
<html class="full2" lang="en">
<!-- Make sure the <html> tag is set to the .full CSS class. Change the background image in the full.css file. -->

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Canon Photo Contest - UPLOAD</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/full.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">

</head>

<body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="{{ url('/fologout') }}"
                              onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                              Logout
                            </a>
                            <form id="logout-form" action="{{ url('/fologout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                          </li>
                    </ul>
                </div>
            </div>
    </nav>


    <div class="col-lg-4 col-lg-offset-4" style="margin-top:60px">
        
        <div class="panel panel-red panel-transparent">
            <div class="panel-heading">
                <strong>SUBMIT</strong>
            </div>
            <div class="panel-body" style="margin:0px 10px 0px 10px">
                
                <img src="img/index.jpg" class="img-responsive" style="margin-bottom:5px">
                <h1 class="text-white text-center">SUBMIT</h1>
                <div class="row" style="margin-bottom:20px">
                    <form role="form" method="POST" action="{{ url('/uploading') }}" enctype="multipart/form-data">
                    {{ csrf_field() }} 
                        <div class="form-group" >
                            <input type="text" name="nomor_peserta" id="nomor_peserta" class="form-control" placeholder="Nomor Peserta">
                        </div>
                        <div class="form group text-white" style="margin-bottom:10px">
                            <label for="foto1"> Soal 1 </label>
                                <input type="file" id="foto1" name="foto1">
                        </div>
                        <div class="form group text-white" style="margin-bottom:10px">
                            <label for="foto2"> Soal 2 </label>
                                <input type="file" id="foto2" name="foto2">
                        </div>
                        <div class="text-center text-white" style="margin-bottom:5px">
                            <button type="submit" class="btn btn-lg btn-danger">SUBMIT</button>
                        </div>

                        @if (count($errors) > 0)
                            <div class="alert alert-danger alert-custom">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Submit gagal. Periksa nomor peserta dan file foto.
                            </div>
                        @endif

                        @if (session()->has('flash_notification.message'))
                            <div class="alert alert-{{ session('flash_notification.level') }} alert-custom">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                {!! session('flash_notification.message') !!}
                            </div>
                        @endif
                    </form>


                </div>
            </div>
        </div>
    </div>


    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>