<?php 
include 'headerAdmin.php';

		$check = $_SESSION['login_user'];
		$sql = "SELECT * FROM `ojt_pensyarah` WHERE username='$check'";
		$resultKemaskini = mysqli_query($con,$sql);  ?>
		
<div id="page-wrapper">
	<div class="row">
	<div class="col-lg-12">
	    <h2 class="page-header">Maklumat Diri</h2>
	    <div class = "alert alert-info">Isi borang dibawah sekiranya terdapat perubahan pada maklumat diri pengguna</div>
	</div>
	</div>
	<div class="row">
		<div class="col-lg-8 col-md-8">
		<?php while($row = mysqli_fetch_array($resultKemaskini)){ ?>
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
					<input type='text' name='jabatan' size="35" class="form-control" value="<?php echo $row['jabatan'];?>"/>
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
		</table>
		<center><button type="submit" class="btn btn-default" value="<?php echo $row['IDPensyarahPP'];?>" name="kemaskini-profil">KEMASKINI</button>
		<button type="submit" class="btn btn-default" value="<?php echo $row['username'];?>" name="resetPass" >RESET PASSWORD</button></center><br><br>
		</form>
<?php } ?>
</div>
</div>
</div>
</body>