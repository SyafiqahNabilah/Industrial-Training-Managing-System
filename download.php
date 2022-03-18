<?php
include 'dbcon.php';
$name = $_GET['download'];
$query="SELECT * FROM ojt_borang WHERE name='$name'";
$upload = mysqli_query($con,$query);
while($row=mysqli_fetch_array($upload)){

	$name = $row['name'];
	header('content-Disposition: attachment; filename = '.$name.'');
	header('content-type:application/octent-strem');
	header('content-length='.filesize($name));
	readfile($name);
}
$name = $_GET['respon'];
$query="SELECT * FROM ojt_borangrespon_penyelia WHERE name='$name'";
$upload = mysqli_query($con,$query);
while($row=mysqli_fetch_array($upload)){

	$name = $row['name'];
	header('content-Disposition: attachment; filename = '.$name.'');
	header('content-type:application/octent-strem');
	header('content-length='.filesize($name));
	readfile($name);
}
?>