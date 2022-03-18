<?php 

if (isset($_GET['kemaskini'])) {
		$nokp = $_GET['kemaskini'];
		$sql = "SELECT * FROM `ojt_pelajar` WHERE nokpPelajar='$nokp'";
		$resultpelajar = mysqli_query($con,$sql); } 
		while($row = mysqli_fetch_array($resultpelajar)){
?>
<div id="page-wrapper">
<div class="row">
		<div class="col-lg-12">
				<h2 class="page-header">Kemaskini Maklumat Pelajar</h2>
		</div>
	</div>
<div class="row">
	<div class="col-lg-6 col-md-6">
    <h4>Maklumat Peribadi Pelajar</h4>
	<form action="" method="post">
	<table class="table table-striped table-bordered table-hover">
		<tr>
			<th colspan="2" >
				Borang Maklumat Peribadi Pelajar
			</th>
		</tr>
		<tr>
			<td width="40%">
				Nama Penuh Pelajar :
			</td>
			<td width="60%">
			<input type='text' name='namaPelajar' size="35" class="form-control" value="<?php echo $row['namaPelajar'];?>"/>
			</td>
	</tr>
	<tr>
		<td>
			No Kad Pengenalan :
		</td>
		<td>
			<input type='text' name='nokpPelajar' class="form-control" value="<?php echo $row['nokpPelajar'];?>"/>
		</td>
	</tr>
	<tr>
		<td>
			Angka Giliran :
		</td>
		<td>
			<input type='text' name='AngkaGiliran' class="form-control" value="<?php echo $row['AngkaGiliran'];?>"/>
		</td>
	</tr>
	<tr>
		<td>
			Kohort :
		</td>
		<td>
			<input type='text' name='Kohort' class="form-control" value="<?php echo $row['Kohort'];?>"/>
		</td>
	</tr>
	<tr>
		<td>
			Agama:
		</td>
		<td>
			<select name="agama"  class="form-control">
				<option value="<?php echo $row['agama'];?>"><?php echo $row['agama'];?></option>
				<option>- Pilih -</option>
				<option value="Buddha">Buddha</option>
				<option value="Islam">Islam</option>
				<option value="Hindu">Hindu</option>
				<option value="Kristian">Kristian</option>
				<option value="lain-lain">Lain-lain</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>
			Jantina:
		</td>
		<td>
			<select name="jantina" class="form-control">
				<option value="<?php echo $row['jantina'];?>"><?php echo $row['jantina'];?></option>
				<option>- Pilih -</option>
				<option value="Lelaki">Lelaki</option>
				<option value="Perempuan">Perempuan</option>

			</select>
		</td>
	</tr>
	<tr>
		<td>
			No telefon: 
		</td>
		<td>
			<input type='text' name='notelPelajar' class="form-control" value="<?php echo $row['notelPelajar'];?>"/>
		</td>
	</tr>
	<tr>
		<td>
			Alamat :
		</td>
		<td>
			<input type='text' size="50" name='alamat' class="form-control" value="<?php echo $row['alamat'];?>"></textarea><br>
			<input type='text' size="50" name='alamat2' class="form-control" value="<?php echo $row['alamat2'];?>"></textarea>
		</td>
	</tr>
	<tr>
		<td>
			Poskod:
		</td>
		<td>
			<input type='text' name='poskod' class="form-control" value="<?php echo $row['poskod'];?>"/>
		</td>
	</tr>
	<tr>
		<td>
			Negeri :
		</td>
		<td>
		<select name="negeri" class="form-control">
		<option value="<?php echo $row['negeri']?>"><?php echo $row['negeri']?></option>
		<?php $sql = mysqli_query($con, "SELECT * FROM ojt_negeri ORDER BY namaNegeri ASC");
			  $row2 = mysqli_num_rows($sql);?>
			  <option>- Pilih Syarikat -</option>
			 <?php while ($row2=mysqli_fetch_assoc($sql)) {
              echo '<option value="'.$row2['namaNegeri'].'">'.$row2['namaNegeri'].'</option>';}?>
		</select>
		</td>
	</tr>
	<tr>
		<td>
			Daerah:
		</td>
		<td>
		<select name="daerah" class="form-control">
		<option value="<?php echo $row['daerah']?>"><?php echo $row['daerah']?></option>
		<?php $sql = mysqli_query($con, "SELECT * FROM ojt_daerah ORDER BY namaDaerah ASC");
			  $row2 = mysqli_num_rows($sql);?>
			  <option>- Pilih Syarikat -</option>
			 <?php while ($row2=mysqli_fetch_assoc($sql)) {
              echo '<option value="'.$row2['namaDaerah'].'">'.$row2['namaDaerah'].'</option>';}?>
		</select>
		</td>
	</tr>
	<tr>
		<td>
			Kecacatan jika ada :
		</td>
		<td>
		<select name="kecacatan" class="form-control">
				<option value="<?php echo $row['kecacatan'];?>"><?php echo $row['kecacatan'];?></option>
				<option>- Pilih -</option>
				<option value="Ada">Ada</option>
				<option value="Tiada">Tiada</option>
		</select>
		</td>
	</tr>
	<tr>
		<td>
			Nama Bapa:
		</td>
		<td>
			<input type='text' name='namaPenjaga' class="form-control" value="<?php echo $row['namaPenjaga'];?>"/>
		</td>
	</tr>
	<tr>
		<td>
			Pekerjaan bapa :
		</td>
		<td>
			<input type='text' name='kerjaBapa' class="form-control" value="<?php echo $row['kerjaBapa'];?>"/>
		</td>
	</tr>
	<tr>
		<td>
			Pendapatan Bapa :
		</td>
		<td>
			<input type='text' name='gajiBapa' class="form-control" value="<?php echo $row['gajiBapa'];?>"/>
		</td>
	</tr>
	<tr>
		<td>
			Nama ibu :
		</td>
		<td>
			<input type='text' name='namaIbu' class="form-control" value="<?php echo $row['namaIbu'];?>"/>
		</td>
	</tr>
	<tr>
		<td>
			Pekerjaan ibu :
		</td>
		<td>
			<input type='text' name='kerjaIbu' class="form-control" value="<?php echo $row['kerjaIbu'];?>"/>
		</td>
	</tr>
	<tr>
		<td>
			Pendapatan Ibu :
		</td>
		<td>
			<input type='text' name='gajiIbu' class="form-control" value="<?php echo $row['gajiIbu'];?>"/>
		</td>
	</tr>
	<tr>
		<td>
			Bil. tanggungan :
		</td>
		<td>
			<input type='text' name='Bil_tanggung' class="form-control" value="<?php echo $row['Bil_tanggung'];?>"/>
		</td>
	</tr>
	<tr>
		<td>
			No tel untuk dihubungi jika ada kecemasan :
		</td>
		<td>
			<input type='text' name='notelWaris' class="form-control" value="<?php echo $row['notelWaris'];?>"/>
		</td>
	</tr>
</table>
<center><button type="submit" class="btn btn-success" name="kemaskini-pelajar">KEMASKINI</button>&nbsp;</center>
<br>
</form>
<?php } ?>
</div>
<div class="col-lg-6 col-md-6">
<?php if (isset($_GET['kemaskini'])) {
		$nokp = $_GET['kemaskini'];
		$sql2 = "SELECT ojt_pensyarah.namaPensyarah AS Pensyarah1 ,ojt_industri.namaSyarikat, ojt_penyelia_industri.namaPenyelia,ojt_industri.IDIndustri
		   	FROM `ref_seliaan`
		   	LEFT JOIN ojt_pensyarah ON ref_seliaan.IDPensyarahPP = ojt_pensyarah.IDPensyarahPP  
		   	LEFT JOIN ojt_industri ON ref_seliaan.IDIndustri = ojt_industri.IDIndustri
		   	LEFT JOIN ojt_penyelia_industri ON ref_seliaan.IDPenyelia = ojt_penyelia_industri.IDPenyelia
		   	WHERE nokpPelajar = '$nokp'";
		$resultpelajar2 = mysqli_query($con,$sql2);
			if($row = mysqli_fetch_array($resultpelajar2))
			{
				$sql3 = "SELECT ojt_pensyarah.namaPensyarah
				FROM ref_seliaan
				JOIN ojt_pensyarah ON ref_seliaan.IDPensyarahPPO = ojt_pensyarah.IDPensyarahPP
				WHERE ref_seliaan.nokpPelajar = '$nokp'";
				$infopelajar3 = mysqli_query($con,$sql3);
				while($row3 = mysqli_fetch_array($infopelajar3))
				{?>
					<h4>Maklumat Seliaan Pelajar</h4>
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
					<?php echo $row['namaSyarikat'];?>
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
					<a class="btn btn-success" href="kemaskiniSeliaan.php?kemaskiniSeliaan=<?php echo $nokp = $_GET['kemaskini'];?>">Kemaskini Seliaan</a>
					<?php 
					
				}
				
				else{?>
				<br>
						<h4><p>Tiada Maklumat seliaan kerana tetapan bagi seliaan belum dilaksanakan. Sila klik butang dibawah untuk menetapkan pensyarah, penyelia yang menjadi seliaan kepada pelajar ini</p></h4>
						<br><a class="btn btn-success" href="tetapanSeliaan.php?tambah=<?php echo $nokp = $_GET['kemaskini'];?>">Tetapkan Penyeliaan</a>
		<?php }}  ?>
   
	
</div>
 </div>
<br>

</div>
</div>
</div>
</body>