<?php
if (isset($_GET['maklumat'])) {
    $nokp = $_GET['maklumat'];
    $sql = "SELECT * FROM `OJT_Pelajar` WHERE nokpPelajar = '$nokp'";
    $resultpelajar = mysqli_query($con,$sql);
    while($row = mysqli_fetch_array($resultpelajar)){ 
        ?>
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
		<h2>Maklumat Pelajar Yang Telah Tamat Seliaan</h2>
		
		
		</div>
	</div>
	<div class="row">
	<div class="col-lg-10 col-md-10">
	<ul class="nav nav-tabs">
	    <li class="active"><a data-toggle="tab" href="#home">Maklumat Peribadi Pelajar</a></li>
	    <li><a data-toggle="tab" href="#menu1">Maklumat Seliaan </a></li>
	</ul>
	<div class="tab-content">
    <div id="home" class="tab-pane fade in active">
    <h2>Maklumat Peribadi Pelajar</h2>
		<table class="table table-striped table-bordered table-hover">
		<tr>
			<td width="40%">
				Nama Penuh Pelajar :
			</td>
			<td width="60%">
			<?php echo $row['namaPelajar'];?>
			</td>
	</tr>
	<tr>
		<td>
			No Kad Pengenalan :
		</td>
		<td>
			<?php echo $row['nokpPelajar'];?>
		</td>
	</tr>
	<tr>
		<td>
			Angka Giliran :
		</td>
		<td>
			<?php echo $row['AngkaGiliran'];?>
		</td>
	</tr>
	<tr>
		<td>
			Kohort :
		</td>
		<td>
			<?php echo $row['Kohort'];?>
		</td>
	</tr>
	<tr>
		<td>
			Program :
		</td>
		<td>
			<?php echo $row['program'];?>
		</td>
	</tr>
	<tr>
		<td>
			Agama:
		</td>
		<td>
				<?php echo $row['agama'];?>
		</td>
	</tr>
	<tr>
		<td>
			Jantina:
		</td>
		<td>
			<?php echo $row['jantina'];?>
		</td>
	</tr>
	<tr>
		<td>
			No telefon:
		</td>
		<td>
			<?php echo $row['notelPelajar'];?>
		</td>
	</tr>
	<tr>
		<td>
			Alamat :
		</td>
		<td>
			<?php echo $row['alamat'];?>
			<?php echo $row['alamat2'];?>
		</td>
	</tr>
	<tr>
		<td>
			Poskod:
		</td>
		<td>
			<?php echo $row['poskod'];?>
		</td>
	</tr>
	<tr>
		<td>
			Daerah:
		</td>
		<td>
			<?php echo $row['daerah'];?>
		</td>
	</tr>
	<tr>
		<td>
			Negeri :
		</td>
		<td>
			<?php echo $row['negeri'];?>
		</td>
	</tr>
	<tr>
		<td>
			Kecacatan jika ada :
		</td>
		<td>
		<?php echo $row['kecacatan'];?>
	
		</td>
	</tr>
	<tr>
		<td>
			Nama ibubapa/penjaga
		</td>
		<td>
			<?php echo $row['namaPenjaga'];?>
		</td>
	</tr>
	<tr>
		<td>
			Pekerjaan bapa :
		</td>
		<td>
			<?php echo $row['kerjaBapa'];?>
		</td>
	</tr>
	<tr>
		<td>
			Pendapatan Bapa :
		</td>
		<td>
			<?php echo $row['gajiBapa'];?>
		</td>
	</tr>
	<tr>
		<td>
			Nama ibu :
		</td>
		<td>
			<?php echo $row['namaIbu'];?>
		</td>
	</tr>
	<tr>
		<td>
			Pekerjaan ibu :
		</td>
		<td>
			<?php echo $row['kerjaIbu'];?>
		</td>
	</tr>
	<tr>
		<td>
			Pendapatan Ibu :
		</td>
		<td>
			<?php echo $row['gajiIbu'];?>
		</td>
	</tr>
	<tr>
		<td>
			Bil. tanggungan :
		</td>
		<td>
			<?php echo $row['Bil_tanggung'];?>
		</td>
	</tr>
	<tr>
		<td>
			No tel untuk dihubungi jika ada kecemasan :
		</td>
		<td>
			<?php echo $row['notelWaris'];?>"
		</td>
	</tr>
</table>
<?php } }?>
</div>
<div id="menu1" class="tab-pane fade">
<?php if (isset($_GET['maklumat'])) {
		$nokp = $_GET['maklumat'];
		$sql2 = "SELECT ojt_pensyarah.namaPensyarah AS Pensyarah1 ,ojt_industri.namaSyarikat, ojt_penyelia_industri.namaPenyelia,ojt_industri.IDIndustri
		   	FROM `ref_seliaan`
		   	LEFT JOIN ojt_pensyarah ON ref_seliaan.IDPensyarahPP = ojt_pensyarah.IDPensyarahPP  
		   	LEFT JOIN ojt_industri ON ref_seliaan.IDIndustri = ojt_industri.IDIndustri
		   	LEFT JOIN ojt_penyelia_industri ON ref_seliaan.IDPenyelia = ojt_penyelia_industri.IDPenyelia
		   	WHERE nokpPelajar = '$nokp'";
		$resultpelajar2 = mysqli_query($con,$sql2);
		while($row = mysqli_fetch_array($resultpelajar2)){ 

		$sql3 = "SELECT ojt_pensyarah.namaPensyarah
				FROM ref_seliaan
				JOIN ojt_pensyarah ON ref_seliaan.IDPensyarahPPO = ojt_pensyarah.IDPensyarahPP
				WHERE ref_seliaan.nokpPelajar = '$nokp'";
		$infopelajar3 = mysqli_query($con,$sql3);
		while($row3 = mysqli_fetch_array($infopelajar3)){?>
    <h2>Maklumat Seliaan Pelajar</h2>
		<table class="table table-striped table-bordered table-hover">
		<tr>
			<td width="40%">
				Nama Pensyarah Penilai :
			</td>
			<td width="60%">
			<?php echo $row['Pensyarah1'];?>
			</td>
	</tr>
	<tr>
		<td>
			Nama Pensyarah Penyelia OJT :
		</td>
		<td>
			<?php echo $row3['namaPensyarah'];}?>
		</td>
	</tr>
	<tr>
		<td>
			Nama Organisasi :
		</td>
		<td>
			<a href="kemaskiniIndustri.php?kemaskiniIndustri=<?php echo $row['IDIndustri'];?>"><?php echo $row['namaSyarikat'];?></a>
		</td>
	</tr>
	<tr>
		<td>
			Nama Penyelia Organisasi :
		</td>
		<td>
			<?php echo $row['namaPenyelia'];?>
		</td>
	</tr>
	</table>
	<?php }} ?>
</div>
 </div>
<br>

</div>
</div>
</div>
</body>