<?php 
include '..\dbcon.php';
include '..\session.php';
$check = $_SESSION['login_user'];
// $sql = mysqli_query($con,"SELECT * FROM ojt_pensyarah WHERE username = '$check'");
// $row = mysqli_fetch_array($sql);?>
 
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
  <script type="text/javascript">
   var elems = document.getElementsByClassName('confirmation');
    var confirmIt = function (e) {
        if (!confirm('Are you sure to delete?')) e.preventDefault();
    };
    for (var i = 0, l = elems.length; i < l; i++) {
        elems[i].addEventListener('click', confirmIt, false);
    }
    
  </script>
</head>
<body>
<div id="wrapper">
 <nav class="navbar navbar-default navbar-static-top">
      <div class="navbar-header">
          <a class="navbar-brand" href="admin.php">Sistem Pengurusan Maklumat Latihan Industri</a>
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
          <li><a href="#"></a></li>
        </li>
    </ul>

    <div class="navbar-default sidebar" role="navigation">
      <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
        <center><a href="admin.php"><img style="width: 130px;" src="..\src/logo.png" ></a></center>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown"><img src="..\src/web.png" width="23%"> Halaman Depan</a>
           <ul class="dropdown-menu">
              <li><a href="buatPengumuman.php"><span class="glyphicon glyphicon-play"></span> Membuat pengumuman</a></li>
              <li ><a href="senaraiPengumuman.php"><span class="glyphicon glyphicon-play"></span> Senarai Pengumuman </a></li>
              <li><a href="uploadDoc.php"><span class="glyphicon glyphicon-play"></span> Upload dan Download Dokumen</a></li>
            </ul>
          </li>
         <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown"><img src="..\src/student.png" width="23%"> Pengurusan Pelajar</a>
           <ul class="dropdown-menu">
              <li><a href="daftarPelajar.php"><span class="glyphicon glyphicon-play"></span> Daftar Pelajar</a></li>
              <li ><a href="statusPelajar.php"><span class="glyphicon glyphicon-play"></span> Penetapan Status Pelajar </a></li>
              <li><a href="senaraiPelajar.php"><span class="glyphicon glyphicon-play"></span> Senarai pelajar LI Semasa</a></li>
              <li><a href="senaraiTamat.php"><span class="glyphicon glyphicon-play"></span> Senarai Pelajar Telah Tamat LI</a></li>
              <li><a href="senaraiSeliaan.php"><span class="glyphicon glyphicon-play"></span> Senarai Penuh Seliaan Pelajar</a></li>
            </ul>
          </li>

            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown"><img src="..\src/teacher.png" width="23%"> Pengurusan Pensyarah</a>
              <ul class="dropdown-menu">
                <li><a href="daftarPensyarah.php"><span class="glyphicon glyphicon-play"></span> Daftar Pensyarah</a></li>
                <li><a href="senaraiPensyarah.php"><span class="glyphicon glyphicon-play"></span> Senarai pensyarah</a></li>
                 <li><a href="seliaanPensyarah.php"><span class="glyphicon glyphicon-play"></span> Senarai Penuh Seliaan Pensyarah</a></li>
              </ul>
          </li>
           <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown"><img src="..\src/factory.png" width="23%">Pengurusan Industri</a>
              <ul class="dropdown-menu">
                <li><a href="daftarIndustri.php"><span class="glyphicon glyphicon-play"></span> Daftar Industri</a></li>
                <li><a href="daftarPenyelia.php"><span class="glyphicon glyphicon-play"></span> Daftar Penyelia</a></li>
                <li><a href="senaraiIndustri.php"><span class="glyphicon glyphicon-play"></span> Senarai Industri</a></li>
                <li><a href="senaraiPenyelia.php"><span class="glyphicon glyphicon-play"></span> Senarai Penyelia</a></li>
              </ul>
          </li>
          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><img src="..\src/respon.png" width="23%">Pengurusan Maklumbalas</a>
               <ul class="dropdown-menu">
               <li><a href="maklumSeliaan.php"><span class="glyphicon glyphicon-play"></span> Maklumbalas</a></li>
                 <li><a href="borangMaklumbalas.php"><span class="glyphicon glyphicon-play"></span> Muatnaik Borang respon</a></li>
                  <li><a href="responPensyarah.php"><span class="glyphicon glyphicon-play"></span> Respon dari PPO & PP</a></li>
                  <li><a href="responPenyelia.php"><span class="glyphicon glyphicon-play"></span> Respon dari Penyelia Industri</a></li>
                 
               </ul>
          </li>
        </ul>
      </div>
      </div>
    </nav>

