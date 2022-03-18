<?php
 include 'dbcon.php';
   	$sql = "SELECT ojt_pelajar.namaPelajar, ojt_pelajar.program,ojt_pelajar.nokpPelajar, ojt_pensyarah.namaPensyarah AS Pensyarah1 ,ojt_industri.namaSyarikat, ojt_penyelia_industri.namaPenyelia
		   	FROM `ref_seliaan`
		   	LEFT JOIN ojt_pelajar ON ref_seliaan.nokpPelajar = ojt_pelajar.nokpPelajar 
		   	LEFT JOIN ojt_pensyarah ON ref_seliaan.IDPensyarahPP = ojt_pensyarah.IDPensyarahPP  
		   	LEFT JOIN ojt_industri ON ref_seliaan.IDIndustri = ojt_industri.IDIndustri
		   	LEFT JOIN ojt_penyelia_industri ON ref_seliaan.IDPenyelia = ojt_penyelia_industri.IDPenyelia
		   	WHERE ref_seliaan.status='' ORDER BY ojt_pelajar.program ASC, ojt_pelajar.namaPelajar ASC";
			$pelajar = mysqli_query($con,$sql); ?>
<!DOCTYPE html>
<html>
<head>
<title>Sistem Pengurusan Maklumat Latihan Industri</title>
 <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="style2.css">
  <link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet"> 
  <script src="js/jquery.min.js" type="text/javascript"></script>
  <script src="js/bootstrap.min.js" type="text/javascript"></script>
  <script src="js/jquery.dataTables.min.js" type="text/javascript"></script>
  <script src="js/dataTables.bootstrap.min.js" type="text/javascript"></script>
  <script type="text/javascript">
   var elems = document.getElementsByClassName('confirmation');
    var confirmIt = function (e) {
        if (!confirm('Are you sure to delete?')) e.preventDefault();
    };
    for (var i = 0, l = elems.length; i < l; i++) {
        elems[i].addEventListener('click', confirmIt, false);
    }
    
  </script>
</head>

<body style="background-color: #f8f8f8;">
<div id="wrapper">
     <div class="container-fluid-full" >
       <center><img src="src/spmli.png"></center>
   <div class="container" style="background-color: #fff;" >  
      <center><h2><marquee>Selamat Datang ke Sistem Pengurusan Maklumat Latihan Industri</marquee></h2></center> 
      <hr>
      <br><br/>
    
    <div class="col-lg-12 col-md-12">
    <table class= "table table-striped table-bordered table-hover"  id="dataTables-example">
		<thead>
			<tr>
				<th>
					Bil.
				</th>
				<th>
					Kursus
				</th>
				<th>
					Nama pelajar
				</th>
				
				<th>
					Nama PP
				</th>
				<th>
					Nama PPO
				</th>
				<th>
					Nama Tempat Latihan Organisasi
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
				<?php echo $row['Pensyarah1'];?>
			</td>
			<td>
				<?php echo $row2['namaPensyarah'];?>
			</td>
			<td>
				<?php echo $row['namaSyarikat'];?>
			</td>
		</tr>
		<?php } } ?>
	</tbody>
	</table>
    </div>
    </div>
        

    </div><!--/.fluid-container-->
    </div>
	<script>
  $(document).ready(function(){
    $('#dataTables-example').DataTable();
  });
	</script>
  <!--/fluid-row-->
  </div>
</body>
</html>
