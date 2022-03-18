<?php 
include 'headerAdmin.php';
  $query="select * from ojt_post ORDER BY id DESC";
  $upload = mysqli_query($con,$query);
?>
<div id="page-wrapper">
<div class="row">
<div class="col-lg-12">
    <h2 class="page-header">Selamat Datang ke Sistem Pengurusan Maklumat Latihan Industri</h2>
    <p class="text-muted">Klik pada tab dibawah untuk mengetahui lebih lanjut mengenai menu-menu yang sistem SPMLI ini berserta kegunaanya.</p>
    
  
</div>
</div>
<div class="row">
<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Halaman Depan?</a></li>
    <li><a data-toggle="tab" href="#menu1">Pengurusan Pelajar?</a></li>
    <li><a data-toggle="tab" href="#menu2">Pengurusan Pensyarah ? </a></li>
    <li><a data-toggle="tab" href="#menu3">Pengurusan Industri ?</a></li>
    <li><a data-toggle="tab" href="#menu4">Pengurusan Maklumbalas ?</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
    <br>
      <img src="..\src/web.png"> Halaman Depan
      <p>Ikon ini membenarkan pengguna untuk : <br>

          <p> <b>1. Membuat pengumuman</b> akan membenarkan pengguna membuat pengumuman/pemberitahuan di muka hadapan sistem(Rajah , no 1) <br> </P>
          <p> <b>2. Senarai pengumuman</b> membenarkan pengguna untuk melihat pengumuman yang telah dibuat, dan mengemaskini pengumuman tersebut<br> </P>
          <p> <b>3. Upload dan Download Dokumen</b> membolehkan pengguna untuk memuat naik dokumen dan dokumen tersebut akan dipaparkan dimuka hadapan sistem (Rajah , no 2)<br> </P>
           <center><img border="2px solid black" src="..\src/Capture.png" width="800px" height="500px"></center>
    </div>
    <div id="menu1" class="tab-pane fade">
    <br>
      <img src="..\src/student.png"> Pengurusan Pelajar
          <p>Ikon ini membenarkan pengguna untuk : <br>
          <p><b>1. Daftar pelajar</b> mendaftar pelajar baru atau pelajar yang menumpang <br></P>
          <p><b>2. Penetapan status pelajar</b> membenarkan pengguna menetapkan status pelajar yang baru didaftar atau pelajar tahun 4<br></P>
          <p><b>3. Senarai pelajar LI semasa</b> Menyenaraikan pelajar yang telah disahkan menjalani program OJT<br></P>
          <p><b>4. Senarai pelajar telah tamat LI</b> membenarkan pengguna melihat senarai pelajar yang telah tamat latihan industri/tahun sebelumnya<br></P>
          <p><b>4. Senarai penuh seliaan pelajar </b> Menyenaraikan pelajar dan maklumat latihan industri mereka<br></p>      
    </div>
    <div id="menu2" class="tab-pane fade">
    <br>
       <img src="..\src/teacher.png"> Pengurusan Pensyarah
       <p>Ikon ini membenarkan pengguna untuk : <br>
       <p><b>1. Daftar pensyarah</b> mendaftar pensyarah baru <br></P>
       <p><b>2. Senarai pensyarah OJT</b> Menyenaraikan pensyarah yang telah didaftarkan<br></P>
       <p><b>3. Senarai Seliaan </b> Menyenaraikan pensyarah dan pelajar dibawah seliaan mereka<br>  </p>
             
    </div>
    <div id="menu3" class="tab-pane fade"><br>
      <img src="..\src/factory.png"> Pengurusan Industri
      <p>Ikon ini membenarkan pengguna untuk : <br>
      <p><b>1. Daftar Industri</b> mendaftar syarikat baru <br></P>
      <p><b>2. Daftar Penyelia</b> mendaftar penyelia baru <br></P>
      <p><b>3. Senarai Industri</b> Menyenaraikan industri dan membenarkan pengemaskinian dilakukan<br></P>
      <p><b>4. Senarai Seliaan </b> Menyenaraikan penyelia dan membenarkan pengemaskinian dilakukan<br></p>
           
    </div>
    <div id="menu4" class="tab-pane fade"><br>
      <img src="..\src/respon.png"> Pengurusan Maklumbalas
      <p>Ikon ini membenarkan pengguna untuk : <br>
      <p><b>1. Maklumbalas</b> Membenarkan pengguna memberi maklumbalas terhadap pelajar dibawah seliaan pengguna <br></P>
      <p><b>2. Muat naik borang respon</b> Membolehkan pengguna admin memuat naik borang respon yang perlu diisi oleh penyelia di industri <br></P>
      <p> <b>3. Respon dari PP & PPO </b> Menyenaraikan respon yang telah dimaklumkan oleh PP dan PPO <br></P>
      <p> <b>4. Respon dari Penyelia Industri </b> Menerima respon yang telah dibuat oleh pihak industri terhadap pelajar yang menjalani OJT di tempat mereka<br></p>
           
    </div>
    
</div>
</div>
</div>
</body>
