<?php
   if (isset($_GET['tambah'])) {
		$nokp = $_GET['tambah'];
		$sql = "SELECT * FROM ojt_pelajar WHERE nokpPelajar='$nokp'";
		$resultpelajar = mysqli_query($con,$sql);
		 } 
?>
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
		<h2 class="page-header"> Penetapan Seliaan </h2>
		<div class = "alert alert-danger">
        <h4>Pastikan anda telah mendaftarkan Organisasi dan Penyelia Organisasi sebelum menetapkan seliaan</h4>
		Isi borang untuk menetapkan penyeliaan untuk pelajar dan klik butang "Tetapkan Seliaan " untuk menambah seliaan. <br>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-10 col-md-10">
		<form action="" method="post"> <br>
		<table class="table table-striped table-bordered table-hover" id="dataTables-example">
	<tr>
		<th colspan="2">
			Borang Penetapan Seliaan
		</th>
	</tr>
	<tr>
		<td width="40%">
			Nama Penuh Pelajar :
		</td>
		<td width="60%">
		<select name="nokpPelajar" class="form-control">
		<?php while ($row=mysqli_fetch_assoc($resultpelajar)) {
              echo '<option value="'.$row['nokpPelajar'].'">'.$row['namaPelajar'].'</option>';}?>
		</select>
		</td>
	</tr>
	<tr>
		<td>
			Pilih Pensyarah Penilai  :
		</td>
		<td>
			<select name="IDPensyarahPP" class="form-control">
		<?php $sql = mysqli_query($con, "SELECT * FROM ojt_pensyarah ORDER BY namaPensyarah ASC");
			  $row = mysqli_num_rows($sql);
			  echo "<option>- Pilih Pensyarah Penilai -</option>";
			  while ($row=mysqli_fetch_assoc($sql)) {
              echo '<option value="'.$row['IDPensyarahPP'].'">'.$row['namaPensyarah'].'</option>';}?>
		</select>
		</td>
	</tr>
	<tr>
		<td>
			Pilih Pensyarah Penyelia OJT :
		</td>
		<td>
		<select name="IDPensyarahPPO" class="form-control">
		<?php $sql = mysqli_query($con, "SELECT * FROM ojt_pensyarah ORDER BY namaPensyarah ASC");
			  $row = mysqli_num_rows($sql);
			  echo "<option>- Pilih Pensyarah Penyelia OJT -</option>";
			  while ($row=mysqli_fetch_assoc($sql)) {
              echo '<option value="'.$row['IDPensyarahPP'].'">'.$row['namaPensyarah'].'</option>';}?>
		</select>
		</td>
	</tr>
	<tr>
		<td>
			Pilih Organisasi
		</td>
		<td>
		<?php $sql = mysqli_query($con, "SELECT * FROM ojt_industri ORDER BY namaSyarikat ASC"); ?>
		<select name="industri" class="form-control" id="industri">
		<?php 
			  echo "<option>- Pilih Organisasi -</option>";
			  while ($row=mysqli_fetch_array($sql)) {
              echo '<option value="'.$row['IDIndustri'].'">'.$row['namaSyarikat'].'</option>';}
        ?>
		</select>
		</td>
	</tr>
	<tr>
		<td>
			Pilih Penyelia Organisasi:
		</td>
		<td>
		<select name="penyelia" id="penyelia" class="form-control">
		 <option value="">-Pilih Penyelia Organisasi-</option>
		</select>
		</td>
	</tr>

</table>
<center><button type="submit" class="btn btn-info" name="daftarSeliaan">TETAPKAN SELIAAN </button></center>
<br>
</form>
<br>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $('#industri').on('change',function(){
        var IDIndustri = $(this).val();
        if(IDIndustri){
            $.ajax({
                type:'GET',
                url:'ajaxData.php',
                data:'IDIndustri='+IDIndustri,
                success:function(html){
                    $('#penyelia').html(html);
                }
            }); 
        }else{
            $('#penyelia').html('<option value="">Pilih Industri </option>');
        }
    });
});
</script>
</div>
</div>
</body>

