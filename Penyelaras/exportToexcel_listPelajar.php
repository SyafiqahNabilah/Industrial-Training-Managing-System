 <?php 
   include '..\session.php';
   include('..\dbcon.php');
   $check = $_SESSION['login_user'];
        $sql = "SELECT * FROM ojt_pensyarah WHERE username='$check'";
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_array($result);
		$pro = $row['Program'];
   		$sql = "SELECT ojt_pelajar.namaPelajar, ojt_pelajar.program,ojt_pelajar.nokpPelajar,ojt_industri.namaSyarikat,ojt_industri.Alamat, ojt_industri.Alamat2,ojt_industri.Poskod,ojt_industri.Daerah,ojt_industri.Negeri
		   	FROM `ref_seliaan`
		   	LEFT JOIN ojt_pelajar ON ref_seliaan.nokpPelajar = ojt_pelajar.nokpPelajar 
		   	LEFT JOIN ojt_pensyarah ON ref_seliaan.IDPensyarahPP = ojt_pensyarah.IDPensyarahPP  
		   	LEFT JOIN ojt_industri ON ref_seliaan.IDIndustri = ojt_industri.IDIndustri
		   	LEFT JOIN ojt_penyelia_industri ON ref_seliaan.IDPenyelia = ojt_penyelia_industri.IDPenyelia 
		   	WHERE ojt_pelajar.program LIKE '%$pro%' AND ref_seliaan.Status= ''";
			$pelajar = mysqli_query($con,$sql);
   	// $sql = "SELECT ojt_pelajar.namaPelajar, ojt_pelajar.program,ojt_pelajar.nokpPelajar ,ojt_industri.namaSyarikat, ojt_industri.Alamat, ojt_industri.Alamat2,ojt_industri.Poskod,ojt_industri.Daerah,ojt_industri.Negeri
	// 	   	FROM `ref_seliaan`
	// 	   	LEFT JOIN ojt_pelajar ON ref_seliaan.nokpPelajar = ojt_pelajar.nokpPelajar 
	// 	   	LEFT JOIN ojt_industri ON ref_seliaan.IDIndustri = ojt_industri.IDIndustri
	// 	   	WHERE ref_seliaan.status='' ORDER BY program ASC";
	// 		$pelajar = mysqli_query($con,$sql); ?>


<!DOCTYPE html>
<html>
<head>
	<title>Cetakkan Surat</title>
</head>
<style>
	table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    font-size: 12px;
    word-wrap: break-word;
   

}
table{
   width: 50%;
   table-layout: fixed;
}
</style>
<body>
	<form name="" method="post" >
		<input type="submit" name="export-excelByCourse" class="btn btn-default" value="Export to Excel">		
	</form>
	<br>
	<br>
	<br>
		<table class= "table table-striped table-bordered table-hover"  id="dataTables-example">
		<thead>
			<tr>
				<th width="20px">
					Bil.
				</th>
				<th width="50px">
					Kursus
				</th>
				<th>
					Nama pelajar
				</th>
				<th>
					Nama Tempat Latihan Organisasi
				</th>
				<th>
					Alamat
				</th>
			</tr>
		</thead>
		<tbody>
	<?php $num = 1;
	while($row = mysqli_fetch_array($pelajar)){
		$id = $row['nokpPelajar'];
		$sql2 = "SELECT ojt_pensyarah.namaPensyarah
				FROM ref_seliaan
				JOIN ojt_pensyarah ON ref_seliaan.IDPensyarahPPO = ojt_pensyarah.IDPensyarahPP
				WHERE ref_seliaan.nokpPelajar = '$id'";
		$infopelajar2 = mysqli_query($con,$sql2);
		while($row2 = mysqli_fetch_array($infopelajar2)){
		?> 
		<tr>
			<td>
				<?php echo $num++ ?>
			</td>
			<td>
				<?php echo $row['program'];?>
			</td>
			<td>
				<?php echo $row['namaPelajar'];?>
			</td>
			<td>
				<?php echo $row['namaSyarikat'];?>
			</td>
			<td>
				  <?php echo $row['Alamat'];?>, <?php echo $row['Alamat2'];?> ,<?php echo $row['Poskod'];?> , <?php echo $row['Daerah'];?> ,<?php echo $row['Negeri'];?>
			</td>
		</tr>
		<?php } } ?>
	</tbody>
	</table>
</div>
</div>
</div>
</div>
