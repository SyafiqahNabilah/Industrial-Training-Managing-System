<?php

 $sql = "SELECT ojt_penyelia_industri.IDPenyelia,ojt_penyelia_industri.namaPenyelia, ojt_penyelia_industri.notel, ojt_penyelia_industri.jawatan, ojt_industri.namaSyarikat 
   FROM `ojt_penyelia_industri`
   JOIN ojt_industri ON ojt_penyelia_industri.IDIndustri = ojt_industri.IDIndustri
   ORDER BY ojt_penyelia_industri.namaPenyelia ASC";
   $info = mysqli_query($con,$sql); 
   ?>
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
		<h2 class="page-header"> Daftar Penyelia</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-4 col-md-4">
				<h4>Sila isi borang untuk mendaftar Penyelia.</h4> 
				<br>
		<form action="" method="post">
		<input type = "text" name = "namaPenyelia" placeholder="Nama Penyelia" size="80px" class="form-control"/><br />
		<input type = "text" name = "jawatan" placeholder="jawatan" size="80px" class="form-control" /><br />
		<input type = "text" name = "notel" placeholder="No telefon" size="80px" class="form-control" /><br />
		<font color="red">*Bagi username sila mulakan dengan nama syarikat diikuti dengan nama penyelia, contoh : PolyTaxAli</font>
		<input type = "text" name = "username" placeholder="Username" size="80px" class="form-control" /><br />
		<select name="IDIndustri" class="form-control">
		<?php $sql = mysqli_query($con, "SELECT * FROM ojt_industri ORDER BY namaSyarikat ASC");
			  $row = mysqli_num_rows($sql);?>
			  <option>- Pilih Syarikat -</option>
			 <?php while ($row=mysqli_fetch_assoc($sql)) {
              echo '<option value="'.$row['IDIndustri'].'">'.$row['namaSyarikat'].'</option>';}?>
		</select>
		<font color="red">*Password bagi pengguna baru telah ditetapakan sebagai default : kvpjb2017</font><br/>
		<button type="submit" class="btn btn-default" name="daftarPenyelia">DAFTAR PENYELIA </button>
		</form>
</div>
<div class="col-lg-7 col-md-7">
<h4>Senarai Penyelia yang telah didaftarkan.</h4>
<br>
	<table class="table table-striped table-bordered table-hover" id="sPenyelia">
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
		</tr>
		<?php }?>
	</tbody>
	</table>
	<script>
  $(document).ready(function(){
    $('#sPenyelia').DataTable();
  });
  </script>
</div>	
</div>
</div>
</body>
