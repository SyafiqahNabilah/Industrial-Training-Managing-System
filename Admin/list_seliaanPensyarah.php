<?php 
	include 'headerAdmin.php';
	   if (isset($_GET['selia'])) {
		$id = $_GET['selia'];
		$query = "SELECT * FROM ojt_pensyarah WHERE IDPensyarahPP = '$id'";
		$result = mysqli_query($con,$query); 
    ?>
    
<div id="page-wrapper">
<div class="row">
<div class="col-lg-12">
<h2 class="page-header">SENARAI SELIAAN PENSYARAH</h2>
	<br>
  <?php while($row = mysqli_fetch_array($result)){ 
 	$idpensyarah = $row['IDPensyarahPP'];
  	$seliaan = "SELECT ojt_pelajar.namaPelajar , ojt_industri.namaSyarikat, ojt_industri.Alamat, ojt_penyelia_industri.namaPenyelia,ojt_penyelia_industri.notel
  	FROM ref_seliaan
  	LEFT JOIN ojt_pelajar ON ref_seliaan.nokpPelajar = ojt_pelajar.nokpPelajar
  	LEFT JOIN ojt_industri ON ref_seliaan.IDIndustri = ojt_industri.IDIndustri
   	LEFT JOIN ojt_penyelia_industri ON ref_seliaan.IDPenyelia = ojt_penyelia_industri.IDPenyelia
  	WHERE ref_seliaan.IDPensyarahPP = $idpensyarah AND ref_seliaan.status=''";
  	$Hasil = mysqli_query($con,$seliaan); ?>
  	<h4><b>SEBAGAI PENSYARAH PENILAI (PP)</b></h4>
	<table class="table table-striped table-bordered table-hover" id="myData">
		<thead>
			<tr>
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
					No telefon penyelia
				</th>
			</tr>
		</thead>
		<?php while ($rows = mysqli_fetch_array($Hasil)) {?>
		<tbody>
				<td>
					<?php echo $rows['namaPelajar'];?>
				</td>
				<td>
					<?php echo $rows['namaSyarikat'];?>
				</td>
				<td>
					<?php echo $rows['Alamat'];?>
				</td>
				<td>
					<?php echo $rows['namaPenyelia'];?>
				</td>
				<td>
					<?php echo $rows['notel'];?>
				</td>
			<?php  }  ?>
		</tbody>
		</table>
		<?php $seliaan2 = "SELECT ojt_pelajar.namaPelajar , ojt_industri.namaSyarikat, ojt_industri.Alamat, ojt_penyelia_industri.namaPenyelia,ojt_penyelia_industri.notel
						  	FROM ref_seliaan
						  	LEFT JOIN ojt_pelajar ON ref_seliaan.nokpPelajar = ojt_pelajar.nokpPelajar
						  	LEFT JOIN ojt_industri ON ref_seliaan.IDIndustri = ojt_industri.IDIndustri
						   	LEFT JOIN ojt_penyelia_industri ON ref_seliaan.IDPenyelia = ojt_penyelia_industri.IDPenyelia
						  	WHERE ref_seliaan.IDPensyarahPPO = '$idpensyarah' AND ref_seliaan.status=''";
  		$Hasil2 = mysqli_query($con,$seliaan2); ?>
		<h4><b>SEBAGAI PENSYARAH PENYELIA OJT(PPO)</b> </h4>
		<table class="table table-striped table-bordered table-hover" id="myData2">
		<thead>
			<tr>
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
		<?php while ($ppo = mysqli_fetch_array($Hasil2)) {?>
		<tbody>
				<td>
					<?php echo $ppo['namaPelajar'];?>
				</td>
				<td>
					<?php echo $ppo['namaSyarikat'];?>
				</td>
				<td>
					<?php echo $ppo['Alamat'];?>
				</td>
				<td>
					<?php echo $ppo['namaPenyelia'];?>
				</td>
				<td>
					<?php echo $ppo['notel'];?>
				</td>
			<?php  }  ?>
		</tbody>
		</table>
		<div align="right"><a href="printList_seliaanPensyarah.php?filterPensyarah=<?php echo $row['IDPensyarahPP'];}}?>" style="text-decoration: none;" class="navbar-form navbar-right" target= "_blank"><img src="../src/Printer.png" width="40px" ></a><br>&nbsp;&nbsp;&nbsp;</a></div>
		<script>
		  $(document).ready(function(){
		    $('#myData').DataTable();
		  });
		   $(document).ready(function(){
		    $('#myData2').DataTable();
		  });
  		</script>
	</div>
	</div>
	</body>
