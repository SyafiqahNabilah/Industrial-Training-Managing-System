<?php 
include 'headerAdmin.php';
$sql="SELECT ojt_pelajar.namaPelajar, ojt_penyelia_industri.namaPenyelia , ojt_borangrespon_penyelia.date, ojt_borangrespon_penyelia.name
    FROM ojt_borangrespon_penyelia
    LEFT JOIN ojt_penyelia_industri ON ojt_borangrespon_penyelia.IDPenyelia = ojt_penyelia_industri.IDPenyelia
    LEFT JOIN ojt_pelajar ON ojt_borangrespon_penyelia.nokpPelajar = ojt_pelajar.nokpPelajar ";
$result = mysqli_query($con,$sql);
$sq="SELECT ojt_pelajar.namaPelajar ,ojt_maklumbalas.Id, ojt_pelajar.kelas, ojt_penyelia_industri.namaPenyelia , ojt_maklumbalas.date
    FROM ojt_maklumbalas 
    LEFT JOIN ojt_penyelia_industri ON ojt_maklumbalas.IDPenyelia = ojt_penyelia_industri.IDPenyelia
    LEFT JOIN ojt_pelajar ON ojt_maklumbalas.nokpPelajar = ojt_pelajar.nokpPelajar WHERE ojt_maklumbalas.sebagai = 'Penyelia Organisasi' ";
$result2 = mysqli_query($con,$sq);
?>
<div id="page-wrapper">
<div class="row">
<div class="col-lg-12">
    <h2 class="page-header">Respon dari Penyelia Organisasi</h2>
</div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12">
    <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Borang Respon</a></li>
    <li><a data-toggle="tab" href="#menu1">Maklumbalas Pantas </a></li>
    </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <br>
      <h4>Memaparkan borang respon yang telah dimuat naik oleh Penyelia Industri</h4>
      <br>
      <table class="table table-striped table-bordered table-hover" id="myData">
<thead>
    <tr>
        <th>
            Bil.
        </th>
        <th>
            Tarikh
        </th>
        <th>
            Nama Responder
        </th>
        <th>
            Nama Pelajar yang diberi respon
        </th>
        <th>
            Nama Dokumen
        </th>
        <th>
            Muat Turun
        </th>
    </tr>
</thead>
<tbody>
    <tr>
    <?php
        $num = 1;
        while($row = mysqli_fetch_array($result)){ ?>
        <td>
            <?php echo $num++ ?>
        </td>
        <td>
            <?php echo $row['date'];?>
        </td>
        <td>
            <?php echo $row['namaPenyelia'];?>
        </td>
        <td>
            <?php echo $row['namaPelajar'];?>
        </td>
        <td>
            <?php echo $row['name'];?>
        </td>
        <td>
            <center><a href="../files/<?php echo $row['name'] ?>"title="click to download"><img src='..\src/download.png'></a></center>
        </td>
    </tr>
    <?php }?>
    </tbody>
</table>
    <script>
  $(document).ready(function(){
    $('#myData').DataTable();
  });
  </script>
    </div>
    <div id="menu1" class="tab-pane fade">
      <br>
      <h4>Memaparkan maklumbalas pantas yang telah dimaklumkan oleh Penyelia Industri</h4>
      <br>
       <table class="table table-striped table-bordered table-hover" id="myData1">
<thead>
    <tr>
        <th>
            Bil.
        </th>
        <th>
            Nama pelajar
        </th>
        <th>
            Seliaan ke 
        </th>
        <th>
            Nama Penyelia
        </th>
        <th>
            Tarikh respon dibuat
        </th>
        <th>
            Lihat respon penuh
        </th>
    </tr>
</thead>
<tbody>
    <tr>
    <?php
        $num = 1;
        while($row = mysqli_fetch_array($result2)){ ?>
        <td>
            <?php echo $num++ ?>
        </td>
        <td>
            <?php echo $row['namaPelajar'];?>
        </td>
        <td>
            <?php echo $row['kelas'];?>
        </td>
        <td>
            <?php echo $row['namaPenyelia'];?>
        </td>
        <td>
            <?php echo $row['date'];?>
        </td>
        <td>
            <center><button style='background-color: Transparent; border: none;'><a target="_blank" href="viewResponPenyelia.php?id=<?php echo $row['Id'];?>">Lihat Penuh dan Cetak</a></button>
        </td>
    </tr>
    <?php }?>
    </tbody>
</table>
    <script>
  $(document).ready(function(){
    $('#myData1').DataTable();
  });
  </script>
    </div>
  </div>
</div>
</div>
</div>

</body>
