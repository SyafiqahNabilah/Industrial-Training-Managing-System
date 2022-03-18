<?php 
  include '..\dbcon.php';
  if(isset($_GET['cetak'])){
    $search = $_GET['cetak'];
    $query = "SELECT * FROM ojt_pensyarah WHERE IDPensyarahPP = '$search'"; 
    $result =mysqli_query($con,$query); }?>

  <?php while($row = mysqli_fetch_array($result)){  ?>
  <br>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    font-size: 12px;
    word-wrap: break-word;
   

}
table{
   width: 100%;
   table-layout: fixed;
}
.outer {
  width: 800px;
  margin: 0 auto;
}
</style>
</head>
<body>
<div class="outer">
<center><h2><u>SENARAI PELAJAR DISELIA </u></h2></center>
<br>
    <b>Nama Pensyarah :</b> <?php echo $row['namaPensyarah']; ?> <br>
    <b>Jawatan : </b><?php echo $row['jawatan'];?><br>
    <b>Jabatan : </b><?php echo $row['jabatan'];?><br>
    <b>No telefon :  </b><?php echo $row['notelpensyarah']; ?><br>
    <?php $id = $row['IDPensyarahPP']; 
    $num = 1;
     $query2 = "SELECT ojt_pelajar.namaPelajar , ojt_industri.namaSyarikat, ojt_industri.Alamat, ojt_penyelia_industri.namaPenyelia, ojt_penyelia_industri.notel,ojt_industri.Alamat2,ojt_industri.Poskod, ojt_industri.Daerah,ojt_industri.Negeri,ojt_pelajar.program,ojt_pelajar.notelpelajar
    FROM ref_seliaan
    LEFT JOIN ojt_pelajar ON ref_seliaan.nokpPelajar = ojt_pelajar.nokpPelajar
    LEFT JOIN ojt_industri ON ref_seliaan.IDIndustri = ojt_industri.IDIndustri
    LEFT JOIN ojt_penyelia_industri ON ref_seliaan.IDPenyelia = ojt_penyelia_industri.IDPenyelia
    WHERE ref_seliaan.IDPensyarahPP = $id AND ref_seliaan.status='' ";
    $result2 = mysqli_query($con,$query2);
     ?>
    <br>
     <h4><b>Sebagai Pensyarah Penilai (PP)</b></h4>
     <table>
     <thead>
      <tr>
        <th width="20px">
          Bil.
        </th>
        <th width="50px">
          Kelas
        </th>
        <th>
          No telefon pelajar
        </th>
        <th>
          Nama pelajar
        </th>
        <th>
          Nama Syarikat Latihan Industri
        </th>
        <th>
          Alamat Syarikat
        </th>
        <th>
          Nama Penyelia
        </th>
        <th>
          No telefon
        </th>
      </tr>
    </thead>
    <?php if ($rows = mysqli_fetch_array($result2)) {?>
      <tbody>
        <td>
          <?php echo $num++ ?>
        </td>
         <td>
          <?php echo $rows['program'];?>
        </td>
         <td>
          <?php echo $rows['notelpelajar'];?>
        </td>
        <td>
          <?php echo $rows['namaPelajar'];?>
        </td>
        <td>
          <?php echo $rows['namaSyarikat'];?>
        </td>
        <td>
          <?php echo $rows['Alamat'];?>, <?php echo $rows['Alamat2'];?> ,<?php echo $rows['Poskod'];?> , <?php echo $rows['Daerah'];?> ,<?php echo $rows['Negeri'];?>
        </td>
        <td>
          <?php echo $rows['namaPenyelia'];?>
        </td>
        <td>
          <?php echo $rows['notel'];?>
        </td>
      <?php } 
      else{ ?>
        <tbody>
        <td colspan="8">
            <center>TIADA DATA DIPEROLEHI </center>
        </td>
    <?php } ?>
    </tbody>
</table>
 <?php $num = 1;
    $seliaan2 = "SELECT  ojt_pelajar.namaPelajar , ojt_industri.namaSyarikat, ojt_industri.Alamat, ojt_penyelia_industri.namaPenyelia, ojt_penyelia_industri.notel,ojt_industri.Alamat2,ojt_industri.Poskod, ojt_industri.Daerah,ojt_industri.Negeri,ojt_pelajar.program,ojt_pelajar.notelpelajar
                FROM ref_seliaan
                LEFT JOIN ojt_pelajar ON ref_seliaan.nokpPelajar = ojt_pelajar.nokpPelajar
                LEFT JOIN ojt_industri ON ref_seliaan.IDIndustri = ojt_industri.IDIndustri
                LEFT JOIN ojt_penyelia_industri ON ref_seliaan.IDPenyelia = ojt_penyelia_industri.IDPenyelia
                WHERE ref_seliaan.IDPensyarahPPO = $id AND ref_seliaan.status=''";
      $Hasil2 = mysqli_query($con,$seliaan2); ?>
    <h4><b>Sebagai Pensyarah Penyelia OJT (PPO)</b> </h4>
    <table class="table table-striped table-bordered table-hover" id="myData2">
    <thead>
      <tr>
        <th width="20px">
          Bil.
        </th>
        <th width="50px">
          Kelas
        </th>
        <th>
          No telefon pelajar
        </th>
        <th>
          Nama pelajar
        </th>
        <th>
          Nama Syarikat Latihan Industri
        </th>
        <th>
          Alamat Syarikat
        </th>
        <th>
          Nama Penyelia
        </th>
        <th>
          No telefon
        </th>
      </tr>
    </thead>
    <?php if($ppo = mysqli_fetch_array($Hasil2)) {?>
    <tbody>
      <td>
        <?php echo $num++ ?>
      </td>
       <td>
          <?php echo $ppo['program'];?>
        </td>
         <td>
          <?php echo $ppo['notelpelajar'];?>
        </td>
        <td>
          <?php echo $ppo['namaPelajar'];?>
        </td>
        <td>
          <?php echo $ppo['namaSyarikat'];?>
        </td>
        <td>
          <?php echo $ppo['Alamat'];?>, <?php echo $ppo['Alamat2'];?> ,<?php echo $ppo['Poskod'];?> , <?php echo $ppo['Daerah'];?> ,<?php echo $ppo['Negeri'];?>
        </td>
        <td>
          <?php echo $ppo['namaPenyelia'];?>
        </td>
         <td>
          <?php echo $ppo['notel'];?>
        </td>
    <?php } 
      else{ ?>
        <tbody>
        <td colspan="8">
            <center>TIADA DATA DIPEROLEHI </center>
        </td>
    <?php } ?>
    </tbody>
    </table>
<br>
<div align="right">
  <input type="button" value="cetak senarai" id="printpage" onclick="printpage()"></div>
<?php } ?>
</div>
</div>
 <script>
    function printpage() {
    var printpage = document.getElementById("printpage");
    printpage.style.visibility='hidden';
    window.print()
    printpage.style.visibility="visible";
  }
      </script>
</body>
</html>