<?php include 'header-penyelia.php';
 $check = $_SESSION['login_user'];
 $sql = "SELECT * FROM ojt_penyelia_industri WHERE username ='$check'";
	$result= mysqli_query($con,$sql);
	$row = mysqli_fetch_array($result);
	$ID= $row['IDPenyelia'];
 function senaraikan($con){
	$check = $_SESSION['login_user'];
	$sql = "SELECT * FROM ojt_penyelia_industri WHERE username ='$check'";
	$resultP= mysqli_query($con,$sql);
	$row = mysqli_fetch_array($resultP);
	$ID= $row['IDPenyelia'];
	$output = '';
	$sql = "SELECT ojt_pelajar.namaPelajar , ojt_pelajar.nokpPelajar , ojt_pelajar.notelPelajar
						  	FROM ref_seliaan
						  	LEFT JOIN ojt_pelajar ON ref_seliaan.nokpPelajar = ojt_pelajar.nokpPelajar
						  	WHERE IDPenyelia = '$ID'";
   	$result=mysqli_query($con,$sql);
   	while ($row = mysqli_fetch_array($result)) 
   	{
   		$output .= '<option value="'.$row["nokpPelajar"].'">'.$row["namaPelajar"].'</option>';
   	}
   	return $output;
 }
?>
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
		<h2 class="page-header">Muat naik borang respon</h2>
		</div>
	</div>
	<div class = "alert alert-info">
		Muat naik semula borang respon yang telah diisi</b> <br>
		Klik pada <img src='..\src/delete.png' width="20px"> untuk membuang dokumen .
		</div>
	<div class="row">
		<div class="col-lg-5 col-md-5">
		
		<?php $id = $row['IDPenyelia'];?>
			<form enctype="multipart/form-data"  action=" " method="post">
			<input type="file" name="upload" id="photo"  class="formdaftar"><br>
			<?php 	$check = $_SESSION['login_user'];
					$penyelia = "SELECT * FROM ojt_penyelia_industri WHERE username='$check'";
					$result = mysqli_query($con,$penyelia);
						while($rows = mysqli_fetch_array($result)){ ?>
			<select name="IDPenyelia" class="form-control">
				<option value="<?php echo $rows['IDPenyelia'];?>"><?php echo $rows['namaPenyelia'];}?></option>
			</select><br>
			<select name="nokpPelajar" class="form-control">
			<option value="">- Pilih Pelajar -</option>
			 <?php echo senaraikan($con);?>
			</select><br>
			<input type="submit" value="MUAT NAIK" class="btn btn-info" name="submitBorangRespon">
			</form><p> 
		</div>

		<div class="col-lg-12 col-md-12">
		<?php
		$query ="SELECT ojt_pelajar.namaPelajar, ojt_borangRespon_penyelia.name , ojt_borangRespon_penyelia.date
					   FROM ojt_borangRespon_penyelia 
					   	LEFT JOIN ojt_pelajar ON ojt_borangRespon_penyelia.nokpPelajar = ojt_pelajar.nokpPelajar
					   	WHERE ojt_borangRespon_penyelia.idPenyelia = '$ID'";
			  $borang = mysqli_query($con,$query);?>
			<table class="table table-striped table-bordered table-hover" id="dataTables">
			<thead>
				<tr>
					<th>
						Bil.
					</th>
					<th>
						Nama borang
					</th>
					<th>
						Nama Pelajar 
					</th>
					<th>
						Tarikh
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
					while($row=mysqli_fetch_array($borang)){?>
					<td>
						<?php echo $num++ ?>
					</td>
					<td>
						<?php echo $row['name'];?>
					</td>
					<td>
						<?php echo $row['namaPelajar'];?>
					</td>
					<td>
						<?php echo $row['date'];?>
					</td>
					<td><form action='' method='post'>
					<a href="../files/<?php echo $row['name'] ?>" title="click to download"><img src='..\src/download.png'></a>
					<button style='background-color: Transparent; border: none;' name="deleteBorangRespon" type="submit" onclick="return confirm('Are you sure to delete?')" class="comfirmation" value="<?php echo $row['name'];?>"><img src='..\src/delete.png'></button>
					</form>
					</td>
				</tr>
			</tbody>
			<?php } ?>
		</table>
	</div>
	</div>
	</div>
	<script>
		  $(document).ready(function(){
		    $('#dataTables').DataTable();
		  });
  </script>
	</div>
</body>
		</div>
	</div>


<br>