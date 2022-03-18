<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
		<h2>Daftar Pelajar</h2>
		<br><br>
		</div>
	</div>
	<div class="row">
	<div class="col-lg-10 col-md-10">
		<form action="" method="post">
		<table class="table table-striped table-bordered table-hover">
		<tr>
			<th colspan="2" >
				Borang Maklumat Peribadi Pelajar
			</th>
		</tr>
		<tr>
			<td width="40%">
				Nama Penuh Pelajar :<font color="red">*</font>
			</td>
			<td width="60%">
			<input type='text' name='namaPelajar' size="35" class="form-control" placeholder="Nama Pelajar" />
			</td>
	</tr>
	<tr>
		<td>
			No Kad Pengenalan :<font color="red">*</font>
		</td>
		<td>
			<input type='text' name='nokpPelajar' class="form-control" placeholder="999999-99-9999" />
		</td>
	</tr>
	<tr>
		<td>
			Angka Giliran :<font color="red">*</font>
		</td>
		<td>
			<input type='text' name='AngkaGiliran' class="form-control" placeholder="K531*******" />
		</td>
	</tr>
	<tr>
		<td>
			Kohort :<font color="red">*</font>
		</td>
		<td>
			<input type='text' name='Kohort' class="form-control" placeholder="contoh : 2015" />
		</td>
	</tr>
	<tr>
		<td>
			Program : 
		</td>
		<td>
			<select name="program" class="form-control">
			<option>- Pilih Program -</option>
			<option value="BAK">Perakaunan</option>
			<option value="BPP">Pengurusan Perniagaan</option>
			<option value="BKP">Kesetiausahaan Pentadbiran</option>
			<option value="KPD">Sistem Pengurusan Pangkalan Data dan Aplikasi Web</option>
		</select>
		</td>
	</tr>
	<tr>
		<td>
			Kelas : 
		</td>
		<td>
			<select name="kelas" class="form-control">
			<option>- Pilih Kelas -</option>
			<option value="1">1</option>
			<option value="2">2</option>
		</select>
		</td>
	</tr>
	<tr>
		<td>
			Agama:<font color="red">*</font>
		</td>
		<td>
			<select name="agama"  class="form-control">
				<option>- Pilih Agama -</option>
				<option value="Buddha">Buddha</option>
				<option value="Islam">Islam</option>
				<option value="Hindu">Hindu</option>
				<option value="Kristian">Kristian</option>
				<option value="lain-lain">Lain-lain</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>
			Jantina:<font color="red">*</font>
		</td>
		<td>
			<select name="jantina" class="form-control">
				<option>- Pilih Jantina -</option>
				<option value="Lelaki">Lelaki</option>
				<option value="Perempuan">Perempuan</option>

			</select>
		</td>
	</tr>
	<tr>
		<td>
			No telefon:<font color="red">*</font>
		</td>
		<td>
			<input type='text' name='notelPelajar' class="form-control" placeholder="No telefon pelajar" />
		</td>
	</tr>
	<tr>
		<td>
			Alamat :<font color="red">*</font>
		</td>
		<td>
			<input type='text' size="50" name='alamat' class="form-control" placeholder="*D02-02 , Jalan Permata 1"></textarea><br>
			<input type='text' size="50" name='alamat2' class="form-control" placeholder="Taman Permata Impian"></textarea>
		</td>
	</tr>
	<tr>
		<td>
			Poskod:
		</td>
		<td>
			<input type='text' name='poskod' class="form-control" placeholder="Poskod. Contoh : 81000" />
		</td>
	</tr>
	<tr>
		<td>
			Negeri :
		</td>
		<td>
		<?php $sql=mysqli_query($con,"SELECT* FROM ojt_negeri ORDER BY namaNegeri ASC"); ?>
			<select name="negeri" class="form-control" id="negeri">
			<option> - Pilih Negeri/Wilayah - </option>
				<?php 
			  while ($row=mysqli_fetch_array($sql)) {
              echo '<option value="'.$row['namaNegeri'].'">'.$row['namaNegeri'].'</option>';}
        ?>

			</select>
		</td>
	</tr>
	<tr>
		<td>
			Daerah:
		</td>
		<td>
			<select name='daerah' class="form-control" id="daerah" >
			 <option value="">-Pilih Negeri Dahulu-</option>
			</select>
		</td>
	</tr>
		<tr>
		<td>
			Kecacatan jika ada :
		</td>
		<td>
			<select name="kecacatan" class="form-control">
				<option value="">- Pilih Ada/Tiada -</option>
				<option value="Ada">Ada</option>
				<option value="Tiada">Tiada</option>
			</select>
		</td>
	</tr>
	</tr>
	<tr>
		<td>
			Nama Bapa :
		</td>
		<td>
			<input type='text' name='namaPenjaga' class="form-control" placeholder="Nama IbuBapa" />
		</td>
	</tr>
	<tr>
		<td>
			Pekerjaan Bapa :
		</td>
		<td>
			<input type='text' name='kerjaBapa' class="form-control" placeholder="Pekerjaan Bapa" />
		</td>
	</tr>
	<tr>
		<td>
			Pendapatan Bapa :
		</td>
		<td>
			<input type='text' name='gajiBapa' class="form-control" placeholder="Pendapatan Bapa" />
		</td>
	</tr>
	<tr>
		<td>
			Nama ibu :
		</td>
		<td>
			<input type='text' name='namaIbu' class="form-control" placeholder="Nama Ibu" />
		</td>
	</tr>
	<tr>
		<td>
			Pekerjaan ibu :
		</td>
		<td>
			<input type='text' name='kerjaIbu' class="form-control" placeholder="Pekerjaan Ibu" />
		</td>
	</tr>
	<tr>
		<td>
			Pendapatan Ibu :
		</td>
		<td>
			<input type='text' name='gajiIbu' class="form-control" placeholder="Pendapatan Ibu" />
		</td>
	</tr>
	<tr>
		<td>
			Bil. tanggungan :
		</td>
		<td>
			<input type='text' name='Bil_tanggung' class="form-control" placeholder="Bilangan tanggungan :" />
		</td>
	</tr>
	<tr>
		<td>
			No tel untuk dihubungi jika ada kecemasan :
		</td>
		<td>
			<input type='text' name='notelWaris' class="form-control" placeholder="No telefon Waris" />
		</td>
	</tr>
</table>
<font color="red">* sila pastikan borang telah lengkap sebelum klik pada butang dibawah</font>
<center><button type="submit" class="btn btn-default" name="daftar-pelajar">DAFTAR PELAJAR</button></center>
<br>
</form>
</div>
<script>
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
            $('#daerah').html('<option value="">- Pilih Daerah- </option>');
        }
    });
});

	</script>
</div>
</div>
</body>
