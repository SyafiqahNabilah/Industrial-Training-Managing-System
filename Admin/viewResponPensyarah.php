<?php include('..\dbcon.php');
  if (isset($_GET['id'])) {
      $id = $_GET['id'];
    $query = "SELECT ojt_pelajar.namaPelajar,ojt_maklumbalas.nokpPelajar ,ojt_maklumbalas.Id, ojt_maklumbalas.bilSeliaan, ojt_pensyarah.Program, ojt_pensyarah.namaPensyarah , ojt_maklumbalas.TarikhSeliaan , ojt_maklumbalas.date,ojt_maklumbalas.Images,ojt_maklumbalas.Images2,ojt_maklumbalas.mesej,ojt_maklumbalas.sebagai, YEAR(`date`)
      FROM ojt_maklumbalas 
      LEFT JOIN ojt_pensyarah ON ojt_maklumbalas.IDPensyarahPP = ojt_pensyarah.IDPensyarahPP
      LEFT JOIN ojt_pelajar ON ojt_maklumbalas.nokpPelajar = ojt_pelajar.nokpPelajar 
      WHERE ojt_maklumbalas.Id='$id'";
    $result = mysqli_query($con,$query); }
    while($row = mysqli_fetch_array($result)){ ?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style>
table, td {
    border: none;
    font-size: 20px;
    text-align: left;
}
table{
  width: 80%;

}
.luar
{
  width: 1500px;
  margin: 0 auto;
  margin-top: 50px;
}
.dalam
{
  width: 1000px;
  padding: 15px;
  margin: 0 auto;
  margin-top: 50px;
}
p.head {
   font-family: "Times New Roman", Times, serif;
   font-size: 30px;

}
</style>
<script type="text/javascript">
  function printpage() {
    var printpage = document.getElementById("printpage");
    printpage.style.visibility='hidden';
    window.print()
    printpage.style.visibility="visible";
  }
</script>
</head>
<body>
<div align="right"><input type="button" value="cetak laporan" id="printpage" onclick="printpage()"></div>
<div class="luar">
  <div class="dalam">
     <img src="..\src/logo.jpg" width="150px">
     <p class="head">LAPORAN HASIL LAWATAN KEATAS PELAJAR DI LATIHAN INDUSTRI <br>
      TAHUN <?php echo $row['YEAR(`date`)']; ?></p>
     <hr>
     <br/><br/><br/>
<table>
  <tr>
    <th>Diselia oleh :</th>
    <td colspan="2"><?php echo $row['namaPensyarah']; ?> </td>
  </tr>
  <tr>
    <th>Sebagai:</th>
    <td colspan="2"><?php echo $row['sebagai']; ?>  </td>
  </tr>
  <tr>
    <th width="200px">Nama Pelajar :</th>
    <td colspan="2"><?php echo $row['namaPelajar']; ?></td>
  </tr>
  <tr>
    <th>Kad Pengenalan :</th>
    <td colspan="2"><?php echo $row['nokpPelajar']; ?></td>
  </tr>
   <tr>
    <th>Seliaan ke - </th>
    <td colspan="2"><?php echo $row['bilSeliaan']; ?></td>
  </tr>
   <tr>
    <th>Tarikh Seliaan :</th>
    <td colspan="2"><?php echo $row['TarikhSeliaan']; ?></td>
  </tr>
  <tr>
    <th>Laporan :</th>
    <td colspan="2"><?php echo $row['mesej']; ?></td>
  </tr>
  <tr>
    <th>Bukti/Gambar :</th>
    <td colspan="2"></td>
  </tr>
  <tr>
    <th> </th>
     <td colspan="2">
      <br>
      <img   height="280px" src="..\post_images/<?php echo $row['Images'];?>" > 
      <?php if($row){
           if($row['Images2']) 
            {
                     echo "<img height='280px' src='..\post_images/".$row['Images2']."'>";
            }
          
            }

     
      ?> 
    </td>
  </tr>
</table>
<?php } ?>
</div>
</div>   
</body>
</html>

