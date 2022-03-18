
<?php include 'headerAdmin.php';

if (isset($_GET['kemaskiniSeliaan'])) {
		$nokp = $_GET['kemaskiniSeliaan'];
		$sql = "SELECT * FROM ojt_pelajar WHERE nokpPelajar='$nokp'";
		$resultpelajar = mysqli_query($con,$sql);
		 } 
if (isset($_GET['kemaskiniSeliaan'])) {
	$nokp = $_GET['kemaskiniSeliaan'];
	$sql = "SELECT ojt_pelajar.namaPelajar, ojt_pelajar.program,ojt_pelajar.nokpPelajar, ojt_pensyarah.namaPensyarah AS Pensyarah1 ,ojt_industri.namaSyarikat, ojt_penyelia_industri.namaPenyelia,ref_seliaan.IDPensyarahPP,ojt_industri.IDIndustri,ref_seliaan.IDPenyelia
		   	FROM `ref_seliaan`
		   	LEFT JOIN ojt_pelajar ON ref_seliaan.nokpPelajar = ojt_pelajar.nokpPelajar 
		   	LEFT JOIN ojt_pensyarah ON ref_seliaan.IDPensyarahPP = ojt_pensyarah.IDPensyarahPP  
		   	LEFT JOIN ojt_industri ON ref_seliaan.IDIndustri = ojt_industri.IDIndustri
		   	LEFT JOIN ojt_penyelia_industri ON ref_seliaan.IDPenyelia = ojt_penyelia_industri.IDPenyelia
   			WHERE ref_seliaan.nokpPelajar = '$nokp'";
	$infopelajar = mysqli_query($con,$sql); 
}

   ?>
		
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-7">
		<h2 class="page-header">Kemaskini Maklumat Seliaan Pelajar</h2>
		sekiranya ingin melakukan pengemaskinian sila isi borang dan klik butang kemaskini.
		<br>
		</div>
	</div>
	<div class="row">
	<div class="col-lg-10 col-md-10">
	<?php while($row = mysqli_fetch_array($resultpelajar)){ 
		while($rows = mysqli_fetch_array($infopelajar)){ 
				$id = $row['nokpPelajar'];
	$sql2 = "SELECT ojt_pensyarah.namaPensyarah,ref_seliaan.IDPensyarahPPO,ojt_pensyarah.IDPensyarahPP
			FROM ref_seliaan
			JOIN ojt_pensyarah ON ref_seliaan.IDPensyarahPPO = ojt_pensyarah.IDPensyarahPP
			WHERE ref_seliaan.nokpPelajar = '$id'";
	$infopelajar2 = mysqli_query($con,$sql2);
	while($row3 = mysqli_fetch_array($infopelajar2)){ ?>
	<br><br>
	<form action="" method="post">
	<table class="table table-striped table-bordered table-hover"  id="dataTables-example">
	<tr>
		<th colspan="2">
			Kemaskini Maklumat Pelajar
		</th>
	</tr>
	<tr>
		<td width="40%">
			Nama Penuh Pelajar :
		</td>
		<td width="60%">
			<?php echo $row['namaPelajar'];?>
		</td>
	</tr>
	<tr>
		<td>
			No Kad Pengenalan :
		</td>
		<td>
			<input type='text' name='nokpPelajar' class="form-control" value="<?php echo $row['nokpPelajar'];?>"/>
		</td>
	</tr>
	<tr>
		<td>
			Pilih Pensyarah Penilai :
		</td>
		<td>
			<select name="IDPensyarahPP" class="form-control">
			<option value="<?php echo $rows['IDPensyarahPP'];?>"><?php echo $rows['Pensyarah1'];?></option>
		<?php $sql = mysqli_query($con, "SELECT * FROM ojt_pensyarah ORDER BY namaPensyarah ASC");
			  $row = mysqli_num_rows($sql);
			  echo "<option>- - - - - - - - PILIH SATU - - - - - - - -</option>";
			  while ($row4=mysqli_fetch_assoc($sql)) {
              echo '<option value="'.$row4['IDPensyarahPP'].'">'.$row4['namaPensyarah'].'</option>';}?>
		</select>
		</td>
	</tr>
	<tr>
		<td>
			Pilih Pensyarah Penyelia OJT :
		</td>
		<td>
		<select name="IDPensyarahPPO" class="form-control">
		<option value="<?php echo $row3['IDPensyarahPP'];?>"><?php echo $row3['namaPensyarah'];}?></option>
		<?php $sql = mysqli_query($con, "SELECT * FROM ojt_pensyarah ORDER BY namaPensyarah ASC");
			  $row = mysqli_num_rows($sql);
			  echo "<option>- - - - - - - - PILIH SATU - - - - - - - -</option>";
			  while ($row5=mysqli_fetch_assoc($sql)) {
              echo '<option value="'.$row5['IDPensyarahPP'].'">'.$row5['namaPensyarah'].'</option>';}?>
		</select>
		</td>
	</tr>
	<tr>
		<td>
			Pilih organisasi :
		</td>
		<td>
		<?php $sql = mysqli_query($con, "SELECT * FROM ojt_industri ORDER BY namaSyarikat ASC"); ?>
		<select name="industri" class="form-control" id="industri">
		<?php 
			  echo '<option value="'.$rows['IDIndustri'].'">'.$rows['namaSyarikat'].'</option>';
			  while ($row=mysqli_fetch_array($sql)) {
              echo '<option value="'.$row['IDIndustri'].'">'.$row['namaSyarikat'].'</option>';}
        ?>
		</select>
		</td>
	</tr>
	<tr>
		<td>
			Pilih Penyelia Organisasi :
		</td>
		<td>
		<select name="penyelia" id="penyelia" class="form-control">
		 <option value="<?php echo $rows['IDPenyelia'];?>"><?php echo $rows['namaPenyelia']; ?></option>
		 <option value="">-Pilih Industri Dahulu-</option>
		</select>
		</td>
	</tr>

</table>
<center><button type="submit" class="btn btn-default" name="kemaskiniSeliaan">KEMASKINI</button></center>
<br>
</form>
<?php } }?>
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

