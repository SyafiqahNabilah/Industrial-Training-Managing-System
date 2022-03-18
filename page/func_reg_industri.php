 <?php 
 $sql = "SELECT * FROM ojt_industri ORDER BY namaSyarikat ASC";
   $info = mysqli_query($con,$sql); ?>
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
				<h2 class="page-header"> Daftar Industri</h2>
		</div>
	</div>
<div class="row">
	<div class="col-lg-4 col-md-4">	
		<h4>Sila isi borang untuk mendaftarkan pihak industri </h4>
		<br>
		<form action="" method="post">
		<input type = "text" name = "namaSyarikat" placeholder="Nama Syarikat" size="80px" class="form-control" /><br />
		<input type = "text" name = "Alamat" placeholder="12 Jalan Kempas 5/5" size="80px" class="form-control" cols= "3" /><br />
		<input type = "text" name = "Alamat2" placeholder="Kawasan Perindustrian Kempas" size="80px" class="form-control" cols= "3" /><br />
		<input type = "text" name = "Poskod" placeholder="81200 " size="80px" class="form-control" /><br />
		<?php $sql=mysqli_query($con,"SELECT* FROM ojt_negeri ORDER BY namaNegeri ASC"); ?>
			<select name="negeri" class="form-control" id="negeri">
			<option> - Pilih Negeri/Wilayah - </option>
				<?php 
			  while ($row=mysqli_fetch_array($sql)) {
              echo '<option value="'.$row['namaNegeri'].'">'.$row['namaNegeri'].'</option>';}
        ?>

			</select><br />
			<select name='daerah' class="form-control" id="daerah" >
			 <option value="">-Pilih Negeri Dahulu-</option>
			</select><br />
		<input type = "text" name = "notel" placeholder="no telefon" size="80px" class="form-control" /><br />
		<input type = "text" name = "nofaks" placeholder="No Faks" size="80px" class="form-control" /><br />
		<button type="submit" class="btn btn-default" name="daftarIndustri">DAFTAR INDUSTRI</button>
		</form>
</div>
<div class="col-lg-8 col-md-8">
	<h4>Senarai industri yang telah didaftar</h4>
	<br>
		
		<table class="table table-striped table-bordered table-hover"  id="dataTables-example">
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
	</tr>
	</thead>
	<tbody>
	<tr>
	<?php
		$num = 1;
		while($row = mysqli_fetch_array($info)){ ?>
		<td>
			<?php echo $num++ ?>
		</td>
		<td>
			<?php echo $row['namaSyarikat'];?>
		</td>
		<td>
			<?php echo $row['Alamat'];?>
		</td>
		<td>
			<?php echo $row['notel'];?>
		</td>
	</tr>
	<?php }?>
	</tbody>
</table>
<script>
  $(document).ready(function(){
    $('#dataTables-example').DataTable();
  });
			$(document).ready(function(){
    $('#negeri').on('change',function(){
        var namaNegeri = $(this).val();
        if(namaNegeri){
            $.ajax({
                type:'GET',
                url:'ajaxData.php',
                data:'namaNegeri='+namaNegeri,
                success:function(html){
                    $('#daerah').html(html);
                }
            }); 
        }else{
            $('#daerah').html('<option value="">Pilih Daerah</option>');
        }
    });
});

</script>
</div>
</div>
</div>
</body>
