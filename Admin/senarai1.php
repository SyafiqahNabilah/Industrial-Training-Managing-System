<?php include '..\dbcon.php'; 
include '..\session.php';
 $sql = "SELECT * FROM ojt_pelajar WHERE`tahun`= '5' ORDER BY program ASC";
 $pelajar = mysqli_query($con,$sql); ?>

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
}
table{
  width: 100%;
}
</style>
<body>
	<form name="" method="post" >
		<input type="submit" name="export-excel" class="btn btn-default" value="Export to Excel">		
	</form>
	<br>
	<br>
	<br>
<table>
	<thead>
	<tr>
		<th>
			Bil.
		</th>
		<th>
		Program 
		</th>
		<th>
		Nama 
		</th>
		<th>
		Angka Giliran 
		</th>
		<th>
		No Kad Pengenalan 
		</th>
		<th>
		Agama 
		</th>
		<th>
		Jantina 
		</th>
		<th>
		No telefon
		</th>
		<th>
		Alamat 
		</th>
		<th>
		Poskod  
		</th>
		<th>
		Daerah
		</th>
		<th>
		Negeri 
		</th>
		<th>
		Kecacatan 
		</th>
		<th>
		Nama Bapa 
		</th>
		<th>
		Pekerjaan Bapa 
		</th>
		<th>
		Pendapatan Bapa 
		</th>
		<th>
		Nama Ibu 
		</th>
		<th>
		Pekerjaan Ibu 
		</th>
		<th>
		Pendapatan Ibu 
		</th>
		<th>
		No telefon Waris 
		</th>
		<th>
		Bilangan tanggungan 
		</th>
		</tr>
	</thead>
	<?php 
		$num = 1;
		while($row = mysqli_fetch_array($pelajar)){ ?>
	<tbody>
		<tr>
		<td>
			<?php echo $num++ ?>
		</td>
		<td>
			<?php echo $row['program']; ?>
		</td>
		<td>
			<?php echo $row['namaPelajar']; ?>
		</td>
		<td>
			<?php echo $row['AngkaGiliran']; ?>
		</td>
		<td>
			<?php echo $row['nokpPelajar']; ?>
		</td>
		<td>
			<?php echo $row['agama']; ?>
		</td>
		<td>
			<?php echo $row['jantina']; ?>
		</td>
		<td>
			<?php echo $row['notelPelajar']; ?>
		</td>
		<td>
			<?php echo $row['alamat'];  ?>
		</td>
		<td>
			<?php echo $row['poskod'];?>
		</td>
		<td>
			<?php echo $row['daerah'];?>
		</td>
		<td>
			<?php echo $row['negeri'];?>
		</td>
		<td>
			<?php echo $row['kecacatan'];  ?>
		</td>
		<td>
			<?php echo $row['namaPenjaga'];  ?>
		</td>
		<td>
			<?php echo $row['kerjaBapa'];  ?>
		</td>
		<td>
			<?php echo $row['gajiBapa'];  ?>
		</td>
		<td>
			<?php echo $row['namaIbu'];  ?>
		</td>
		<td>
			<?php echo $row['kerjaIbu'];  ?>
		</td>
		<td>
			<?php echo $row['gajiIbu'];  ?>
		</td>
		<td>
			<?php echo $row['notelWaris'];  ?>
		</td>
		<td>
			<?php echo $row['Bil_tanggung'];  ?>
		</td>
		</tr>
	</tbody>
	<?php } ?>
</table>

</body>
</html>