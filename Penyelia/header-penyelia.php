<?php 
include '..\dbcon.php';
include '..\session.php';
 $check = $_SESSION['login_user'];
 $sql = mysqli_query($con,"SELECT * FROM ojt_penyelia_industri WHERE username = '$check'");
 while ($row = mysqli_fetch_array($sql)){
?>
<!DOCTYPE html>
<html>
<head>
<title>Sistem Pengurusan Maklumat Latihan Industri</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="..\css/bootstrap.min.css" rel="stylesheet">
  <link href="..\css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="..\style2.css">
  <link href="..\fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet"> 
  <script src="..\js/jquery.min.js" type="text/javascript"></script>
  <script src="..\js/bootstrap.min.js" type="text/javascript"></script>
  <script src="..\js/jquery.dataTables.min.js" type="text/javascript"></script>
  <script src="..\js/dataTables.bootstrap.min.js" type="text/javascript"></script>
  <script>
 var elems = document.getElementsByClassName('confirmation');
    var confirmIt = function (e) {
        if (!confirm('Are you sure to delete?')) e.preventDefault();
    };
    for (var i = 0, l = elems.length; i < l; i++) {
        elems[i].addEventListener('click', confirmIt, false);
    }

function myUpdate() {
    alert("Are you sure to Update?");
}
</script>
  </head>
<body>
   <nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="penyelia.php">Sistem Pengurusan Maklumat Latihan Industri</a>
	      <a class= "navbar-brand" href = "..\logout.php">| <i class="fa fa-sign-out fa-fw"></i>Log Keluar</a>
	    </div>
    </div>

<div class="navbar-default sidebar">
  <div class="sidebar-nav navbar-collapse">
    <ul class="nav" id="side-menu">
    <center><a href="penyelia.php"><img style="width: 130px;" src="..\src/logo.png" ></a></center>
    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><img src="..\src/mark.png" width="23%">Pengurusan Seliaan</a>
           <ul class="dropdown-menu">
           <li><a href="SenaraiPelajar.php"><span class="glyphicon glyphicon-play"></span> Senarai Seliaan Semasa</a></li>
             <li><a href="senaraiSeliaan_syarikat.php"><span class="glyphicon glyphicon-play"></span> Senarai Seliaan di Organisasi</a></li>
          </ul>
      </li>
    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><img src="..\src/respon.png" width="23%">Respon</a>
           <ul class="dropdown-menu">
           <li><a href="maklumSeliaan.php"><span class="glyphicon glyphicon-play"></span> Maklumbalas</a></li>
             <li><a href="downloadDoc.php"><span class="glyphicon glyphicon-play"></span> Muat turun Borang respon</a></li>
              <li><a href="muatnaik.php"><span class="glyphicon glyphicon-play"></span> Muat naik borang respon</a></li>
        
           </ul>
      </li>

    </ul>
    <?php } ?>
  </div>
  </div>
</nav>
  