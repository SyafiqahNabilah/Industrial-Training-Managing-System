<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
		<h2 class="page-header">Senarai Industri</h2>
		</div>
	</div>
	<div class="row">
	<div class="col-lg-12 col-md-12">
		<div class = "alert alert-info">
		Memaparkan senarai Industri yang telah didaftarkan. Klik pada <b>"Kemaskini"</b> untuk mengemaskini maklumat Industri.
		</div>
		<table class="table table-striped table-bordered table-hover"  id="dataTables-example" >
			<thead>
				<tr>
					<th>
						Bil.
					</th>
					<th>
						Nama Syarikat
					</th>
					<th>
						Alamat
					</th>
					<th>
						notel
					</th>
					<th>
						Action
					</th>
				</tr>
			</thead>
			<tbody>
			<tr>
			<?php
				$num = 1;
				while($row = mysqli_fetch_array($info)){ ?>
					<td>
						<?php echo $num++?>
					</td>
					<td>
						<?php echo $row['namaSyarikat'];?>
					</td>
					<td>
						<?php echo $row['Alamat'];echo " , "; echo $row['Alamat2'];?>
					</td>
					<td>
						<?php echo $row['notel'];?>
					</td>
					<td>
						<center><button style='background-color: Transparent; border: none;' ><a href="kemaskiniIndustri.php?kemaskiniIndustri=<?php echo $row['IDIndustri'];?>">Kemaskini</a></button></center>
					</td>
			</tr>
					<?php }?>
			</tbody>
		</table>
<script>
  $(document).ready(function(){
    $('#dataTables-example').DataTable();
  });
  </script>
</div>
</div>
</div>
</body>