<?php 
  include 'dbcon.php';
  include 'login.php';
  $sql = "SELECT * FROM upload";
  $hasil = mysqli_query($con,$sql);
  $post = "SELECT * FROM ojt_post ORDER BY date DESC LIMIT 3 ";
  $hasilpost = mysqli_query($con,$post);
?>
<!DOCTYPE html>
<html>
<head>
  
  <!-- start: Meta -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- end: Meta -->
  
  <!-- start: CSS -->
  <link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
  <link id="base-style" href="css/style.css" rel="stylesheet">
  <link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
  <!-- end: CSS -->
  <!-- start: Favicon -->
  <link rel="shortcut icon" href="img/favicon.ico">
  <!-- end: Favicon -->
  
</head>

<body style="background-color: #f8f8f8;">
<div id="wrapper">
  <div class="container-fluid-full" >
    <center>
      <img src="src/spmli.png">
    </center>
    <div class="container" style="background-color: #fff;" >  
     <center>
      <h2><marquee>Selamat Datang ke Sistem Pengurusan Maklumat Latihan Industri</marquee></h2>
     </center> 
     <hr>
     <br><br/>
      <div class="col-lg-4 col-md-4">
    <div class="login-box"> 
    <h3 class="page-header"><img src="src/password.png"> DAFTAR MASUK</h3>

    <center>
          <form action = "" method = "post" class="form-horizontal">
          <input type = "text" name = "username" class="form-control" placeholder="Username" /><br>
          <input type = "password" name = "password" class="form-control" placeholder="Katalaluan" /><br/>
          <center><input type = "submit" value = "Masuk" class="btn btn-default" name="submit" />
          </center>
          </form>
    </center>
          PERHATIAN : <p>1.Sekiranya anda mempunyai masalah untuk daftar masuk sila rujuk kepada Ketua Unit Perhubungan Latihan Industri(KUPLI) KV Perdagangan Johor Bahru.</p>
          <p>2.Pendaftaran penguna hanya boleh dilakukan oleh KUPLI.</p>
          <p>3. Untuk melihat senarai pelajar berserta pensyarah yang menyelia sila <a href="SenaraiSeliaanOJT.php"  target="_blank">klik sini</a></p>
    </div>
     

    <h3 class="page-header"> MUAT TURUN </h3>
      <table width="335px">
      
        <?php $num = 1; 
        while($row = mysqli_fetch_array($hasil)){ ?>
        <tr>
          <td>
          <?php echo $num++ ?>.<?php echo $row['nama'];?>
          </td>
          <td>
            <a href="files/<?php echo $row['file'] ?>" target="_blank"><img width="20px" src='src/download.png'></a>
          </td>
        </tr>
        <?php }?>
      </table>
      <br><br><br>
    
     <h3 class="page-header">HUBUNGI :</h3>
        Alamat : Kolej Vokasional Perdagangan Johor Bahru<br>
        Susur 7, Jalan Tun Abdul Razak , <br>
        80350 <br>
        TEL : 07-2374378 <br>
        FAKS : 07-2386726 <br>
        Email : kvdagang@gmail.com<br>
        <a href="https://www.facebook.com/KVPJB"><img width="30px" src='src/s1.png'></a>
        <a href="http://kvdagang.moe.edu.my/"><img width="30px" src='src/s2.png'></a>
        <a href="http://www.youtube.com/user/KVPJB"><img width="30px" src='src/s3.png'></a>
        <br><br>
    </div>
    
    <div class="col-lg-7 col-md-7">
    <!-- <h3 class="page-header"><img src="src/announcement.png"> PENGUMUMAN TERKINI </h3> -->
    <?php while($row = mysqli_fetch_array($hasilpost)){ ?>
    <h4 class="page-header"> <img src="src/alert.png"><?php echo $row['title'];?><br></h4>
    
    <?php $yes = $row['image']; 
    if ($yes){ ?>
              <img width="30%" src="post_images/<?php echo $row['image'];?>"><br>
              <?php echo $row['content'];
    }
    else {
          echo $row['content'];
        }
      }
          ?>
    
    <br><br><br>
    </div>
    </div>
    </div><!--/.fluid-container-->
    </div>
  <!--/fluid-row-->
  <!-- start: JavaScript-->

    <script src="js/jquery-1.9.1.min.js"></script>
    <script src="js/jquery-migrate-1.0.0.min.js"></script>
    <script src="js/jquery-ui-1.10.0.custom.min.js"></script>
    <script src="js/jquery.ui.touch-punch.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
  <!-- end: JavaScript-->
  </div>
</body>
</html>
