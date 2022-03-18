<?php 
include '..\dbcon.php';
include '..\session.php';
$check = $_SESSION['login_user']; ?>
 
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
          <a class="navbar-brand"  href = "penyelaras.php?dapat=<?php echo $row['username'];?>" data-toggle = "tooltip" data-placement = "bottom" title = "Ke halaman utama">Sistem Pengurusan Maklumat Latihan Industri </a>
      </div>
      <ul class="nav navbar-nav  navbar-right">
     <li class="dropdown">
          <a href="#" class="dropdown-toggle"  data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="kemaskiniProfil.php">Kemaskini Maklumat Diri</a></li>
            <li><a  href = "tukarPassword.php">Tukar password</a></li>
            <li role="separator" class="divider"></li>
            <li><a  href = "..\logout.php">Log Keluar</a></li>
          </ul>
      </li>
    </ul>
    </div>

<div class="navbar-default sidebar">
  <div class="sidebar-nav navbar-collapse">
    <ul class="nav" id="side-menu">
    <center><a href="penyelaras.php"><img style="width: 130px;" src="..\src/logo.png" ></a></center>
    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown"><img src="..\src/mark.png" width="23%">Pengurusan Seliaan</a>
    <ul class="dropdown-menu">
    <li> <a href="SeliaanPensyarah.php"><span class="glyphicon glyphicon-play"></span> Senarai Seliaan Semasa</a></li>
    <li><a href="sejarahSeliaan.php"><span class="glyphicon glyphicon-play"></span> Sejarah Seliaan</a></li>
   
    </ul>
    </li>
     <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown"><img src="..\src/student.png" width="23%"> Pengurusan Pelajar</a>
       <ul class="dropdown-menu">
          <li><a href="daftarPelajar.php"><span class="glyphicon glyphicon-play"></span> Daftar Pelajar</a></li>
          <li><a href="senaraiPelajar.php"><span class="glyphicon glyphicon-play"></span> Senarai Pelajar LI Semasa Program</a></li>
          <li><a href="listTamat_byKursus.php"><span class="glyphicon glyphicon-play"></span> Senarai Pelajar Telah Tamat Seliaan</a></li>
          <li><a href="senaraiSeliaan.php"><span class="glyphicon glyphicon-play"></span> Maklumat Seliaan Pelajar Latihan Industri</a></li>
           
        </ul>
      </li>
       <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown"><img src="..\src/factory.png" width="23%">Pengurusan Industri</a>
          <ul class="dropdown-menu">
            <li><a href="daftarIndustri.php"><span class="glyphicon glyphicon-play"></span> Daftar Industri</a></li>
            <li><a href="daftarPenyelia.php"><span class="glyphicon glyphicon-play"></span> Daftar Penyelia Organisasi </a></li>
            <li><a href="senaraiIndustri.php"><span class="glyphicon glyphicon-play"></span> Senarai Industri</a></li>
            <li><a href="senaraiPenyelia.php"><span class="glyphicon glyphicon-play"></span> Senarai Penyelia Organisasi</a></li>
          </ul>
      </li>
      <li>
    <a href="maklumSeliaan.php"><img src="..\src/respon.png" width="23%">Maklumbalas</a>
    </li>
    </ul>
  </div>
  </div>
</nav>
  