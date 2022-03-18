<?php 
include 'headerAdmin.php';
?>
<div id="page-wrapper">
<div class="row">
<div class="col-lg-12">
    <h2 class="page-header">Pengumuman</h2>
    <div class = "alert alert-info">
    1. Pada bahagian ini pengguna dibenarkan untuk membuat pengumuman kepada semua yang terlibat dengan program ojt<br>
    2. Pengumuman ini akan dipaparkan pada muka hadapan sistem.
    </div>
</div>
</div>
<div class="row">

    <div class="col-lg-6 col-md-10">
    <form role="form" action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label>Tajuk Pengumuman</label>
        <input class="form-control" name="title">
        <p class="help-block">Berikan tajuk kepada pengumuman</p>
    </div>
    <div class="form-group">
        <label>Gambar yang dimuatnaik</label>
        <input type="file" name="image">
    </div>
    <div class="form-group">
        <label>Pengumuman </label>
        <textarea class="form-control" rows="10" name="content"></textarea>
    </div>
    <button type="submit" class="btn btn-default" name="submitPost">POST</button>
    </form> <br>
</div>
</div>
</div>

</body>
