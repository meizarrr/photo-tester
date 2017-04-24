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

    <!-- Custom CSS -->
    <link href="css/full.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">

</head>

<body>
<div class="container">
<div class="row header">
<h1 class="text-white text-center">SKOR</h1>
</div>
<table id="myTable" class="table table-bordered text-white" >  
        <thead>  
          <tr>  
            <th>Foto</th>  
            <th>Nama File</th>  
            <th>Skor</th>  
          </tr>  
        </thead>
        <tbody>
            @foreach($data as $item)
                <tr>
                    <th> <img src="soal1/{{$item->nama_file}}" class="img-thumbnail img-tabel"> </th>
                    <th> {{$item->nama_file}} </th>
                    <th> {{$item->total}} </th>
                </tr>
            @endforeach
        </tbody>
</table>
</div>
</body>
</html>