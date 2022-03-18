<?php include 'headerAdmin.php';
   	$sql = "SELECT*FROM ojt_pelajar
		   	WHERE ojt_pelajar.Tahun='5' AND ojt_pelajar.status=''";
	$infopelajar = mysqli_query($con,$sql); 

   ?>
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
		<h2 class="page-header">Senarai Pelajar Latihan Industri Semasa</h2>
		</div>
	</div>
	<div class="row">
	<div class="col-lg-12 col-md-12">
		<div class = "alert alert-info">
		Memaparkan senarai pelajar yang sedang menjalani Latihan Industri. <br>
		1. Klik pada <b>"Kemaskini maklumat"</b> untuk mengemaskini maklumat peribadi.<br>
		2. Klik pada <b>"Tamat seliaan"</b> untuk menamatkan seliaan pelajar tersebut.

		</div>
		<button class="btn btn-success"><a href="senarai1.php" style="color: white;">Download Senarai Pelajar OJT sebagai Excel</a></button>
<br><br/>
<table class="table table-striped table-bordered table-hover" id="myData">
<thead>
	<tr>
		<th>
			Bil.
		</th>
		<th>
			Kursus
		</th>
		<th>
			Nama pelajar
		</th>
		<th>
			Angka Giliran
		</th>
		<th>
			No Kad Pengenalan
		</th>
		<th>
			Tindakan
		</th>
	</tr>
</thead>
<tbody>
	<tr>
	<?php
		$num = 1;
		while($row = mysqli_fetch_array($infopelajar)){ ?>
		<td>
			<?php echo $num++ ?>
		</td>
		<td>
			<?php echo $row['program']." ".$row['kelas'];?>
		</td>
		<td>
			<?php echo $row['namaPelajar'];?>
		</td>
		<td>
			<?php echo $row['AngkaGiliran'];?>
		</td>
		<td>
			<?php echo $row['nokpPelajar'];?>
		</td>
		<td>
			<center><a class="btn btn-info" href="kemaskiniPelajar.php?kemaskini=<?php echo $row['nokpPelajar'];?>">Kemaskini maklumat</a>	
			<a  class="btn btn-danger" href="..\session.php?tamat=<?php echo $row['nokpPelajar'];?>" onclick="return tamatSeliaan()">Tamat Seliaan</a></center>
		</td>
	</tr>
	<?php }?>
	</tbody>
</table>
	<script>
  $(document).ready(function(){
    $('#myData').DataTable();
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