<?php include 'headerAdmin.php';
   $sql = "SELECT * FROM `OJT_Pelajar` WHERE Tahun ='4'";
   $resultpelajar = mysqli_query($con,$sql);
   ;?>

<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
		<h2 class="page-header">Status Pelajar</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12">
		<div class = "alert alert-info">
		 1.Maklumat pelajar tahun 4 diambil dari Sistem Pengurusan Kolej Kediaman KVPJB<br>
         2. Klik pada butang <b> "Tukar Status"</b> untuk menukar status Tahun 4 kepada Status OJT. <br>
         3. Setelah status ditukar kepada status OJT, nama pelajar yang telah ditukar statusnya akan berada di dalam senarai pelajar ojt.
         </div><br>
<table class="table table-striped table-bordered table-hover" id="myStat">
<thead>
	<tr>
		<th>
			Bil.
		</th>
		<th>
			Program
		</th>
		<th>
			Nama pelajar
		</th>
		<th>
			Angka Giliran
		</th>
		<th>
			No Kad Pengenalan
		</th>
		<th>
			Tindakan 
		</th>
	</tr>
</thead>
<tbody>
	<tr>
	<?php
		$num = 1;
		while($row = mysqli_fetch_array($resultpelajar)){ ?>
		<td>
			 <?php echo $num++ ?>
		</td>
		<td>
			<?php echo $row['program']." ".$row['kelas'];?>
		</td>
		<td>
			 <?php echo $row['namaPelajar'];?>
		</td>
		<td>
			 <?php echo $row['AngkaGiliran'];?>
		</td>
		<td>
			 <?php echo $row['nokpPelajar'];?>
		</td>
		<td>
			<a  class="btn btn-default" href="..\session.php?tukarstatus=<?php echo $row['nokpPelajar'];?>" onclick="return tukarstatus()" >Tukar Status</a>
		</td>
	</tr>
	<?php } ?>
</tbody>
</table>
<script type="text/javascript">
  $(document).ready(function(){
    $('#myStat').DataTable();
  });

  function tukarstatus(){
      var x = confirm("Anda pasti mahu menukar status pelajar ini?");

      if(x==true)
      {
        return true;
      }
      else
      {
        return false;
      }
    }
</script>
</div>
</div>

</div>
</body>
   

