<?php if (isset($_GET['kemaskiniPenyelia'])) {
		$id = $_GET['kemaskiniPenyelia'];
		$sql = "SELECT ojt_penyelia_industri.namaPenyelia,ojt_penyelia_industri.IDPenyelia, ojt_penyelia_industri.jawatan, ojt_penyelia_industri.notel, ojt_penyelia_industri.username, ojt_penyelia_industri.IDIndustri, ojt_industri.IDIndustri, ojt_industri.namaSyarikat 
		FROM ojt_penyelia_industri 
		JOIN ojt_industri ON ojt_penyelia_industri.IDIndustri = ojt_industri.IDIndustri
		WHERE IDPenyelia ='$id'";
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
		<form action="..\session.php" method="post">
		<div class="panel panel-default">
		<div class="panel-heading">
  			Maklumat Penyelia
 		</div>
		<table class="table">
			<tr>
				<td width="40%">
					Nama Penyelia :
				</td>
				<td width="60%">
					<input type='text' name='namaPenyelia' size="60" class="form-control" value="<?php echo $row['namaPenyelia'];?>"/>
				</td>
			</tr>
			<tr>
				<td>
					Jawatan :
				</td>
				<td>
					<input type='text' name='jawatan' size="60" class="form-control" value="<?php echo $row['jawatan'];?>"/>
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
					Username :
				</td>
				<td>
					<input type='text' name='username' size="35" class="form-control" value="<?php echo $row['username'];?>"/>
				</td>
			</tr>
			<tr>
				<td>
					<font style="color: red;"><b>*</b>Syarikat :</font>
				</td>
				<td>
				<select name="IDIndustri" class="form-control">
					<?php echo '<option value="'.$row['IDIndustri'].'">'.$row['namaSyarikat'].'</option>'; ?>
					<option>- Pilih Syarikat Lain -</option>
		             <?php $sql2 = mysqli_query($con, "SELECT * FROM ojt_industri");
					  $rows = mysqli_num_rows($sql2);
					  while ($rows=mysqli_fetch_assoc($sql2)) {
		              echo '<option value="'.$rows['IDIndustri'].'">'.$rows['namaSyarikat'].'</option>';}?>
				</select>
				</td>
			</tr>
		</table><br>
		<center><button type="submit" class="btn btn-info" value="<?php echo $row['IDPenyelia'];?>" name="kemaskiniPenyelia">KEMASKINI</button>
		<button type="submit" class="btn btn-default" value="<?php echo $row['username'];}?>" name="resetPass" >RESET PASSWORD</button></center><br><br>
		</div>
		</form>
</div>
</div>
</div>
</body>
