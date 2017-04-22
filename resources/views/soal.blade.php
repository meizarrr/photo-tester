<!DOCTYPE html>
<html lang="en">
<!-- Make sure the <html> tag is set to the .full CSS class. Change the background image in the full.css file. -->

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Canon Photo Contest - SOAL</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/custom.css" rel="stylesheet">

</head>

<body>
    <div class="col-lg-12">
        <div class="panel panel-red panel-transparent panel-full">
            <div class="panel-heading">
                <strong> Soal 1 </strong>
            </div>
            <div class="panel-body">
                <p class="text-white text-2x text-right"> 1/100 </p>
                <div class="row vertical-align">
                    <div class="col-lg-1">
                        <button type="button" class="btn btn-danger btn-circle btn-xl center-block"> < </i></button>
                    </div>
                    <div class="col-lg-10 text-center">
                        <img class="img-soal img-responsive center-block" src="img/1.jpg">
                    </div>
                    
                    <div class="col-lg-1 text-right">
                        <a href="{{ url('/fotohabis')}}">
                            <button type="button" class="btn btn-danger btn-circle btn-xl center-block"> > </i></button>
                        </a>
                    </div>
                </div>
                <div class="row text-center text-white text-150">
                    <form role="form">
                        <div class="form-group">
                            <label>Nilai : </label>
                            <label class="radio-inline">
                                <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline1" value="option1" checked>1
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline2" value="option2">2
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline3" value="option3">3
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline3" value="option3">4
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline3" value="option3">5
                            </label>
                        </div>
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