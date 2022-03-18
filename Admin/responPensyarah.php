<?php 
include 'headerAdmin.php';
$sq="SELECT ojt_pelajar.namaPelajar ,ojt_maklumbalas.Id, ojt_maklumbalas.bilSeliaan, ojt_pensyarah.Program, ojt_pensyarah.namaPensyarah , ojt_maklumbalas.TarikhSeliaan , ojt_maklumbalas.date
	FROM ojt_maklumbalas 
	LEFT JOIN ojt_pensyarah ON ojt_maklumbalas.IDPensyarahPP = ojt_pensyarah.IDPensyarahPP
	LEFT JOIN ojt_pelajar ON ojt_maklumbalas.nokpPelajar = ojt_pelajar.nokpPelajar ";
$result = mysqli_query($con,$sq);
?>
<div id="page-wrapper">
<div class="row">
<div class="col-lg-12">
    <h2 class="page-header">Respon dari Pensyarah Penilai dan Pensyarah Penyelia OJT</h2>
    <div class = "alert alert-info"> Memaparkan semua respon yang telah diberikan oleh pensyarah selepas seliaan mereka terhadap pelajar di tempat OJT</div>
</div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12">
    <table class="table table-striped table-bordered table-hover" id="myData">
<thead>
	<tr>
		<th>
			Bil.
		</th>
		<th>
			Nama pelajar
		</th>
		<th>
			Seliaan ke 
		</th>
		<th>
			Program
		</th>
		<th>
			nama pensyarah
		</th>
		<th>
			Tarikh seliaan
		</th>
		<th>
			Tarikh respon dibuat
		</th>
		<th>
			Lihat respon penuh
		</th>
	</tr>
</thead>
<tbody>
	<tr>
	<?php
		$num = 1;
		while($row = mysqli_fetch_array($result)){ ?>
		<td>
			<?php echo $num++ ?>
		</td>
		<td>
			<?php echo $row['namaPelajar'];?>
		</td>
		<td>
			<?php echo $row['bilSeliaan'];?>
		</td>
		<td>
			<?php echo $row['Program'];?>
		</td>
		<td>
			<?php echo $row['namaPensyarah'];?>
		</td>
		<td>
			<?php echo $row['TarikhSeliaan'];?>
		</td>
		<td>
			<?php echo $row['date'];?>
		</td>
		<td>
			<center><button style='background-color: Transparent; border: none;'><a target="_blank" href="viewResponPensyarah.php?id=<?php echo $row['Id'];?>">Lihat Penuh dan Cetak</a></button>
			<!-- <button style='background-color: Transparent; border: none;' name="delRespon" type="submit" value="<?php echo $row['Id'];?>" onclick="return confirm('Are you sure to delete?')" class="comfirmation"><img src='..\src/delete.png'></button> -->
			</center>
		</td>
	</tr>
	<?php }?>
	</tbody>
</table>
	<script>
  $(document).ready(function(){
    $('#myData').DataTable();
  });
  </script>

</div>
</div>
</div>

</body>
