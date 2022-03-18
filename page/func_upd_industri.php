<?php if (isset($_GET['kemaskiniIndustri'])) {
		$id = $_GET['kemaskiniIndustri'];
		$sql = "SELECT * FROM ojt_industri WHERE IDIndustri ='$id'";
		$result = mysqli_query($con,$sql); } ?>
		
<div id="page-wrapper">
<div class="row">
	<div class="col-lg-12">
	    <h2 class="page-header">Maklumat Penyelia</h2>
	    <div class = "alert alert-info">Sila isi borang dibawah. Pastikan borang lengkap sebelum butang kemaskini ditekan</div>
	</div>
	</div>
	<div class="row">
		<div class="col-lg-11 col-md-11">
		<br>
		<?php while($row = mysqli_fetch_array($result)){ ?>
		<form action="" method="post">
		<div class="panel panel-default">
		<div class="panel-heading">
  			Maklumat Peribadi 
 		</div>
		<table class="table">
			<tr>
				<td width="40%">
					Nama Syarikat :
				</td>
				<td width="60%">
					<input type='text' name='namaSyarikat' size="60" class="form-control" value="<?php echo $row['namaSyarikat'];?>"/>
					<input type='hidden' name='IDIndustri' size="60" class="form-control" value="<?php echo $row['IDIndustri'];?>"/>

				</td>
			</tr>
			<tr>
				<td>
					Alamat :
				</td>
				<td>
					<input type='text' name='Alamat' size="60" class="form-control" value="<?php echo $row['Alamat'];?>"/><br>
					<input type='text' name='Alamat2' size="60" class="form-control" value="<?php echo $row['Alamat2'];?>"/>
				</td>
			</tr>
			<tr>
				<td>
					Poskod :
				</td>
				<td>
					<input type='text' name='Poskod' size="35" class="form-control" value="<?php echo $row['Poskod'];?>"/>
				</td>
			</tr>
			<tr>
				<td>
					Daerah :
				</td>
				<td>
					<input type='text' name='Daerah' size="35" class="form-control" value="<?php echo $row['Daerah'];?>"/>
				</td>
			</tr>
			<tr>
				<td>
					Negeri :
				</td>
				<td>
					<input type='text' name='Negeri' size="35" class="form-control" value="<?php echo $row['Negeri'];?>"/>
				</td>
			</tr>
			<tr>
				<td>
					No telefon :
				</td>
				<td>
					<input type='text' name='notel' size="35" class="form-control" value="<?php echo $row['notel'];?>"/>
				</td>
			</tr>
			<tr>
				<td>
					No faks :
				</td>
				<td>
					<input type='text' name='nofaks' size="35" class="form-control" value="<?php echo $row['nofaks'];?>"/>
				</td>
			</tr>
			
		</table><br>
<center><button type="submit" class="btn btn-info" name="kemaskiniIndustri">KEMASKINI</button></center><br><br>
</div>
</form>
<?php }?>
</div>
</div>
</div></body>
