<?php include 'header-penyelaras.php';
		$check = $_SESSION['login_user'];
		$sql = "SELECT * FROM `ojt_pensyarah` WHERE username='$check'";
		$resultKemaskini = mysqli_query($con,$sql);?>
		
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
    		<h2 class="page-header">Kemaskini Maklumat</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-10 col-md-10">
<?php while($row = mysqli_fetch_array($resultKemaskini)){ ?>
<br>
	<div class="panel panel-default">
		<div class="panel-heading">
  			Maklumat Peribadi 
 		</div>
<form action="" method="post">
<table class="table table-striped table-bordered table-hover">
	<tr>
		<td width="40%">
			Nama Penuh :
		</td>
		<td width="60%">
			<input type='text' name='namaPensyarah' size="35" class="form-control" value="<?php echo $row['namaPensyarah'];?>"/>
		</td>
	</tr>
	<tr>
		<td>
			Jawatan :
		</td>
		<td>
			<input type='text' name='jawatan' class="form-control" value="<?php echo $row['jawatan'];?>"/>
		</td>
	</tr>
	<tr>
		<td>
			Jabatan :
		</td>
		<td>
			<input type='text' name='jabatan' class="form-control" value="<?php echo $row['jabatan'];?>"/>
		</td>
	</tr>
	<tr>
		<td>
			No Telefon :
		</td>
		<td>
			<input type='text' name='notelpensyarah' class="form-control" value="<?php echo $row['notelpensyarah'];?>"/>
		</td>
	</tr>
</table>
<center>
<button type="submit" class="btn btn-default" value="<?php echo $row['IDPensyarahPP'];?>" name="kemaskini-Penyelaras">KEMASKINI</button>
<br>
</form>
<?php } ?>
</div>
	</div>
		</div>
			</div>

</body>