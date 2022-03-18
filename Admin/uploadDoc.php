<?php include 'headerAdmin.php';
$query="select * from upload ORDER BY id DESC";
$upload = mysqli_query($con,$query);
?>
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
		<h2 class="page-header">Upload dan Download Dokumen</h2>
		</div>
	</div>
  	<div class="alert alert-info ">
    							1. Membenarkan pengurusan bagi dokumen yang telah dimuat naik. <br>
								2.  <b>Dokumen yang di muat naik akan dipaparkan di muka depan<i>(front page)</i></b> yang membolehkan pelajar/pensyarah memuat turun pelbagai borang/dokumen mengenai ojt<br>
								3. Klik pada kotak <b>"choose file"</b> untuk memilih dokumen yang ingin dimuatnaik<br>
								4. Isi pada kotak <b>"nama dokumen"</b> untuk mengisi nama dokumen dan klik pada <b>Submit</b> <br>
								5. Klik pada butang <img src='..\src/delete.png' width="20px"> untuk membuang dokumen yang telah dimuat naik<br>
	</div>
	<div class="row">		
		<div class="col-lg-8 col-md-8">
		<form enctype="multipart/form-data"  action="" method="post">
				<input type="file" name="file" /> <br>
				<font color="red">*Sila masukkan nama file/dokumen </font>
				<input type="text" name="nama" class="form-control" placeholder="Isikan nama dokumen"><br>
				<button type="submit" class="btn btn-danger" name="submit-file">UPLOAD</button>
		</form><p> 
<table  class="table table-striped table-bordered table-hover" id="myData">
<thead>
	<tr>
		<th>
			Bil.
		</th>
		<th>
			Nama file
		</th>
		<th>
			Tarikh
		</th>
		<th colspan="2">
			Kemaskini
		</th>
	</tr>
</thead>
<tbody>
	<tr>
	<?php 
	$num = 1; 
	while($row=mysqli_fetch_array($upload)){
		?>
		<td>
			<?php echo $num++ ?>
		</td>
		<td>
			<?php echo $row['nama'];?>
		</td>
		<td>
			<?php echo $row['tarikh'];?>
		</td>
		<td>
		<form action='' method='post'>
		<a href="../files/<?php echo $row['file'] ?>" target="_blank"><img src='..\src/download.png'></a>
		<button style='background-color: Transparent; border: none;' name="deleteUpload" type="submit" value="<?php echo $row['id'];?>" onclick="return confirm('Are you sure to delete?')" class="comfirmation"><img src='..\src/delete.png'></button>
		</form>
		</td>
	</tr>
	<?php }?>
</tbody>
</table>
</div>
</div>
</div>
</body>

