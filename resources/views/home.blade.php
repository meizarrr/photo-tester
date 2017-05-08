<!DOCTYPE html>
<html class="full" lang="en">
<!-- Make sure the <html> tag is set to the .full CSS class. Change the background image in the full.css file. -->

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Canon Photo Contest - HOME</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    

    <!-- Custom CSS -->
    <link href="css/full.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" >
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Canon Photo Contest</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <!-- /.navbar-collapse -->
            <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login Juri</a></li>
                            <li><a href="{{ url('/frontdesk') }}">Login Front Desk</a></li>
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
        <!-- /.container -->
    </nav>

    <div class="col-sm-6 col-md-4 col-md-offset-4" style="margin-top:80px"> 
        <div class="panel panel-red panel-transparent">
            <div class="panel-heading">
            <strong> Pilih Soal </strong>
            </div>
            <div class="panel-body text-center">
                @if(Auth::user()->kategori == NULL)
                    <form role="form" method="POST" action="{{ url('/pembagian') }}">
                        {{ csrf_field() }}
                        <img src="img/index.jpg" class="img-responsive" style="margin-bottom:20px">
                        <div class="form-group">
                            <label class="text-white">Kategori</label>
                            <select class="form-control" name="kategori" id="kategori">
                                <option value="Pelajar">Pelajar</option>
                                <option id="Umum" value="Mahasiswa">Mahasiswa</option>
                            </select>
                        </div>
                        <div class="col-md-6 text-center">
                            <button type="submit" class="btn btn-lg btn-danger" name="soal" id="1" value="1">Soal 1</button>
                        </div>
                        <div class="col-md-6 text-center">
                            <button type="submit" class="btn btn-lg btn-danger" name="soal" id="2" value="2">Soal 2</button>
                        </div>
                    </form>
                    @if (session()->has('flash_notification.message'))
                        <div class="col-md-12">
                            <div class="alert alert-{{ session('flash_notification.level') }} alert-custom" style="margin-top: 10px">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                {!! session('flash_notification.message') !!}
                            </div>
                        </div>
                    @endif
                @else
                    <img src="img/index.jpg" class="img-responsive" style="margin-bottom:20px">
                    <h4 class="text-white text-center">Anda sudah memilih soal {{Auth::user()->soal}} kategori {{Auth::user()->kategori}}</h4>
                    <a href="{{ url('/soal') }}">
                        <button type="button" class="btn btn-lg btn-danger">Buka Soal</button>
                    </a>
                    
                @endif
            </div>
        </div>
    </div>

            <!-- jQuery -->
            <script src="js/jquery.js"></script>

            <!-- Bootstrap Core JavaScript -->
            <script src="js/bootstrap.min.js"></script>

        </body>

        </html>