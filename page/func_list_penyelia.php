<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h2 class="page-header">Senarai Penyelia</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12">
			<div class="alert alert-info">	
			Memaparkan senarai Penyelia yang telah didaftarkan. Klik pada <b>"Kemaskini"</b> untuk mengemaskini maklumat penyelia. 
			</div>
		
		<table class="table table-striped table-bordered table-hover" id="spenyelia">
		<thead>
			<tr>
				<th>
					Bil.
				</th>
				<th>
					Nama Penyelia
				</th>
				<th>
					Jawatan
				</th>
				<th>
					No telefon 
				</th>
				<th>
					Nama Syarikat
				</th>
				<th>
					KEMASKINI
				</th>
			</tr>
		</thead>
		<tbody>
			<tr>
	<?php  $num = 1;
		while($row = mysqli_fetch_array($info)){ ?>
				<td>
					<?php echo $num++ ?>
				</td>
				<td>
					<?php echo $row['namaPenyelia']; ?>
				</td>
				<td>
					<?php echo $row['jawatan'];?>
				</td>
				<td>
					<?php echo $row['notel'];?>
				</td>
				<td>
					<?php echo $row['namaSyarikat'];?>
				</td>
				<td>
				<center><button style='background-color: Transparent; border: none;' ><a href="kemaskiniPenyelia.php?kemaskiniPenyelia=<?php echo $row['IDPenyelia'];?>">Kemaskini</a></button></center>
				</td>
			</tr>
				<?php }?>
		</tbody>
		</table>
		<script>
  $(document).ready(function(){
    $('#spenyelia').DataTable();
  });
  </script>
	</div>
</div>
</div>
</body>