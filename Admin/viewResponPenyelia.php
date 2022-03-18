<?php include('..\dbcon.php');
  if (isset($_GET['id'])) {
    	$id = $_GET['id'];
		$query = "SELECT ojt_pelajar.namaPelajar ,ojt_pelajar.nokpPelajar,ojt_maklumbalas.Id,ojt_maklumbalas.sebagai,ojt_maklumbalas.mesej,ojt_maklumbalas.Images,ojt_maklumbalas.Images2, ojt_pelajar.kelas, ojt_penyelia_industri.namaPenyelia , ojt_maklumbalas.date,YEAR(`date`)
    FROM ojt_maklumbalas 
    LEFT JOIN ojt_penyelia_industri ON ojt_maklumbalas.IDPenyelia = ojt_penyelia_industri.IDPenyelia
    LEFT JOIN ojt_pelajar ON ojt_maklumbalas.nokpPelajar = ojt_pelajar.nokpPelajar WHERE ojt_maklumbalas.Id='$id'";
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
  width: 90%;

}
.luar
{
  width: 1500px;
  font-family: "Arial", Helvetica, sans-serif;

}
.dalam
{
  width: 1000px;
  padding: 15px;
  font-family: "Arial", Helvetica, sans-serif;
}
p.head {
   font-family: "Times New Roman", Times, serif;
   font-size: 20px;
   text-align: center;

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
  <div align="right"><input type="button" value="CETAK MAKLUMBALAS" id="printpage" onclick="printpage()"></div>
  <div class="luar">
  <div class="dalam">
	<p class="head">  <img src="..\src/logo.jpg" width="150px"><br>
  <b>Kolej Vokasional Perdagangan Johor Bahru</b> <br>
  Jalan Tun Abdul Razak (Susur 7), 81350 Johor Bahru, Johor
  </p><br/><br/><br/>



Tarikh maklumbalas: <?php echo $row['date']; ?><br><br>
Nama Pemaklum : <?php echo $row['namaPenyelia']; ?><br><br>
Nama Pelajar : <?php echo $row['namaPelajar']; ?><br><br>
Kad Pengenalan : <?php echo $row['nokpPelajar']; ?><br><br/> 
Sebagai: <?php echo $row['sebagai']; ?><br><br/> 

<br/><br/><br/> 
<center><u>MAKLUMBALAS PIHAK INDUSTRI TERHADAP PELAJAR OJT</u></center><br>

  <?php echo $row['mesej']; ?></td>
<br/><br/><br/> 
Lampiran/ Gambar : <br/><br/><br/> 
      <img height="280px" src="..\post_images/<?php echo $row['Images'];?>" > 
      <?php if($row){
           if($row['Images2']) 
            {
                     echo "<img height='280px' src='..\post_images/".$row['Images2']."'>";
            }
          
            }

     
      ?> 

<?php } ?>
</div>
</div>
</body>
</html>
