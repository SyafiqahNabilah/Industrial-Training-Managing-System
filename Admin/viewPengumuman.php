 <?php
		include 'headerAdmin.php';   
        if (isset($_GET['lihat'])) {
		$id = $_GET['lihat'];
		$sql = "SELECT * FROM ojt_post WHERE id ='$id'";
		$viewPost = mysqli_query($con,$sql); } ?>
		
<div id="page-wrapper">
<div class="row">
    <div class="col-lg-12">
        <h2>Kemaskini Pengumuman</h2>
        <br>
    </div>
</div>
 <div class="row">

    <div class="col-lg-6 col-md-10">
    <?php while($row=mysqli_fetch_array($viewPost)){ ?>
    <form role="form" action='<?php echo "..\session.php?kemaskiniPost=".$row['id'];?>' method="POST" >
    <div class="form-group">
        <label>Tajuk Pengumuman</label>
        <input class="form-control" name="title" value="<?php echo $row['title'];?>">
        <p class="help-block">Kemaskini tajuk kepada pengumuman</p>
    </div>
    <div class="form-group">
        <label>Huraian </label>
        <textarea class="form-control" rows="10" name="content"><?php echo $row['content'];?></textarea>
    </div>
    <button type="submit" class="btn btn-default" name="kemaskiniPost">Kemaskini</button>
    <?php } ?>
    </form> <br>
</div>
</div>
</div>
</div>
</body>
