<?php include 'header-penyelia.php';
   	$check = $_SESSION['login_user'];
	$penyelia = "SELECT * FROM ojt_penyelia_industri WHERE username ='$check'";
	$result = mysqli_query($con,$penyelia);
	while($rows = mysqli_fetch_array($result)){
	$id  = $rows['IDPenyelia'];
	$idI  = $rows['IDIndustri'];
	 $sql2 = "SELECT ojt_pelajar.namaPelajar , ojt_pelajar.nokpPelajar , ojt_pelajar.notelPelajar
						  	FROM ref_seliaan
						  	LEFT JOIN ojt_pelajar ON ref_seliaan.nokpPelajar = ojt_pelajar.nokpPelajar
						  	LEFT JOIN ojt_industri ON ref_seliaan.IDIndustri = ojt_industri.IDIndustri
						   	LEFT JOIN ojt_penyelia_industri ON ref_seliaan.IDPenyelia = ojt_penyelia_industri.IDPenyelia WHERE ref_seliaan.IDIndustri = '$idI'";

	$infopelajar2 = mysqli_query($con,$sql2); ?><div id="page-wrapper">
<div class="row">
	<div class="col-lg-12">
		<h2 class="page-header">Senarai Pelajar di Organisasi </h2>
	</div>
	Memaparkan senarai pelajar yang sedang menjalankan OJT di syarikat Penyelia <br><br/>
		<table class="table table-striped table-bordered table-hover" id="myData">
		<thead>
			<tr>
				<th>
					Bil.
				</th>
				<th>
					Nama pelajar
				</th>
				<th>
					No Kad Pengenalan
				</th>
				<th>
					No Telefon
				</th>
				<th>
					
				</th>
			</tr>
		</thead>
		<tbody>
			<tr>
			<?php 
				$num = 1;	
				while($row = mysqli_fetch_array($infopelajar2)){ ?>
				<td>
					<?php echo $num++?>
				</td>
				<td>
					<?php echo $row['namaPelajar'];?>
				</td>
				<td>
					<?php echo $row['nokpPelajar'];?>
				</td>
				<td>
					<?php echo $row['notelPelajar'];?>
				</td>
				<td>
					<center><button class="btn btn-default"><a href="maklumatPelajar.php?maklumat=<?php echo $row['nokpPelajar'];?>">Maklumat Pelajar</a></button>
					</center>
				</td>
			</tr>
		</tbody>
			<?php } }?>
		</table>
		<script>
		  $(document).ready(function(){
		    $('#myData2').DataTable();
		  });
		  $(document).ready(function(){
		    $('#myData').DataTable();
		  });
  		</script>
  		<br>
</div>
</div>
</body>