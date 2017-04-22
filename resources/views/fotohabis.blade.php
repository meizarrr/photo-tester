<!DOCTYPE html>
<html class="full2" lang="en">
<!-- Make sure the <html> tag is set to the .full CSS class. Change the background image in the full.css file. -->

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Canon Photo Contest - FOTO HABIS</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

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
                <a class="navbar-brand" href="#">Canon Photo Contest</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="col-sm-6 col-md-4 col-md-offset-4" style="margin-top:80px">
        <div class="panel panel-red panel-transparent">
            <div class="panel-heading">
            <strong>FOTO HABIS</strong>
            </div>
            <div class="panel-body">
                <img src="img/index.jpg" class="img-responsive" style="margin-bottom:20px">
                <h1 class="text-white text-center">FOTO HABIS</h1>
                <div class="row" style="margin-bottom:20px">
                <div class="col-md-6 text-center">
                    <button type="button" class="btn btn-lg btn-danger">Cek Lagi</button>
                </div>
                <div class="col-md-6 text-center">
                <a href="{{ url('/tunggujuri')}}">
                    <button type="button" class="btn btn-lg btn-danger">Lihat Skor</button>
                </a>
                </div>
                </div>
                <div class="row">
                    <div class="text-center">
                        <button type="button" class="btn btn-lg btn-danger">LANJUT KE SOAL 2</button>
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