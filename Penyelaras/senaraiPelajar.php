<?php include 'header-penyelaras.php';
    	$check = $_SESSION['login_user'];
        $sql = "SELECT * FROM ojt_pensyarah WHERE username='$check'";
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_array($result);
		$id = $row['IDPensyarahPP'];
		$query = "SELECT * FROM `ojt_pensyarah` WHERE IDPensyarahPP='$id'";
		$resultselia = mysqli_query($con,$query);
		$rows = mysqli_fetch_array($resultselia);
		$pro = $rows['Program'];
   	$sql = "SELECT * FROM `OJT_Pelajar` WHERE Tahun='5' AND `program` LIKE '%$pro%' AND status=''";
	$infopelajar = mysqli_query($con,$sql); 
   ?>
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
		<h2 class="page-header">Senarai Pelajar Program <?php echo $pro ?></h2>
		</div>
	</div>
	<div class="row">
	<div class="col-lg-12 col-md-12">
		<div class = "alert alert-info">
		Memaparkan senarai pelajar yang sedang menjalani Latihan Industri. <br>
		1. Klik pada <b>"Kemaskini maklumat"</b> untuk mengemaskini maklumat peribadi.<br>
		2. Klik pada <b>"Tambah Seliaan"</b> untuk melakukan kemaskini terhadap seliaan pelajar.<br>
		3. Klik pada <b>"Tamat seliaan"</b> untuk menamatkan seliaan pelajar tersebut.
		</div>
<br>
<table class="table table-striped table-bordered table-hover" id="myData">
<thead>
	<tr>
		<th>
			Bil.
		</th>
		<th>
			Kelas
		</th>
		<th>
			Nama pelajar
		</th>
		<th>
			Angka Giliran
		</th>
		<th>
			Kursus
		</th>
		<th>
			Tindakan
		</th>
	</tr>
</thead>
<tbody>
	<?php
		$num = 1;
		while($row = mysqli_fetch_array($infopelajar)){ ?>
	<tr>
	
		<td>
			<?php echo $num++ ?>
		</td>
		<td>
			<?php echo $row['kelas'];?>
		</td>
		<td>
			<?php echo $row['namaPelajar'];?>
		</td>
		<td>
			<?php echo $row['AngkaGiliran'];?>
		</td>
		<td>
			<?php echo $row['notelPelajar'];?>
		</td>
		<td>
			<center><a class="btn btn-info" href="kemaskiniPelajar.php?kemaskini=<?php echo $row['nokpPelajar'];?>">Kemaskini maklumat</a>
			<a  class="btn btn-danger" href="..\session.php?tamatPenyelaras=<?php echo $row['nokpPelajar'];?>" onclick="return tamatSeliaan()">Tamat Seliaan</a></center>
		</td>
	</tr>
	<?php }?>
	</tbody>
</table>
	<script>
  $(document).ready(function(){
    $('#myData').DataTable().columns()
    .adjust();
  });
  
 function tamatSeliaan(){
      var x = confirm("Anda pasti mahu menamatkan seliaan pelajar ini?");

      if(x==true)
      {
        return true;
      }
      else
      {
        return false;
      }
    }
  </script>

</div>
</div>
</div>
</body>
</html>