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
			while ($row1 = mysqli_fetch_array($hasil)) {
			
			$query2 ="SELECT * FROM ojt_penyelia_industri WHERE IDPenyelia = '$Idp'";
			$hasil2 = mysqli_query($con,$query2);
			while ($row2 = mysqli_fetch_array($hasil2)) {?>
					<label>Nama Penyelia di Industri :</label>
					<input type="text" value="<?php echo $row2['namaPenyelia']; ?>" class="form-control input-form">
					<label>Tempat Latihan Industri: </label>
					<input type="text" value="<?php echo $row1["namaSyarikat"]; ?>" class="form-control input-form">
		<?php }
			}
		}
		}
		else
		{
			$yy = "SELECT * FROM ref_seliaan";
		}

		
		echo $output;
	}
if(isset($_GET["idNegeri"]) && !empty($_GET["idNegeri"])){
    //Get all state data
    $id=$_GET["idNegeri"];
    echo $id;
    $query ="SELECT * FROM ojt_daerah WHERE idNegeri='$id' ORDER BY namaDaerah ASC";
    $hasil = mysqli_query($con,$query);

    //Count total number of rows
    $count = mysqli_num_rows($hasil);
   
    if($count =1){
        echo '<option value="">Pilih Daerah</option>';
        while($rows =mysqli_fetch_assoc($hasil)){ 
            echo '<option value="'.$rows['namaDaerah'].'">'.$rows['namaDaerah'].'</option>';
        }
    }
    else{
        echo '<option value="">- Tiada maklumat Daerah - </option>';
    }
}


?>
