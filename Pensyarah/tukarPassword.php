<?php 
include 'header-pensyarah.php';
include '..\dbConnect.php';
  $username = $_GET['dapat'];
if (isset($_GET['dapat'])) {
        $username = $_GET['dapat'];
        $sql = "SELECT * FROM `ojt_pengguna` WHERE username='$username'";
        $resultKemaskini = mysqli_query($con,$sql); } ?>

<div id="page-wrapper">
    <div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Tukar Katalaluan</h2>
    </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-md-8">
        <?php while($row = mysqli_fetch_array($resultKemaskini)){ ?>
        <form action="" method="post">
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <td>
                    Username:
                </td>
                <td>
                   <?php echo $row['username'];?>
                </td>
            </tr>
            <tr>
                <td>
                    password:
                </td>
                <td>
                    <input type='password' name='password' size="35" class="form-control" value="<?php echo $row['password'];?>"/>
                </td>
            </tr>
        </table>
        <center><button type="submit" class="btn btn-default" value="<?php echo $row['username'];?>" name="kemaskini-password">KEMASKINI</button>
        </form>
<?php }?>
</div>
</div>
</body>
