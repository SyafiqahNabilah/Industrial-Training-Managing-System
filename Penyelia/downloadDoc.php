<?php include 'header-penyelia.php';
   	$query ="select * from ojt_borang ORDER BY id DESC";
	$borang = mysqli_query($con,$query); ?>
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
		<h2 class="page-header">Muat turun borang respon</h2>
		</div>
	</div>
	<div class = "alert alert-info">
		klik pada <img src='..\src/download.png' width="20px"> untuk memuat turun dokumen yang telah diupload.<br>
		Setelah selesai mengisi borang yang telah dimuat turun, sila memuat naik dokumen tersebut kembali pada menu muat naik borang respon
		</div>
	<div class="row">
		<div class="col-lg-12 col-md-12">
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
						Pesanan dari Pihak Kolej
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
			<?php
					$num = 1;
					while($row=mysqli_fetch_array($borang)){?>
				<tr>
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