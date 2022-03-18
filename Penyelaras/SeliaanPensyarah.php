    <?php 
include 'header-penyelaras.php';
        $check = $_SESSION['login_user'];
        $sql = "SELECT * FROM ojt_pensyarah WHERE username='$check'";
        $result = mysqli_query($con,$sql); ?>
<div id="page-wrapper">
<div class="row">
<div class="col-lg-12">
    <h2 class="page-header">Senarai Seliaan Semasa</h2>
</div>
</div>
<div class="row">
<?php 
    
    while($row=mysqli_fetch_array($result)){
    $idpensyarah = $row['IDPensyarahPP'];
    $seliaan = "SELECT ojt_pelajar.namaPelajar , ojt_industri.namaSyarikat, ojt_industri.Alamat, ojt_penyelia_industri.namaPenyelia,ojt_pelajar.kelas,ojt_pelajar.program
    FROM ref_seliaan
    LEFT JOIN ojt_pelajar ON ref_seliaan.nokpPelajar = ojt_pelajar.nokpPelajar
    LEFT JOIN ojt_industri ON ref_seliaan.IDIndustri = ojt_industri.IDIndustri
    LEFT JOIN ojt_penyelia_industri ON ref_seliaan.IDPenyelia = ojt_penyelia_industri.IDPenyelia
    WHERE ref_seliaan.IDPensyarahPP = $idpensyarah AND ref_seliaan.Status= '' ";
    $Hasil = mysqli_query($con,$seliaan); ?>
    <h4>Memaparkan senarai seliaan bagi pensyarah. Klik pada <img src="../src/Printer.png" width="20px" >untuk mencetak senarai. </h4><br>
    <h4><b>SEBAGAI PENSYARAH PENYELIA (PP)</b></h4><br>
    <table class="table table-striped table-bordered table-hover" id="myData">
        <thead>
            <tr>
                <th>
                    Bil.
                </th>
                <th>
                    Kelas
                </th>
                <th>
                    Nama pelajar
                </th>
                <th>
                    Nama Syarikat Latihan Industri
                </th>
                <th>
                    Alamat Syarikat
                </th>
                <th>
                    Nama Penyelia
                </th>
            </tr>
        </thead>
        <?php 
        $num = 1;
        while ($rows = mysqli_fetch_array($Hasil)) {?>
        <tbody> 
                <td>
                    <?php echo $num++?>
                </td>
                <td>
                    <?php echo $rows['program']." ".$rows['kelas'];?>
                </td>
                <td>
                    <?php echo $rows['namaPelajar'];?>
                </td>
                <td>
                    <?php echo $rows['namaSyarikat'];?>
                </td>
                <td>
                    <?php echo $rows['Alamat'];?>
                </td>
                <td>
                    <?php echo $rows['namaPenyelia'];?>
                </td>
            <?php  }  ?>
        </tbody>
        </table>
        <?php $seliaan2 = "SELECT ojt_pelajar.namaPelajar , ojt_industri.namaSyarikat, ojt_industri.Alamat, ojt_penyelia_industri.namaPenyelia,ojt_pelajar.kelas,ojt_pelajar.program
                            FROM ref_seliaan
                            LEFT JOIN ojt_pelajar ON ref_seliaan.nokpPelajar = ojt_pelajar.nokpPelajar
                            LEFT JOIN ojt_industri ON ref_seliaan.IDIndustri = ojt_industri.IDIndustri
                            LEFT JOIN ojt_penyelia_industri ON ref_seliaan.IDPenyelia = ojt_penyelia_industri.IDPenyelia
                            WHERE ref_seliaan.IDPensyarahPPO = $idpensyarah AND ref_seliaan.Status= '' ";
    $Hasil2 = mysqli_query($con,$seliaan2); ?>
        <h4><b>SEBAGAI PENSYARAH PENYELIA OJT (PPO)</b> </h4><br>
        <table class="table table-striped table-bordered table-hover" id="myData2">
        <thead>
            <tr>
                <th>
                    Bil.
                </th>
                <th>
                    Kelas
                </th>
                <th>
                    Nama pelajar
                </th>
                <th>
                    Nama Syarikat Latihan Industri
                </th>
                <th>
                    Alamat Syarikat
                </th>
                <th>
                    Nama Penyelia
                </th>
            </tr>
        </thead>
        <?php 
        $num = 1;
        while ($ppo = mysqli_fetch_array($Hasil2)) {?>
        <tbody>
                <td>
                    <?php echo $num++ ?>
                </td>
                <td>
                    <?php echo $ppo['program']." ".$ppo['kelas'];?>
                </td>
                <td>
                    <?php echo $ppo['namaPelajar'];?>
                </td>
                <td>
                    <?php echo $ppo['namaSyarikat'];?>
                </td>
                <td>
                    <?php echo $ppo['Alamat'];?>
                </td>
                <td>
                    <?php echo $ppo['namaPenyelia'];?>
                </td>
            <?php  } ?>
        </tbody>
        </table>
        <div align="right"><a href="printListSeliaan.php?cetak=<?php echo $row['IDPensyarahPP'];}?>" style="text-decoration: none;" target= "_blank"><img src="../src/Printer.png" width="40px" ></a></div>
        <script>
          $(document).ready(function(){
            $('#myData').DataTable();
          });
           $(document).ready(function(){
            $('#myData2').DataTable();
          });
        </script>
    </div>
    </div>
    </body>
