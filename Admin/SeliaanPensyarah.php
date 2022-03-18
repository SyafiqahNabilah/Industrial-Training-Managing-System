<?php include 'headerAdmin.php';
   $sql = "SELECT * FROM ojt_pensyarah ORDER BY namaPensyarah ASC";
   $infopensyarah = mysqli_query($con,$sql); 
?>
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h2 class="page-header">Senarai Pensyarah dan Seliaan</h2>
			<div class = "alert alert-info">Memaparkan senarai pensyarah yang terlibat dalam Program OJT. Sila klik pada "Lihat seliaan untuk memelihat senarai pelajar yang diselia oleh pensyarah.</div>

		</div>
	</div>
<div class="row">
	<div class="col-lg-12 col-md-12">	
<table class="table table-striped table-bordered table-hover" id="CariPensyarah">
<thead>
	<tr>
		<th>
		Bil.
		</th>
		<th>
			Nama Pensyarah
		</th>
		<th>
			Jawatan
		</th>
		<th>
			Jabatan
		</th>
		<th>
			Action
		</th>
	</tr>
</thead>
<tbody>
	<tr>
	<?php
		$num = 1;
		while($row = mysqli_fetch_array($infopensyarah)){ ?>
		<td>
			<?php echo $num++ ?>
		</td>
		<td>
			<?php echo $row['namaPensyarah'];?>
		</td>
		<td>
			<?php echo $row['jawatan'];?>
		</td>
		<td>
			<?php echo $row['jabatan'];?>
		</td>
		<td>
			<center><a class="btn btn-default" href="list_seliaanPensyarah.php?selia=<?php echo $row['IDPensyarahPP'];?>">Lihat Seliaan</a></center>
		</td>
	</tr>
	<?php }?>
	</tbody>
</table>
<script>
  	$(document).ready(function(){
    $('#CariPensyarah').DataTable();
  });
  </script>
</div>
</div>
</div>
</Body>