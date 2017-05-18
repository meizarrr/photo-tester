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
                            <a data-toggle="modal" data-id="{{$kategori}}/soal{{$soal}}/{{$item->nama_file}}" data-file="{{$item->nama_file}}" data-score="{{$item->lastScore}}" class="open-Modal" href="#">
                                <img id="myImg" src="{{$kategori}}/soal{{$soal}}/{{$item->nama_file}}" class="img-tabel" alt="{{$item->nama_file}}">
                            </a>
                        </th>
                        <th> {{$item->nama_file}} </th>
                        <th> {{$item->total}} </th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

<!-- The Modal -->
<div id="myModal" class="modal">
  <span class="close" id="tutup" onclick="document.getElementById('myModal').style.display='none'">&times;</span>
  <img class="modal-content" id="img01">
  <form role="form" method="POST" action="{{ url('/newscore') }}" class="form-horizontal" style="margin-top:5px">
                {{ csrf_field() }}  
        <input type="hidden" id="nama_file" value="" name="nama_file">
        <div id="caption" class="col-sm-12 text-white text-center"></div>
        <div class="col-sm-1 col-sm-offset-5">
            <input class="form-control" id="nilai" type="number" name="nilai" id="nilai" min="0.01" max="10" step="0.01" value="" autofocus>
        </div>
        <div class="col-sm-1">
            <button type="submit" class="btn btn-danger" name="update">Update</button>
        </div>
    </form>
</div>

<script>
    var modal = document.getElementById('myModal');
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    var modalFile = document.getElementById("nama_file");
    var modalNilai = document.getElementById("nilai");
    $(document).on("click", ".open-Modal", function () {
        var mySrc = $(this).data('id');
        var myFile = $(this).data('file');
        var myScore = $(this).data('score');
            modal.style.display = "block";
            modalImg.src = mySrc;
            modalFile.value = myFile;
            modalNilai.value = myScore;
            captionText.innerHTML = myFile;
    });

</script>

</body>
</html>