<!DOCTYPE html>
<html class="full2" lang="en">
<!-- Make sure the <html> tag is set to the .full CSS class. Change the background image in the full.css file. -->

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Skor Akhir</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/full.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">

    <!-- Bootstrap JS -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

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
    <div class="col-lg-12" style="margin-top: 40px">
        <div class="container">
            <div class="row header">
                <h1 class="text-white text-center">SKOR AKHIR</h1>
                <h3 class="text-white text-center">Soal : 1 Kategori : Pelajar / Mahasiswa</h3>
            </div>
            <table id="myTable" class="table table-bordered text-white" >  
                <thead>  
                    <tr>
                        <th>No.</th>  
                        <th>Foto</th>  
                        <th>Nama File</th>  
                        <th>Skor</th>  
                    </tr>  
                </thead>
                <tbody>
                    @foreach($data as $item)
                    <tr>
                        <th>{{$loop->index+1}}</th>
                        <th>
                            <img id="myImg" src="{{$kategori}}/soal{{$soal}}/{{$item->nama_file}}" class="img-tabel thumbnail" alt="{{$item->nama_file}} Skor : {{$item->total}}">
                        </th>
                        <th> {{$item->nama_file}} </th>
                        <th> {{$item->total}} </th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>