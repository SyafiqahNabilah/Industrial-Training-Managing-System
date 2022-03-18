<?php include 'header-pensyarah.php';
		$check = $_SESSION['login_user'];
	$sql = "SELECT * FROM `ojt_pensyarah` WHERE username='$check'";
	$result= mysqli_query($con,$sql);?>
<div id="page-wrapper">
<div class="row">
<div class="col-lg-12">
    <h2 class="page-header">Senarai Seliaan Semasa</h2>
</div>
</div>
<?php while($row=mysqli_fetch_array($result)){
	$idpensyarah = $row['IDPensyarahPP'];
  	$seliaan = "SELECT ojt_pelajar.namaPelajar , ojt_industri.namaSyarikat, ojt_industri.Alamat, ojt_penyelia_industri.namaPenyelia,ojt_pelajar.nokpPelajar,ojt_pelajar.program,ojt_pelajar.kelas
  	FROM ref_seliaan
  	LEFT JOIN ojt_pelajar ON ref_seliaan.nokpPelajar = ojt_pelajar.nokpPelajar
  	LEFT JOIN ojt_pensyarah ON ref_seliaan.IDPensyarahPP = ojt_pensyarah.IDPensyarahPP
  	LEFT JOIN ojt_industri ON ref_seliaan.IDIndustri = ojt_industri.IDIndustri
   	LEFT JOIN ojt_penyelia_industri ON ref_seliaan.IDPenyelia = ojt_penyelia_industri.IDPenyelia
  	WHERE ref_seliaan.IDPensyarahPP = $idpensyarah AND ref_seliaan.status = ''";
  	$Hasil = mysqli_query($con,$seliaan); ?>

<div class="row">
  	<div class = "alert alert-info">Memaparkan senarai seliaan bagi pensyarah. Klik pada <img src="../src/Printer.png" width="20px" >untuk mencetak senarai. </div>
  	<h4><b>SEBAGAI PENSYARAH PENYELIA (PP)</b></h4>
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
					Kursus
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
					Tindakan
				</th>
			</tr>
		</thead>

		<?php 
		$num = 1;
		while ($rows = mysqli_fetch_array($Hasil)) {?>
		<tbody>
			<tr>
				<td>
					<?php echo $num++ ?>
				</td>
				<td>
					<?php echo $rows['namaPelajar'];?>
				</td>
				<td>
					<?php echo $rows['program'].$rows['kelas'];?>
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
					<center><a class="btn btn-success" href="maklumatPelajar.php?maklumat=<?php echo $rows['nokpPelajar'];?>">Maklumat Pelajar</a>
					</center>
				</td>
			</tr>
			<?php  }  ?>
		</tbody>
		</table>
		<?php $seliaan2 = "SELECT ojt_pelajar.namaPelajar , ojt_industri.namaSyarikat, ojt_industri.Alamat, ojt_penyelia_industri.namaPenyelia,ojt_pelajar.nokpPelajar,ojt_pelajar.program,ojt_pelajar.kelas
						  	FROM ref_seliaan
						  	LEFT JOIN ojt_pelajar ON ref_seliaan.nokpPelajar = ojt_pelajar.nokpPelajar
						  	LEFT JOIN ojt_industri ON ref_seliaan.IDIndustri = ojt_industri.IDIndustri
						  	LEFT JOIN ojt_pensyarah ON ref_seliaan.IDPensyarahPPO = ojt_pensyarah.IDPensyarahPP
						   	LEFT JOIN ojt_penyelia_industri ON ref_seliaan.IDPenyelia = ojt_penyelia_industri.IDPenyelia
						  	WHERE ref_seliaan.IDPensyarahPPO = $idpensyarah AND ref_seliaan.status =''";
  	$Hasil2 = mysqli_query($con,$seliaan2); ?>
		<h4><b>SEBAGAI PENSYARAH PENYELIA OJT (PPO) </b> </h4>
		<table class="table table-striped table-bordered table-hover" id="myData2">
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
					Nama Syarikat Latihan Industri
				</th>
				<th>
					Alamat Syarikat
				</th>
				<th>
					Nama Penyelia
				</th>
				<th>
					Tindakan
				</th>
			</tr>
		</thead>
		<tbody>
		<?php 
		$num = 1; 
		while ($ppo = mysqli_fetch_array($Hasil2)) {?>
			<tr>
				<td>
					<?php echo $num++ ?>
				</td>
				<td>
					<?php echo $ppo['namaPelajar'];?>
				</td>
				<td>
					<?php echo $ppo['program'].$ppo['kelas'];?>
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
					<center><a class="btn btn-success" href="maklumatPelajar.php?maklumat=<?php echo $ppo['nokpPelajar'];?>">Maklumat Pelajar</a>
					</center>
				</td>
			</tr>
			<?php  } ?>
		</tbody>
		</table>
		<div align="right"><a href="printListPelajar.php?cetak=<?php echo $row['IDPensyarahPP'];}?>" style="text-decoration: none;" class="navbar-form navbar-right" target= "_blank"><img src="../src/Printer.png" width="40px" ></a><br>&nbsp;&nbsp;&nbsp;</a></div>
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