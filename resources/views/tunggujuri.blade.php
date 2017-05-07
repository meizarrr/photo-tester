<!DOCTYPE html>
<html class="full2" lang="en">
<!-- Make sure the <html> tag is set to the .full CSS class. Change the background image in the full.css file. -->

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Canon Photo Contest - TUNGGU JURI</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/full.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">

</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Canon Photo Marathon 2017</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <!-- /.navbar-collapse -->
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                        @else
                          <li>
                            <a href="{{ url('/logout') }}"
                              onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                              Logout
                            </a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                          </li>
                        @endif
                    </ul>
                </div>
        </div>
        <!-- /.container -->
    </nav>

    <div class="col-sm-6 col-md-4 col-md-offset-4" style="margin-top:80px">
        <div class="panel panel-red panel-transparent">
            <div class="panel-heading">
            <strong>Tunggu Juri Lainnya</strong>
            </div>
            <div class="panel-body">
                <img src="img/index.jpg" class="img-responsive" style="margin-bottom:20px">
                <h1 class="text-white text-center">TUNGGU JURI LAINNYA</h1>
                <a href="{{ url('/skor')}}">
                            <button type="button" class="btn btn-danger btn-circle btn-xl center-block">
                                <span class="fa fa-refresh fa-lg"></span>
                            </button>
                </a>
                <div class="row" style="margin-bottom:20px">
                <div class="col-md-6 text-center">
                <a href="{{ url('/soalb')}}">
                    <button type="button" class="btn btn-lg btn-danger">Soal 2</button>
                </a>
                </div>
                <div class="col-md-6 text-center">
                <a href="{{ url('/soal')}}">
                    <button type="button" class="btn btn-lg btn-danger">Cek Lagi</button>
                </a>
                </div>
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