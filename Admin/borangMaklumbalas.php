<?php include 'headerAdmin.php'; 
   	$query ="select * from ojt_borang ORDER BY id DESC";
	$borang = mysqli_query($con,$query); ?>
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
		<h2 class="page-header">Muat naik borang respon</h2>
		</div>
	</div>
	<div class = "alert alert-info">
		Membenarkan admin memuat naik borang respon yang perlu diisi oleh <b>pihak Industri/Penyelia.</b> <br>
		Setelah memuat naik dokumen disini , Pihak industri akan memuat turun dan mengisi borang tersebut.<br>
		Kemudian memuatnaik semula borang tersebut.<br>
		klik pada <img src='..\src/download.png' width="20px"> untuk memuat turun dokumen yang telah diupload.<br>
		Klik pada <img src='..\src/delete.png' width="20px"> untuk membuang dokumen .
		</div>
	<div class="row">
		<div class="col-lg-12 col-md-12">
			<form enctype="multipart/form-data"  action="" method="post">
			<input type="file" name="upload" id="photo" class="formdaftar"><br>
			<input type="text" name="namaPapar" placeholder="Nama Dokumen" class="form-control"><br>
			<input type="text" name="pesanan" placeholder="Arahan untuk pihak Industri/Penyelia" class="form-control"><br>
			<input type="submit" value="MUAT NAIK" class="btn btn-default" name="submitBorang">
			</form><p><br>
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
						Arahan
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
						<?php echo $row['namaPapar'];?>
					</td>
					<td>
						<?php echo $row['pesanan'];?>
					</td>
					<td>
						<?php echo $row['date'];?>
					</td>
					<td><form action='' method='post'>
					<a href="../files/<?php echo $row['name'] ?>" title="click to download"><img src='..\src/download.png'></a>
					<button style='background-color: Transparent; border: none;' name="deleteBorang" type="submit" onclick="return confirm('Are you sure to delete?')" class="comfirmation" value="<?php echo $row['id'];?>"><img src='..\src/delete.png'></button>
					</form>
					</td>
				</tr>
			</tbody>
			<?php }?>
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