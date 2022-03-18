<?php include 'headerAdmin.php';
      $sql = "SELECT * FROM ojt_pensyarah ORDER BY namaPensyarah ASC";
      $infopensyarah = mysqli_query($con,$sql); ?>

<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
		<h2 class="page-header"> Daftar Pensyarah</h2>
		</div>
	</div>
	<div class="row">
	<div class="col-lg-4 col-md-4">
	<h4>Sila isi borang untuk mendaftar pensyarah.</h4>

<br><br/>
<form action="" method="post">
		<input type = "text" name = "namaPensyarah" placeholder="Nama Pensyarah" size="40px" class="form-control"  /><br />
		<input type = "text" name = "jawatan" placeholder="Nama Jawatan" size="40px" class="form-control"  /><br />
		<select name="jabatan" class="form-control" >
		<option>- Pilih Jabatan -</option>
		<option value="Jabatan Perniagaan">Jabatan Perniagaan</option>
		<option value="Jabatan Teknologi Maklumat dan Komunikasi">Jabatan Teknologi Maklumat dan Komunikasi</option>
		</select><br />
		<select name="Program" class="form-control">
			<option value=" ">-Pilih Program -</option>
			<option value="BAK">Perakaunan</option>
			<option value="BPP">Pengurusan Perniagaan</option>
			<option value="BKP">Kesetiausahaan</option>
			<option value="KPD">Sistem Pengurusan Pangkalan Data dan Aplikasi web</option>
		</select><br>
		<input type = "text" name = "notelpensyarah" placeholder="No telefon" size="40px" class="form-control"  /><br />
		<input type = "text" name = "username" placeholder="username" size="40px" class="form-control"  /><br />
		<select name="usertype" class="form-control" id="as">
		<option>- Pilih jenis pengguna -</option>
		<option value="1">Admin</option>
		<option value="2">Pensyarah Biasa</option>
		<option value="3">Penyelaras Program</option>
		</select>
		<br>
		<label>Pensyarah dari Program :</label>
		
		Password bagi pengguna baru telah ditetapakan sebagai default : kvpjb2017<br><br>
		<button type="submit" class="btn btn-default" name="daftarPensyarah">DAFTAR PENSYARAH</button>
		</form>
<br/><br/><br/>
</div>
</center>
<div class="col-lg-8 col-md-8">
	<h4>Menyenaraikan pensyarah yang telah didaftarkan.</h4><br>

<table class="table table-striped table-bordered table-hover"  id="dataTables-example" >
<thead>
	<tr>
		<th>
			Bil.
		</th>
		<th>
			Nama Pensyarah
		</th>
		<th>
			Jawatan
		</th>
		<th>
			Jabatan
		</th>
	</tr>
	</thead>
	<tbody>
<tr>
	<?php
		$num = 1;
		while($row = mysqli_fetch_array($infopensyarah)){ ?>
		<td>
			<?php echo $num++ ?>
		</td>
		<td>
			<?php echo $row['namaPensyarah'];?>
		</td>
		<td>
			<?php echo $row['jawatan'];?>
		</td>
		<td>
			<?php echo $row['jabatan'];?>
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