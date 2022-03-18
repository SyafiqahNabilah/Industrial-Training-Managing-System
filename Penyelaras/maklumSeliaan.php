<?php 
include 'header-penyelaras.php';
	
function senaraikan($con){
	$check = $_SESSION['login_user'];
    $sql = "SELECT * FROM ojt_pensyarah WHERE username='$check'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);
	$id = $row['IDPensyarahPP'];
	$output = '';
	$sql = "SELECT ojt_pelajar.namaPelajar , ojt_pelajar.nokpPelajar , ojt_pelajar.notelPelajar
						  	FROM ref_seliaan
						  	LEFT JOIN ojt_pelajar ON ref_seliaan.nokpPelajar = ojt_pelajar.nokpPelajar
						  	WHERE ref_seliaan.IDPensyarahPP = '$id' AND ref_seliaan.Status= '' OR ref_seliaan.IDPensyarahPPO = '$id' AND ref_seliaan.Status=''";
   	$result=mysqli_query($con,$sql);
   	while ($row = mysqli_fetch_array($result)) 
   	{
   		$output .= '<option value="'.$row["nokpPelajar"].'">'.$row["namaPelajar"].'</option>';
   	}
   	return $output;
}
?>

<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h2 class="page-header">Maklumbalas Seliaan pelajar</h2>
		</div>
		<div class="col-lg-5 col-md-5">
		<form enctype="multipart/form-data" action="" method="post">
			 <label>Nama Pelajar</label>		 
			 <select id="senaraiPelajar" class="form-control input-form" name="nokpPelajar">
			 <option value="">- Pilih Pelajar -</option>
			 <?php echo senaraikan($con);?>
			 </select>
			 <div id="maklumat">
			 </div>
			 <label>Seliaan Kali ke : </label>
			 <select class="form-control input-form" name="bilSeliaan">
			 	<option value="1">1</option>
			 	<option value="2">2</option>
			 	<option value="3">3</option>
			 	<option value="4">4</option>
			 </select>

			<?php $check = $_SESSION['login_user'];
					$pensyarah = "SELECT * FROM ojt_pensyarah WHERE username='$check'";
					$result = mysqli_query($con,$pensyarah);
						while($rows = mysqli_fetch_array($result)){ ?>

			<label>Nama pensyarah yang memberi maklumbalas : </label>
			<select  class="form-control input-form" name="IDPensyarahPP">
				<option value="<?php echo $rows['IDPensyarahPP'];?>"><?php echo $rows['namaPensyarah'];}?></option>
			</select><br>

			<label>Melakukan seliaan sebagai : </label>
			<select  class="form-control input-form" name="sebagai">
				<option value="">- Pilih -</option>
				<option value="Pensyarah Penyelia">Pensyarah Penilai (PP)</option>
				<option value="Pensyarah Penyelia /Organisasi">Pensyarah Penyelia OJT (PPO)</option>
			</select><br>

			<label>Tarikh Seliaan contoh: </label><br>
			<input type="date" name="TarikhSeliaan" /><br>

			<label>Laporan</label>
			<textarea name="mesej" class="form-control input-form" rows="10"></textarea>
	</div>
			<div class="col-lg-5 col-md-5">
                     <div class="form-group">
				        <label>Image </label>
				        <div id="filediv"><input type="file" id="file" name="Images"/></div><br>
		        		<div id="filediv2"><input type="file" id="file2" name="Images2"/></div><br>
		        	</div>
				<button type="submit" class="btn btn-default" name="submitMaklum">Hantar</button>
	</div>
	</form>
			</div>
	<script>
			var abc = 0; 
        	var def= 0; 
		$(document).ready(function(){
			$('#senaraiPelajar').change(function(){
				var nokpPelajar = $(this).val();
				$.ajax({
					url:"load.php",
					method : "POST",
					data : {nokpPelajar:nokpPelajar},
					success:function(data){
						$('#maklumat').html(data);
					}
				});
			});

        		$('body').on('change', '#file', function(){
            if (this.files && this.files[0]) {
                 abc += 1; //increementing global variable by 1
				
				var z = abc - 1;
                var x = $(this).parent().find('#previewimg' + z).remove();
                $(this).before("<div id='abcd"+ abc +"' class='abcd'><img  style='width:180px;' id='previewimg" + abc + "' src=''/></div>");
               
			    var reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);
               
			    $(this).hide();
                $("#abcd"+ abc).append($("<img/>", {id: 'img', src: 'delete.png', alt: 'delete'}).click(function() {
                $(this).parent().parent().remove();
                }));
            }
        });

				$('body').on('change', '#file2', function(){
            if (this.files && this.files[0]) {
                 def += 1; //increementing global variable by 1
                
                var z = def - 1;
                var x = $(this).parent().find('#previewimg2' + z).remove();
                $(this).before("<div id='defg"+ def +"' class='defg'><img style='width:180px;' id='previewimg2" + def + "' src=''/></div>");
               
                var reader = new FileReader();
                reader.onload = imageIsLoaded2;
                reader.readAsDataURL(this.files[0]);
               
                $(this).hide();
                $("#defg"+ def).append($("<img/>", {id: 'img', src: 'delete.png', alt: 'delete'}).click(function() {
                $(this).parent().parent().remove();
                }));
            }
        });
				function imageIsLoaded(e) {
			        $('#previewimg' + abc).attr('src', e.target.result);
			    };
			    function imageIsLoaded2(e) {
			        $('#previewimg2' + def).attr('src', e.target.result);
			    };
        });
	</script>
</div>
</body>