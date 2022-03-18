<?php include 'headerAdmin.php';
   if (isset($_GET['kemaskiniPensyarah'])) {
		$id = $_GET['kemaskiniPensyarah'];
		$sql = "SELECT * FROM ojt_pensyarah WHERE IDPensyarahPP ='$id'";
		$resultPensyarah = mysqli_query($con,$sql); } ?>
		
<div id="page-wrapper">
<div class="row">
	<div class="col-lg-12">
	    <h2 class="page-header">Kemaskini Maklumat Pensyarah</h2>
	    <div class = "alert alert-info">Isi borang dibawah sekiranya terdapat perubahan pada maklumat diri pengguna</div>
	</div>
	</div>
	<div class="row">
		<div class="col-lg-8 col-md-8">
		<?php while($row = mysqli_fetch_array($resultPensyarah)){ ?>
		<form action="" method="post">
		<table class="table table-striped table-bordered table-hover">
			<tr>
				<th colspan="2">
					Maklumat Pensyarah
				</th>
			</tr>
			<tr>
				<td width="40%">
					Nama Pensyarah :
				</td>
				<td width="60%">
					<input type='text' name='namaPensyarah' size="35" class="form-control" value="<?php echo $row['namaPensyarah'];?>"/>
				</td>
			</tr>
			<tr>
				<td>
					No Telefon :
				</td>
				<td>
					<input type='text' name='notelpensyarah' size="35" class="form-control" value="<?php echo $row['notelpensyarah'];?>"/>
				</td>
			</tr>
			<tr>
				<td>
					Nama Jabatan :
				</td>
				<td>
					<select name="jabatan" class="form-control" >
					<option value="<?php echo $row['jabatan'];?>"><?php echo $row['jabatan'];?></option>
					<option>- Pilih Jabatan -</option>
					<option value="Jabatan Perniagaan">Jabatan Perniagaan</option>
					<option value="Jabatan Teknologi Maklumat dan Komunikasi">Jabatan Teknologi Maklumat dan Komunikasi</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					Jawatan:
				</td>
				<td>
					<input type='text' name='jawatan' size="35" class="form-control" value="<?php echo $row['jawatan'];?>"/>
				</td>
			</tr>
			<tr>
				<td>
					Username:
				</td>
				<td>
					<input type='text' name='username' size="35" class="form-control" value="<?php echo $row['username'];?>"/>
				</td>
			</tr>
			<tr>
				<td>
					Pensyarah dari Program :
				</td>
				<td>
				<select name="Program" class="form-control">
					<option value="<?php echo $row['Program'];?>"><?php echo $row['Program'];?></option>
					<option value="<?php echo $row['Program'];?>">- Pilih -</option>
					<option value="BAK">BAK-Perakaunan</option>
					<option value="BPP">BPP-Pengurusan Perniagaan</option>
					<option value="BKP">BKP-Kesetiausahaan Pentadbiran</option>
					<option value="KPD">KPD-Sistem Pengurusan Pangkalan data dan Aplikasi web</option>
				</select>
				</td>
			</tr>
			
		</table>
		<center><button type="submit" class="btn btn-default" value="<?php echo $row['IDPensyarahPP'];?>" name="kemaskini-pensyarah">KEMASKINI</button>
		<button type="submit" class="btn btn-default" value="<?php echo $row['username'];?>" name="resetPass" >RESET PASSWORD</button></center><br><br>
		</form>
		<?php }?>
</div>
</div>
</div>
</body>