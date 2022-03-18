<?php include '..\dbcon.php'; 
	$output = '';

	if (isset($_POST['nokpPelajar'])) 
	{	
		$nokp = $_POST['nokpPelajar'];
		if ($_POST['nokpPelajar'] != '') 
		{
			$sql = "SELECT * FROM ref_seliaan WHERE ref_seliaan.nokpPelajar = '$nokp' ";
			$result = mysqli_query($con,$sql);
		while ($row = mysqli_fetch_array($result)) {
			$IdSyarikat = $row['IDIndustri'];
			$Idp = $row['IDPenyelia'];

			$query = "SELECT * FROM ojt_industri WHERE IDIndustri = '$IdSyarikat'";

			$hasil = mysqli_query($con,$query);
			while ($row1 = mysqli_fetch_array($hasil)) {?>

					<label>Tempat Latihan Industri: </label>
					<input type="text" value="<?php echo $row1["namaSyarikat"]; ?>" class="form-control input-form">
		<?php }
			}
		}
		else
		{
			$yy = "SELECT * FROM ref_seliaan";
		}
		
		echo $output;
	}

?>
