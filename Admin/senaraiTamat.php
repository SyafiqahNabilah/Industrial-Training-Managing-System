<?php include 'headerAdmin.php';   
   	$sql = "SELECT ojt_pelajar.namaPelajar, ojt_pelajar.program,ojt_pelajar.kelas,ojt_pelajar.nokpPelajar, ojt_pelajar.AngkaGiliran, ojt_pelajar.notelPelajar,ojt_pelajar.kelas,ojt_pelajar.Kohort
		   	FROM `ref_seliaan`
		   	LEFT JOIN ojt_pelajar ON ref_seliaan.nokpPelajar = ojt_pelajar.nokpPelajar 
		   	WHERE ref_seliaan.status='SELIAAN TAMAT'";
	$infopelajar = mysqli_query($con,$sql); 
   ?>
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
		<h2 class="page-header">Senarai Pelajar Latihan Industri Tamat Seliaan </h2>
		</div>
	</div>
	<div class="row">
	<div class="col-lg-12 col-md-12">
		<div class = "alert alert-info">
		 Memaparkan senarai pelajar yang telah tamat Latihan Industri. Klik pada "Maklumat Pelajar" untuk melihat maklumat peribadi.<br>
		</div>
<br>
<table class="table table-striped table-bordered table-hover" id="myData">
<thead>
	<tr>
		<th>
			Bil.
		</th>
		<th>
			Program
		</th>
		<th>
			Nama pelajar
		</th>
		<th>
			Kohort
		</th>
		<th>
			No kad pengenalan 
		</th>
		<th>
			No telefon 
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
		
			<?php echo $row['Kohort'];?>
		</td>
		<td>
			<?php echo $row['nokpPelajar'];?>
		</td>

		<td>
			<?php echo $row['notelPelajar'];?>
		</td>
		<td>
			<center><a class="btn btn-warning" href="maklumatPelajar.php?maklumat=<?php echo $row['nokpPelajar'];?>">Maklumat Pelajar</a>
			</center>

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
</div>
</div>
</body>
</html>