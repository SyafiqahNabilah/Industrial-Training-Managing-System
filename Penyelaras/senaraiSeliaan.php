 <?php include 'header-penyelaras.php';
 		$check = $_SESSION['login_user'];
        $sql = "SELECT * FROM ojt_pensyarah WHERE username='$check'";
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_array($result);
		$pro = $row['Program'];
   		$sql = "SELECT ojt_pelajar.namaPelajar, ojt_pelajar.program,ojt_pelajar.kelas,ojt_pelajar.nokpPelajar, ojt_pensyarah.namaPensyarah AS Pensyarah1 ,ojt_industri.namaSyarikat, ojt_penyelia_industri.namaPenyelia
		   	FROM `ref_seliaan`
		   	LEFT JOIN ojt_pelajar ON ref_seliaan.nokpPelajar = ojt_pelajar.nokpPelajar 
		   	LEFT JOIN ojt_pensyarah ON ref_seliaan.IDPensyarahPP = ojt_pensyarah.IDPensyarahPP  
		   	LEFT JOIN ojt_industri ON ref_seliaan.IDIndustri = ojt_industri.IDIndustri
		   	LEFT JOIN ojt_penyelia_industri ON ref_seliaan.IDPenyelia = ojt_penyelia_industri.IDPenyelia 
		   	WHERE ojt_pelajar.program LIKE '%$pro%' AND ref_seliaan.Status= ''";
			$pelajar = mysqli_query($con,$sql); 
			include '..\page/func_list_pelajar.php';
			
			?>

