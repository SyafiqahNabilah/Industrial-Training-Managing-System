<?php include 'headerAdmin.php';
   $sql = "SELECT * FROM ojt_pensyarah ORDER BY namaPensyarah ASC";
   $infopensyarah = mysqli_query($con,$sql); 
?>
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h2 class="page-header">Senarai Pensyarah</h2>
			<div class = "alert alert-info">
			Menyenaraikan pensyarah yang telah didaftarkan . klik pada "Kemaskini" untuk melakukan pengemaskinian maklumat pensyarah.
			</div>
		</div>
	</div>
<div class="row">
	<div class="col-lg-12 col-md-12">	
<table class="table table-striped table-bordered table-hover" id="CariPensyarah">
<thead>
	<tr>
		<th>
			Bil.
		</th>
		<th>
			Nama Pensyarah
		</th>
		<th>
			Program
		</th>
		<th>
			Jabatan
		</th>
		<th>
			Action
		</th>
	</tr>
</thead>
<tbody>
	<tr>
	<?php
		$num = 1;
		while($row = mysqli_fetch_array($infopensyarah)){ ?>
		<td>
			<?php echo $num++ ?>
		</td>
		<td>
			<?php echo $row['namaPensyarah'];?>
		</td>
		<td>
			<?php echo $row['Program'];?>
		</td>
		<td>
			<?php echo $row['jabatan'];?>
		</td>
		<td>
			<center><a class="btn btn-default" href="kemaskiniPensyarah.php?kemaskiniPensyarah=<?php echo $row['IDPensyarahPP'];?>">Kemaskini Maklumat</a>
			 <!-- <a href="..\session.php?deletePensyarah=<?php echo $row['IDPensyarahPP'];?>" onclick="return tukarstatus()">HAPUS</a> -->
		</td></center>
		</td>
	</tr>
	<?php }?>
	</tbody>
</table>
<script>
  	$(document).ready(function(){
    $('#CariPensyarah').DataTable();
  });
  	function tukarstatus(){
      var x = confirm("Anda pasti mahu membuang data pensyarah ini?");

      if(x==true)
      {
        return true;
      }
      else
      {
        return fal
      }
    }
  </script>
</div>
</div>
</div>
</Body>