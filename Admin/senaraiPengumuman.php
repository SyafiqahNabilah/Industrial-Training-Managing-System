 <?php include 'headerAdmin.php';
   $query="select * from ojt_post ORDER BY id DESC";
   $upload = mysqli_query($con,$query);
?>
<div id="page-wrapper">
<div class="row">
    <div class="col-lg-12">
        <h2>Senarai Pengumuman </h2>
        <div class = "alert alert-info">
         1. Membenarkan pengurusan bagi posting yang telah dipost ke muka hadapan.<br>
         2. Klik pada butang <img src='..\src/delete.png' width="20px"> untuk membuang posting yang telah di buat.<br>
         3. Pada muka hadapan sistem akan dipaparkan 3 posting terbaru sahaja.</div>
        <br>
    </div>
</div>
 <div class="row">
    <div class="col-lg-10 col-md-10">
        <table  class="table table-striped table-bordered table-hover" id="myPost">
        <thead>
            <tr>
                <th>
                   Bil.
                </th>
                <th>
                    Nama Post
                </th>
                <th>
                    Tarikh
                </th>
                <th colspan="2">
                    Tindakan
                </th>
            </tr>
        </thead>
        <tbody>
        <tr>
            <?php 
            $num = 1; 
            while($row=mysqli_fetch_array($upload)){ ?>
            <td>
                <?php echo $num++ ?>
            </td>
            <td>
                <?php echo $row['title'];?>
            </td>
            <td>
                <?php echo $row['date'];?>
            </td>
            <td><form action='' method='post'>
            <button style='background-color: Transparent; border: none;' name="deletePosting" type="submit" value="<?php echo $row['id'];?> " data-toggle="tooltip" title="Buang pengumuman" onclick="return confirm('Are you sure to delete?')" class="comfirmation"><img src='..\src/delete.png'></button>
            <button class="btn btn-default"><a href="viewPengumuman.php?lihat=<?php echo $row['id'];?>">Lihat pengumuman</a></button>
            </form>
            </td>
        </tr>
        <?php }?>
    </tbody>
</table>
    <script>
    $(document).ready(function(){
    $('#myPost').DataTable();
  });
  </script>

</div>  
</div>
</div>
</div>
</body>
