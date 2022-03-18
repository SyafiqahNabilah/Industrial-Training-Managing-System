<?php 	
include 'header-penyelaras.php';
	$check = $_SESSION['login_user'];
	$sql = "SELECT * FROM `ojt_pensyarah` WHERE username='$check'";
	$result= mysqli_query($con,$sql);
	while($rows = mysqli_fetch_array($result)){
	$id  = $rows['IDPensyarahPP'];
	$sql2 = "SELECT ojt_pelajar.namaPelajar , ojt_pelajar.nokpPelajar , ojt_pelajar.notelPelajar,ojt_pelajar.Kohort,ref_seliaan.Status,ref_seliaan.TahunSeliaan
						  	FROM ref_seliaan
						  	LEFT JOIN ojt_pelajar ON ref_seliaan.nokpPelajar = ojt_pelajar.nokpPelajar
						  	LEFT JOIN ojt_industri ON ref_seliaan.IDIndustri = ojt_industri.IDIndustri
						   	LEFT JOIN ojt_penyelia_industri ON ref_seliaan.IDPenyelia = ojt_penyelia_industri.IDPenyelia 
						   	WHERE IDPensyarahPP ='$id' AND ref_seliaan.Status= 'SELIAAN TAMAT' OR IDPensyarahPPO ='$id' AND ref_seliaan.Status= 'SELIAAN TAMAT'";
	$infopelajar2 = mysqli_query($con,$sql2); ?>

	<div id="page-wrapper">
<div class="row">
	<div class="col-lg-12">
		<h2 class="page-header">Senarai Pelajar Telah Tamat Seliaan</h2>
		<h4>Memaparkan senarai pelajar yang <b> telah tamat OJT</b> . Klik pada "Maklumat Pelajar" untuk melihat maklumat peribadi pelajar.</h4><br><br/>
		<?php 	$sql2 = "SELECT ojt_pelajar.namaPelajar , ojt_pelajar.nokpPelajar , ojt_pelajar.notelPelajar,ojt_pelajar.Kohort,ref_seliaan.Status,ref_seliaan.TahunSeliaan,ojt_pelajar.kelas,ojt_pelajar.program
						  	FROM ref_seliaan
						  	LEFT JOIN ojt_pelajar ON ref_seliaan.nokpPelajar = ojt_pelajar.nokpPelajar
						  	LEFT JOIN ojt_industri ON ref_seliaan.IDIndustri = ojt_industri.IDIndustri
						   	LEFT JOIN ojt_penyelia_industri ON ref_seliaan.IDPenyelia = ojt_penyelia_industri.IDPenyelia 
						   	WHERE IDPensyarahPP ='$id' AND ref_seliaan.Status= 'SELIAAN TAMAT' OR IDPensyarahPPO ='$id' AND ref_seliaan.Status= 'SELIAAN TAMAT'";
	$infopelajar2 = mysqli_query($con,$sql2); ?>
		<table class="table table-striped table-bordered table-hover" id="myData4">
		<thead>
			<tr>
				<th>
					Bil.
				</th>
				<th>
					Tahun Seliaan
				</th>
				<th>
					Kelas
				</th>
				<th>
					Nama pelajar
				</th>
				<th>
					Kohort
				</th>
				<th>
					No Kad Pengenalan
				</th>
				<th>
					No Telefon
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
				while($row = mysqli_fetch_array($infopelajar2)){ ?>
				<td>
					<?php echo $num++?>
				</td>
				<td>
					<?php echo $row['TahunSeliaan'];?>
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
					<center><a class="btn btn-success" href="maklumatPelajar.php?maklumat=<?php echo $row['nokpPelajar'];?>">Maklumat Pelajar</a>
					</center>
				</td>
			</tr>
			<?php } }?>
		</tbody>
		</table>
		<script>
		  $(document).ready(function(){
		    $('#myData4').DataTable();
		  });
  		</script>
  		<br>
</div>
</div>
</body>