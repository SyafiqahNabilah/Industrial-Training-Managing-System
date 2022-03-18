<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
		<h2 class="page-header">Senarai Seliaan Mengikut Pelajar </h2>
	<div class = "alert alert-info">
		Memaparkan senarai pelajar berserta pensyarah yang menjadi PO dan PPO serta tempat industri. <br>
		Sekiranya nama pelajar tiada dalam senarai sila tetapkan seliaan pada menu senarai pelajar OJT. Klik pada kemaskini seliaan untuk mengemaskini seliaan	
	</div>
	<button class="btn btn-success"><a href="exportToexcel_listPelajar.php" style="color: white;">Download Senarai Seliaan Pelajar OJT sebagai Excel</a></button>
<br><br/>
		<table class= "table table-striped table-bordered table-hover"  id="dataTables-example">
		<thead>
			<tr>
				<th>
					Bil.
				</th>
				<th>
					Nama pelajar
				</th>
				<th>
					Kursus
				</th>
				<th>
					Nama PP
				</th>
				<th>
					Nama PPO
				</th>
				<th>
					Nama Tempat Latihan Organisasi
				</th>
				<th>
					Nama Penyelia di tempat Organisasi
				</th>
				<th>
					Tindakan 
				</th>
			</tr>
		</thead>
		<tbody>
	<?php $num = 1;
	while($row = mysqli_fetch_array($pelajar)){
		$id = $row['nokpPelajar'];
		$sql2 = "SELECT ojt_pensyarah.namaPensyarah
				FROM ref_seliaan
				JOIN ojt_pensyarah ON ref_seliaan.IDPensyarahPPO = ojt_pensyarah.IDPensyarahPP
				WHERE ref_seliaan.nokpPelajar = '$id'";
		$infopelajar2 = mysqli_query($con,$sql2);
		while($row2 = mysqli_fetch_array($infopelajar2)){
		?> 
		<tr>
			<td>
				<?php echo $num++ ?>
			</td>
			<td>
				<?php echo $row['namaPelajar'];?>
			</td>
			<td>
				<?php echo $row['program'];?>
			</td>
			<td>
				<?php echo $row['Pensyarah1'];?>
			</td>
			<td>
				<?php echo $row2['namaPensyarah'];?>
			</td>
			<td>
				<?php echo $row['namaSyarikat'];?>
			</td>
			<td>
				<?php echo $row['namaPenyelia'];?>
			</td>
			<td>
				<a class="btn btn-default" href="kemaskiniSeliaan.php?kemaskiniSeliaan=<?php echo $row['nokpPelajar'];?>">Kemaskini Seliaan</a>
				
			</td>
		</tr>
		<?php } } ?>
	</tbody>
	</table>
</div>
</div>
</div>
<script>
  $(document).ready(function(){
    $('#dataTables-example').DataTable();
  });
</script>
</div>
