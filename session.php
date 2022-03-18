<?php include('dbcon.php'); 
session_start();

$user_check=$_SESSION['login_user'];
$ses_sql=mysqli_query($con,"SELECT * FROM ojt_pengguna WHERE username = '$user_check'");
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['username'];

if(!isset($login_session)){
mysqli_close($con); 
header('Location: ..\index.php'); 
}

if (isset($_GET['tukarstatus'])) {
  $id = $_GET['tukarstatus'];
  $query = "UPDATE `ojt_pelajar` SET Tahun= '5' WHERE nokpPelajar='$id'";
  $result =mysqli_query($con,$query);
           if($result) {
              header('location:admin/statusPelajar.php');
            }
            else {
              echo"data tak lengkap";
            }
}
if (isset($_GET['tamat'])) {
  $id = $_GET['tamat'];
  $query = "UPDATE `ref_seliaan` SET Status='SELIAAN TAMAT' WHERE nokpPelajar='$id';UPDATE ojt_pelajar SET status='SELIAAN TAMAT' WHERE nokpPelajar='$id';";
  $result =mysqli_multi_query($con,$query);
           if($result) {
              echo "<script>alert('Kemaskini berjaya dilakukan');
               window.location.href='admin/senaraipelajar.php';</script>";
            }
            else {
              echo"data tak lengkap";
            }
}
if (isset($_GET['tamatPenyelaras'])) {
  $id = $_GET['tamatPenyelaras'];
  $query = "UPDATE `ref_seliaan` SET Status='SELIAAN TAMAT' WHERE nokpPelajar='$id';UPDATE ojt_pelajar SET status='SELIAAN TAMAT' WHERE nokpPelajar='$id';";
  $result =mysqli_multi_query($con,$query);
           if($result) {
              echo "<script>alert('Kemaskini berjaya dilakukan');
               window.location.href='penyelaras/senaraipelajar.php';</script>";
            }
            else {
              echo"data tak lengkap";
            }
}
if (isset($_POST['kemaskini-pelajar'])){
          $nama=strtoupper($_POST['namaPelajar']);
          $nokp=strtoupper($_POST['nokpPelajar']);
          $angka = strtoupper($_POST['AngkaGiliran']);
          $kohort = strtoupper($_POST['Kohort']);
          $agama=strtoupper($_POST['agama']);
          $gen = strtoupper($_POST['jantina']);
          $notel=strtoupper($_POST['notelPelajar']);
          $alamat =strtoupper($_POST['alamat']);
          $alamat2 =strtoupper($_POST['alamat2']);
          $poskod =strtoupper($_POST['poskod']);
          $daerah =strtoupper($_POST['daerah']);
          $negeri =strtoupper($_POST['negeri']);
          $cacat=strtoupper($_POST['kecacatan']);
          $npenjaga =strtoupper($_POST['namaPenjaga']);
          $kerjaB =strtoupper($_POST['kerjaBapa']);
          $gajiB =strtoupper($_POST['gajiBapa']);
          $nibu =strtoupper($_POST['namaIbu']);
          $kerjaI =strtoupper($_POST['kerjaIbu']);
          $gajiI =strtoupper($_POST['gajiIbu']);
          $bil=strtoupper($_POST['Bil_tanggung']);
          $notelW=strtoupper($_POST['notelWaris']);
          $query = "UPDATE `ojt_pelajar` SET `AngkaGiliran`='$angka',`Kohort`='$kohort',`namaPelajar`='$nama',`agama`='$agama',`jantina`='$gen',`notelPelajar`='$notel',`alamat`='$alamat',`alamat2`='$alamat2',`poskod`='$poskod',`daerah`='$daerah',`negeri`='$negeri',`kecacatan`='$cacat',`namaPenjaga`='$npenjaga',`kerjaBapa`='$kerjaB',`gajiBapa`='$gajiB',`namaIbu`='$nibu',`kerjaIbu`='$kerjaI',`gajiIbu`='$gajiI',`Bil_tanggung`='$bil',`notelWaris`='$notelW' WHERE `nokpPelajar` = '$nokp'";
          $resultKemaskini =mysqli_query($con,$query);
           if($resultKemaskini) {
             echo "<script>alert('Kemaskini berjaya dilakukan');
               window.location.href='senaraipelajar.php';</script>";
            }
            else {
              echo"data tak lengkap";
            }
        }  
if (isset($_POST['daftar-pelajar'])){
          $nama=strtoupper($_POST['namaPelajar']);
          $nokp=strtoupper($_POST['nokpPelajar']);
          $angka = strtoupper($_POST['AngkaGiliran']);
          $kohort = strtoupper($_POST['Kohort']);
          $agama=strtoupper($_POST['agama']);
          $gen = strtoupper($_POST['jantina']);
          $kelas = strtoupper($_POST['kelas']);
          $notel=strtoupper($_POST['notelPelajar']);
          $alamat =strtoupper($_POST['alamat']);
          $alamat2 = strtoupper($_POST['alamat2']);
          $poskod =strtoupper($_POST['poskod']);
          $daerah =strtoupper($_POST['daerah']);
          $negeri =strtoupper($_POST['negeri']);
          $cacat=strtoupper($_POST['kecacatan']);
          $npenjaga =strtoupper($_POST['namaPenjaga']);
          $kerjaB =strtoupper($_POST['kerjaBapa']);
          $gajiB =strtoupper($_POST['gajiBapa']);
          $nibu =strtoupper($_POST['namaIbu']);
          $kerjaI =strtoupper($_POST['kerjaIbu']);
          $gajiI =strtoupper($_POST['gajiIbu']);
          $bil=strtoupper($_POST['Bil_tanggung']);
          $notelW=strtoupper($_POST['notelWaris']);
          $pro=strtoupper($_POST['program']);
  if($nokp && $angka && $kohort && $nama &&$agama && $gen && $notel && $alamat)
  {
    $query = "INSERT INTO `ojt_pelajar`(`IDPelajar`, `nokpPelajar`,`AngkaGiliran`,`Kohort`, `namaPelajar`, `agama`, `jantina`, `notelPelajar`, `alamat`,`alamat2`, `poskod`, `daerah`, `negeri`, `kecacatan`, `namaPenjaga`, `kerjaBapa`, `gajiBapa`, `namaIbu`, `kerjaIbu`, `gajiIbu`, `notelWaris`, `Bil_tanggung`, `program`,`Tahun`,`kelas`) VALUES ('','$nokp','$angka','$kohort','$nama','$agama','$gen','$notel','$alamat','$alamat2','$poskod','$daerah','$negeri','$cacat','$npenjaga','$kerjaB','$gajiB','$nibu','$kerjaI','$gajiI','$notelW','$bil','$pro','4','$kelas')";
          $resultKemaskini =mysqli_query($con,$query);
           if($resultKemaskini) {
              echo "<script>alert('Pendaftaran pelajar telah berjaya dilakukan.')</script>";
            }
            else {
              echo"data tak lengkap";
            }
  }  
  else
  {
     echo "<script>alert('Sila lengkapkan borang sebelum klik pada butang daftar pelajar')</script>";
  }
}
          
if (isset($_POST['daftarPensyarah'])) {
          $nama = strtoupper($_POST['namaPensyarah']);
          $jaw = strtoupper($_POST['jawatan']);
          $jab = strtoupper($_POST['jabatan']);
          $pro = strtoupper($_POST['Program']);
          $notel=strtoupper($_POST['notelpensyarah']);
          $user = $_POST['username'];
          $type=strtoupper($_POST['usertype']);
      if($nama && $jaw && $jab && $pro)
      {
          $query = "INSERT INTO ojt_pensyarah (`IDPensyarahPP`, `namaPensyarah`, `jawatan`, `jabatan`, `Program`, `notelpensyarah`, `username`, `usertype`) VALUES ('DEFAULT','$nama','$jaw','$jab','$pro','$notel','$user','$type'); INSERT INTO ojt_pengguna (`id`,`namaPengguna`,`username`,`password`,`usertype`) VALUES ('DEFAULT','$nama','$user','kvpjb2017','$type');";

          $result=mysqli_multi_query($con,$query);
          if($result)
          {
           
            header('location:daftarPensyarah.php');
          }
          else {
            echo "data tak lengkap";
          }
  }
   echo "<script>alert('Sila lengkapkan borang sebelum klik pada butang daftar pensyarah')</script>";
}      

          
if (isset($_POST['kemaskini-pensyarah'])){
          $id=strtoupper($_POST['kemaskini-pensyarah']);
          $nama=strtoupper($_POST['namaPensyarah']);
          $jaw = strtoupper($_POST['jawatan']);
          $jab = strtoupper($_POST['jabatan']);
          $notel = strtoupper($_POST['notelpensyarah']);
          $user = $_POST['username'];
          $pro = strtoupper($_POST['Program']);
  
          $query = "UPDATE ojt_pensyarah SET namaPensyarah='$nama', jawatan = '$jaw', jabatan ='$jab',Program = '$pro' , notelpensyarah='$notel' ,username='$user'WHERE IDPensyarahPP='$id';UPDATE ojt_pengguna SET id='$id', namaPengguna='$nama', username ='$user' WHERE id='$id'";
          $result=mysqli_multi_query($con,$query);
           if($result) {
              header('location: senaraiPensyarah.php');
            }
            else {
              echo"data tak lengkap";
            }
        }

if (isset($_POST['daftarSeliaan'])){
          $nokp=$_POST['nokpPelajar'];
          $idpensyarahpp=$_POST['IDPensyarahPP'];
          $idpensyarahppo=$_POST['IDPensyarahPPO'];
          $idIndustri=$_POST['industri'];
          $idPenyelia=$_POST['penyelia'];
          $query = "INSERT INTO `ref_seliaan`(`id`,`IDPensyarahPP`, `IDPensyarahPPO`, `nokpPelajar`, `IDIndustri`, `IDPenyelia`,`TahunSeliaan`) VALUES ('','$idpensyarahpp','$idpensyarahppo','$nokp','$idIndustri','$idPenyelia',CURRENT_DATE);";
          $result =mysqli_query($con,$query);
           if($result) {
               echo "<script>alert('Penetapan seliaan bagi pelajar ini berjaya dilaksanakan');
               window.location.href='senaraiSeliaan.php';</script>";
            }
            else {
              echo"data tak lengkap";
            }
        }         
if (isset($_POST['kemaskiniSeliaan'])){
          $nokp=$_POST['nokpPelajar'];
          $idpensyarahpp=$_POST['IDPensyarahPP'];
          $idpensyarahppo=$_POST['IDPensyarahPPO'];
          $idIndustri=$_POST['industri'];
          $idPenyelia=$_POST['penyelia'];
          $query = "UPDATE `ref_seliaan` SET IDPensyarahPP='$idpensyarahpp',`IDPensyarahPPO`='$idpensyarahppo',`IDIndustri`='$idIndustri',`IDPenyelia`='$idPenyelia',TahunSeliaan = CURRENT_DATE WHERE `nokpPelajar`='$nokp'";
          $result =mysqli_query($con,$query);
           if($result) {
               echo "<script>alert('Kemaskini berjaya dilakukan');
               window.location.href='senaraiSeliaan.php';</script>";

            }
            else {
              echo"data tak lengkap";
            }
        } 
if (isset($_POST['kemaskiniSeliaanPenyelaras'])){
          $nokp=$_POST['nokpPelajar'];
          $idpensyarahpp=$_POST['IDPensyarahPP'];
          $idpensyarahppo=$_POST['IDPensyarahPPO'];
          $idIndustri=$_POST['industri'];
          $idPenyelia=$_POST['penyelia'];
          $query = "UPDATE `ref_seliaan` SET IDPensyarahPP='$idpensyarahpp',`IDPensyarahPPO`='$idpensyarahppo',`IDIndustri`='$idIndustri',`IDPenyelia`='$idPenyelia',TahunSeliaan = CURRENT_DATE WHERE `nokpPelajar`='$nokp'";
          $result =mysqli_query($con,$query);
           if($result) {
               echo "<script>alert('Kemaskini berjaya dilakukan');</script>";

            }
            else {
              echo"data tak lengkap";
            }
        } 

if (isset($_POST['daftarIndustri'])){
          $nama=strtoupper($_POST['namaSyarikat']);
          $alamat=strtoupper($_POST['Alamat']);
          $alamat2=strtoupper($_POST['Alamat2']);
          $pos=strtoupper($_POST['Poskod']);
          $dae=strtoupper($_POST['daerah']);
          $neg=strtoupper($_POST['negeri']);
          $notel=strtoupper($_POST['notel']);
          $faks=strtoupper($_POST['nofaks']);
    if($nama && $pos && $alamat && $dae && $neg)
    {
          $query = "INSERT INTO ojt_industri (`IDIndustri`,`namaSyarikat`, `Alamat`,`Alamat2`, `Poskod`,`Daerah`, `Negeri`, `notel`, `nofaks`) VALUES ('DEFAULT','$nama','$alamat','$alamat2','$pos','$dae','$neg','$notel','$faks');";
          $resultDaftarIndus = mysqli_query($con,$query);
           if($resultDaftarIndus) {
             echo "<script>alert('Pendaftaran berjaya')</script>";
            }
            else {
              echo"data tak lengkap";
            }
    }
else{
      echo "<script>alert('Sila lengkapkan borang sebelum menekan klik daftar industri');</script>";
    }
    
 } 

if (isset($_POST['kemaskini-profil'])){
          $id=$_POST['kemaskini-profil'];
          $nama=$_POST['namaPensyarah'];
          $jaw = $_POST['jawatan'];
          $jab = $_POST['jabatan'];
          $notel = $_POST['notelpensyarah'];
          $user = $_POST['username'];
          $query = "UPDATE ojt_pensyarah SET `IDPensyarahPP`='$id', `namaPensyarah`='$nama', `jawatan`='$jaw', `jabatan` = '$jab', `notelpensyarah`='$notel', `username`='$user' WHERE `IDPensyarahPP` ='$id';UPDATE ojt_pengguna SET namaPengguna='$nama', username ='$user' WHERE  namaPengguna='$nama'";
           $result=mysqli_multi_query($con,$query);
           if($result) {
              
              echo "<script>alert('Kemaskini berjaya dilakukan')</script>";
            }
            else {
              echo"data tak lengkap";
            }
        }

date_default_timezone_set("Asia/Kuala_Lumpur");
if(isset($_POST['submit-file'])){

        $file = rand(1000,100000)."-".$_FILES['file']['name'];
        $file_loc = $_FILES['file']['tmp_name'];
        $file_size = $_FILES['file']['size'];
        $file_type = $_FILES['file']['type'];
        $nama = $_POST['nama'];
        $folder="../files/";
   if($file && $nama && $file_type && $file_size)
   {
      
        $sql="INSERT INTO upload(file,nama,type,size)VALUES('$file','$nama','$file_type','$file_size')";
        move_uploaded_file($file_loc,$folder.$file);
        mysqli_query($con,$sql); 
   }
   else{
          echo "<script>alert('Sila pilih satu file sebelum tekan butang upload')</script>";
   }
      
}

if(isset($_POST['deleteUpload'])){
    $delete = $_POST['deleteUpload'];
    $query = "DELETE FROM upload WHERE id = '$delete'"; 
    $result =mysqli_query($con,$query);
    if($result)
      {
        header("location:uploadDoc.php");
      }
}
if (isset($_POST['daftarPenyelia'])){
          $nama=strtoupper($_POST['namaPenyelia']);
          $jaw = strtoupper($_POST['jawatan']);
          $no=$_POST['notel'];
          $username=$_POST['username'];
          $id = $_POST['IDIndustri'];

  if($nama&&$jaw&&$no&&$username)
  {
          $query = "INSERT INTO `ojt_penyelia_industri`(`IDPenyelia`, `namaPenyelia`, `jawatan`, `notel`, `username`,`IDIndustri`,`usertype`) VALUES ('','$nama','$jaw','$no','$username','$id','4'); INSERT INTO ojt_pengguna (`id`,`namaPengguna`,`username`,`password`,`usertype`) VALUES ('','$nama','$username','kvpjb2017','4');";
          $hasil = mysqli_multi_query($con,$query);
          if($hasil){
              header("location:senaraiPenyelia.php");
                    }
            else {
              echo"data tak lengkap";
            }
  }
  else{
      echo "<script>alert('Sila lengkapkan borang ')</script>";
  }
}

if (isset($_POST['kemaskiniPenyelia'])) {
          $id = $_POST['kemaskiniPenyelia'];
          $nama=strtoupper($_POST['namaPenyelia']);
          $jaw = strtoupper($_POST['jawatan']);
          $no=$_POST['notel'];
          $user = $_POST['username'];
          $idIndustri = $_POST['IDIndustri'];

          $query2 = "UPDATE ojt_penyelia_industri SET `namaPenyelia`='$nama', `jawatan`='$jaw', `notel`='$no', `username` ='$user', `IDIndustri` ='$idIndustri' WHERE `IDPenyelia` = '$id'; UPDATE ojt_pengguna SET `username`='$user' where `namaPengguna`='$nama'";
          $hasil = mysqli_multi_query($con,$query2);
          if($hasil){
                    header("location:admin/senaraiPenyelia.php");
                    }
            else {
              echo"data tak lengkap";
            }
        } 
if(isset($_POST['submitBorang'])){
          $name=$_FILES['upload']['name'];
          $size=$_FILES['upload']['size'];
          $type=$_FILES['upload']['type'];
          $temp=$_FILES['upload']['tmp_name'];
          $date = date('Y-m-d H:i:s');
          $caption1=$_POST['namaPapar'];
          $pesan=$_POST['pesanan'];
          // $link=$_POST['link'];
          
  if($name && $date && $caption1 && $pesan)
  {
          $folder = "../files/";
          move_uploaded_file($temp,$folder.$name);

          $query="INSERT INTO ojt_borang (name,date,namaPapar,pesanan) VALUES ('$name','$date','$caption1','$pesan')";
          $hasil = mysqli_query($con,$query);
          if($hasil){
              header("location:borangMaklumbalas.php");
                    }
          else{
            die(mysql_error());
              }
  }
  else
  {
    echo "<script>alert('Sila lengkapkan')</script>";
  } 
}
          
  
          

if(isset($_POST['deleteBorang']))
  {
    $delete = $_POST['deleteBorang'];
    $query = "DELETE FROM ojt_borang WHERE id = '$delete'"; 
    $result =mysqli_query($con,$query);
    if($result)
    {
        header("location:borangMaklumbalas.php");
    }
  }
  if(isset($_POST['deleteBorangRespon']))
  {
    $delete = $_POST['deleteBorangRespon'];
    $query = "DELETE FROM ojt_borangrespon_penyelia WHERE name = '$delete'"; 
    $result =mysqli_query($con,$query);
    if($result)
    {
        header("location:muatnaik.php");
    }
  }
//proses untuk pengumuman
if(isset($_POST['submitPost']))
{

  $title = $_POST['title'];
  $date = date('Y-m-d H:i:s');
  $image_name = $_FILES['image']['name'];
  $image_type = $_FILES['image']['type'];
  $image_size = $_FILES['image']['size'];
  $image_tmp  = $_FILES['image']['tmp_name'];
  $desc = $_POST['content'];

 if($title && $date && $image_name && $desc)
 {
   if($image_type=="image/jpeg" or $image_type=="image/png" or
  $image_type=="image/gif"){
    
    if($image_size>=500000){
    move_uploaded_file($image_tmp,"../post_images/$image_name");
    }
    else{
    echo "<script>alert('Image size is larger, only 50kb size is allowed ')</script>";
    } 
    
  }
  else{
  echo "<script>alert('Anda memilih untuk tidak meletakkan gambar')</script>";
  }
  
 $query = "INSERT INTO ojt_post (title,date,image,content) 
      values('$title','$date','$image_name','$desc')";
    $postDah = mysqli_query($con,$query);
   
   if($postDah){
      echo "<script>alert('Published')</script>";
    }
  else{
  echo "<script>alert('Lengkapkan')</script>";
  
  }
 }
 else {
  echo "<script>alert('Sila lengkapkan borang sebelum menekan butang post')</script>";
 }
}
if(isset($_POST['kemaskiniPost']))
{
  $id = $_GET['kemaskiniPost'];
  $title = $_POST['title'];
  $desc = $_POST['content'];
  
    $query = "UPDATE ojt_post SET title='$title',content ='$desc' WHERE id ='$id' ";
    $postDah = mysqli_query($con,$query);
   
   if($postDah)
   {
      echo "<script>alert('Published');
      window.location.href='admin/senaraiPengumuman.php'</script>";
    }
  else{
   echo "<script>alert('Sila lengkapkan borang sebelum menekan butang post')
    window.location.href='admin/post.php'</script>";
  
  }
 }
if(isset($_POST['submitBorangRespon'])!=""){
          $name=$_FILES['upload']['name'];
          $size=$_FILES['upload']['size'];
          $type=$_FILES['upload']['type'];
          $temp=$_FILES['upload']['tmp_name'];
          $pen=$_POST['IDPenyelia'];
          $kp=$_POST['nokpPelajar'];
          $date = date('Y-m-d H:i:s');
          $link=$_POST['link'];
          $folder = "../files/";

  
          move_uploaded_file($temp,$folder.$name);

          $query="INSERT INTO ojt_borangrespon_penyelia(name,IdPenyelia,nokpPelajar, date) VALUES ('$name','$pen','$kp','$date')";
          $hasil = mysqli_query($con,$query);
          if($hasil){
              header("location: muatnaik.php");
                    }
          else{
            die(mysql_error());
              }
            }
if(isset($_POST['deletePosting'])){
    $delete = $_POST['deletePosting'];
    $query = "DELETE FROM ojt_post WHERE id = '$delete'"; 
    $result =mysqli_query($con,$query);
    if($result)
      {
        header("location:senaraiPengumuman.php");
      }
}
// if(isset($_POST['delRespon'])){
//     $del = $_POST['delRespon'];
//     $query = "DELETE FROM ojt_maklumbalas WHERE Id = '$del'"; 
//     $result =mysqli_query($con,$query);
//     if($result)
//       {
//         header("location:responPensyarah.php");
//       }
// }

// if(isset($_GET['deletePensyarah'])){
//     $delete = $_GET['deletePensyarah'];
//     $query = "DELETE FROM ojt_pensyarah WHERE IDPensyarahPP = '$delete'"; 
//     $result =mysqli_query($con,$query);
//     if($result)
//       {
//         header("location: admin/senaraipensyarah-admin.php");
//       }
// }
//Proses pengguna Penyelaras
if (isset($_POST['kemaskini-Penyelaras'])){
          $id=$_POST['kemaskini-Penyelaras'];
          $nama=strtoupper($_POST['namaPensyarah']);
          $jaw = strtoupper($_POST['jawatan']);
          $jab = strtoupper($_POST['jabatan']);
          $notel = $_POST['notelpensyarah'];

          $query = "UPDATE ojt_pensyarah SET namaPensyarah='$nama', jawatan = '$jaw', jabatan ='$jab' , notelpensyarah='$notel' WHERE IDPensyarahPP='$id'";
          $result=mysqli_query($con,$query);
           if($result) {
            echo "<script>alert('Kemaskini berjaya dilakukan');
            window.location.href='kemaskiniProfil.php?kemaskini='".$id."'</script>";
            }
            else {
              echo"data tak lengkap";
            }
        }

// if (isset($_POST['kemaskini-pelajar-penyelaras'])){
//           $nama=$_POST['namaPelajar'];
//           $nokp=$_POST['nokpPelajar'];
//           $angka = $_POST['AngkaGiliran'];
//           $kohort = $_POST['Kohort'];
//           $agama=$_POST['agama'];
//           $gen = $_POST['jantina'];
//           $notel=$_POST['notelPelajar'];
//           $alamat =$_POST['alamat'];
//           $poskod =$_POST['poskod'];
//           $daerah =$_POST['daerah'];
//           $negeri =$_POST['negeri'];
//           $cacat=$_POST['kecacatan'];
//           $npenjaga =$_POST['namaPenjaga'];
//           $kerjaB =$_POST['kerjaBapa'];
//           $gajiB =$_POST['gajiBapa'];
//           $nibu =$_POST['namaIbu'];
//           $kerjaI =$_POST['kerjaIbu'];
//           $gajiI =$_POST['gajiIbu'];
//           $bil=$_POST['Bil_tanggung'];
//           $notelW=$_POST['notelWaris'];

  
//           $query = "UPDATE `ojt_pelajar` SET `namaPelajar`='$nama', `AngkaGiliran`='$angka',`Kohort`='$kohort',`agama`='$agama',`jantina`='$gen',`notelPelajar`='$notel',`alamat`='$alamat',`poskod`='$poskod',`daerah`='$daerah',`negeri`='$negeri',`kecacatan`='$cacat',`namaPenjaga`='$npenjaga',`kerjaBapa`='$kerjaB',`gajiBapa`='$gajiB',`namaIbu`='$nibu',`kerjaIbu`='$kerjaI',`gajiIbu`='$gajiI',`Bil_tanggung`='$bil',`notelWaris`='$notelW' WHERE `nokpPelajar` = '$nokp'";
//           $resultKemaskini =mysqli_query($con,$query);
//            if($resultKemaskini) {
//               echo "<script>alert('Kemaskini berjaya dilakukan')</script>;";

//             }
//             else {
//               echo"data tak lengkap";
//             }
//         }  

        // if (isset($_POST['daftarSeliaan-Penyelaras'])){
        //   $nokp=$_POST['nokpPelajar'];
        //   $idpensyarahpp=$_POST['IDPensyarahPP'];
        //   $idpensyarahppo=$_POST['IDPensyarahPPO'];
        //   $idIndustri=$_POST['IDIndustri'];
        //   $idPenyelia=$_POST['IDPenyelia'];
        //   $query = "INSERT INTO `ref_seliaan`(`id`,`IDPensyarahPP`, `IDPensyarahPPO`, `nokpPelajar`, `IDIndustri`, `IDPenyelia`,`TahunSeliaan`) VALUES ('','$idpensyarahpp','$idpensyarahppo','$nokp','$idIndustri','$idPenyelia',CURRENT_DATE);";
        //   $result =mysqli_query($con,$query);
        //    if($result) {
        //       header('location:penyelaras/berjaya.php');
        //     }
        //     else {
        //       echo"data tak lengkap";
        //     }
        // } 

  /*      if (isset($_POST['daftarIndustri-penyelaras'])){
          $nama=$_POST['namaSyarikat'];
          $alamat=$_POST['Alamat'];
          $pos=$_POST['Poskod'];
          $dae=$_POST['Daerah'];
          $neg=$_POST['Negeri'];
          $notel=$_POST['notel'];
          $faks=$_POST['nofaks'];
          $query = "INSERT INTO ojt_industri (`IDIndustri`,`namaSyarikat`, `Alamat`, `Poskod`,`Daerah`, `Negeri`, `notel`, `nofaks`) VALUES ('DEFAULT','$nama','$alamat','$pos','$dae','$neg','$notel','$faks');";
          $resultDaftarIndus = mysqli_query($con,$query);
           if($resultDaftarIndus) {
              echo "<script>alert('Pendaftaran berjaya')</script>";
            }
            else {
              echo"data tak lengkap";
            }
        }*/
   if (isset($_POST['kemaskiniIndustri'])){
          $id=$_POST['IDIndustri'];
          $nama=strtoupper($_POST['namaSyarikat']);
          $alamat=strtoupper($_POST['Alamat']);
          $alamat2=strtoupper($_POST['Alamat2']);
          $pos=strtoupper($_POST['Poskod']);
          $dae=strtoupper($_POST['Daerah']);
          $neg=strtoupper($_POST['Negeri']);
          $notel=$_POST['notel'];
          $faks=$_POST['nofaks'];
          $query = "UPDATE ojt_industri SET namaSyarikat='$nama', Alamat='$alamat',Alamat2='$alamat2', Poskod='$pos',Daerah='$dae', Negeri='$neg', notel='$notel', nofaks='$faks' WHERE IDIndustri = '$id'";
          $hasil = mysqli_query($con,$query);
          if($hasil){
            echo "<script>alert('Kemaskini berjaya dilakukan');
            window.location.href='senaraiIndustri.php';</script>";
                    }
            else {
              echo"data tak lengkap";
            }
        } 

    if(isset($_POST['submitMaklum']))
      {
        $nokp = $_POST['nokpPelajar'];
        $seb = $_POST['sebagai'];
        $mesej = $_POST['mesej'];
        $image_name1 = $_FILES['Images']['name'];
        $image_type = $_FILES['Images']['type'];
        $image_size1 = $_FILES['Images']['size'];
        $image_tmp1  = $_FILES['Images']['tmp_name'];
        $image_name2 = $_FILES['Images2']['name'];
        $image_type = $_FILES['Images2']['type'];
        $image_size2 = $_FILES['Images2']['size'];
        $image_tmp2  = $_FILES['Images2']['tmp_name'];
        $id = $_POST['IDPensyarahPP'];
        $bil = $_POST['bilSeliaan'];
        $date2 = $_POST['TarikhSeliaan'];
        $date = date('Y-m-d H:i:s');
        if ($nokp && $seb && $mesej && $mesej && $bil)
        {
          if ($image_size1 && $image_size2 = 50000) 
          {
            move_uploaded_file($image_tmp1,"..\post_images/$image_name1");
            move_uploaded_file($image_tmp2,"..\post_images/$image_name2");
            $sql ="INSERT INTO `ojt_maklumbalas`(`Id`, `nokpPelajar`, `sebagai`, `mesej`, `Images`, `Images2`, `IDPensyarahPP`, `bilSeliaan`, `TarikhSeliaan`, `date`) VALUES ('','$nokp','$seb','$mesej','$image_name1','$image_name2','$id','$bil','$date2','$date')";
          $postDah = mysqli_query($con,$sql);

          if($postDah)
            {
                echo "<script>alert('Maklumbalas telah dihantar')</script>";
            }
          }
          else
          {
            echo "<script>alert('Gambar terlalu besar. Maklumbalas tidak berjaya')</script>";
          }
          
        }  
        else
        {
            echo "<script>alert('Lengkapkan')</script>";
        }
    }

     if(isset($_POST['submitMaklum-Penyelia']))
      {

        $nokp = $_POST['nokpPelajar'];
        $mesej = $_POST['mesej'];
        $image_name1 = $_FILES['Images']['name'];
        $image_type = $_FILES['Images']['type'];
        $image_size1 = $_FILES['Images']['size'];
        $image_tmp1  = $_FILES['Images']['tmp_name'];
        $image_name2 = $_FILES['Images2']['name'];
        $image_type = $_FILES['Images2']['type'];
        $image_size2 = $_FILES['Images2']['size'];
        $image_tmp2  = $_FILES['Images2']['tmp_name'];
        $id = $_POST['IDPenyelia'];
        $date = date('Y-m-d H:i:s');
         if ($image_size1 && $image_size2 <=50000) {
            move_uploaded_file($image_tmp1,"..\post_images/$image_name1");
            move_uploaded_file($image_tmp2,"..\post_images/$image_name2");
         }
   $sql ="INSERT INTO `ojt_maklumbalas`(`Id`, `nokpPelajar`, `sebagai`, `mesej`, `Images`, `Images2`,`IDPenyelia`, `date`) VALUES ('','$nokp','Penyelia Organisasi','$mesej','$image_name1','$image_name2','$id','$date')";
        $postDah = mysqli_query($con,$sql);

         if($postDah){
            echo "<script>alert('Maklumbalas telah dihantar')</script>";
          }
        else{
        echo "<script>alert('Lengkapkan')</script>";
        
        }
    }
if (isset($_POST['kemaskini-password'])){
          $Penyelia=$_POST['kemaskini-password'];
          $pass = $_POST['password'];
          $query = "UPDATE ojt_pengguna SET password='$pass' where username='$Penyelia'";
          $result =mysqli_query($con,$query);
           if($result) {
              echo "<script>alert('Password telah dikemaskini')</script>";
            }
            else {
              echo"data tak lengkap";
            }
   }
    if (isset($_POST['resetPass'])){
          $Penyelia=$_POST['resetPass'];
          $query = "UPDATE ojt_pengguna SET password='kvpjb2017' where username='$Penyelia'";
          $result =mysqli_query($con,$query);
           if($result) {
              echo "<script>alert('Password telah ditetapkan kepada kvpjb2017')</script>";
            }
            else {
              echo"data tak lengkap";
            }
        }

$output = '';
if(isset($_POST["export-excel"]))
{
 $query = "SELECT * FROM ojt_pelajar";
 $result = mysqli_query($con, $query);
 if(mysqli_num_rows($result) > 0)
 {
  header('Content-Type: application/octent-strem');
  header('Content-Disposition: attachment; filename=senaraipelajarOJT.xls');
  echo $output;
 }
}
if(isset($_POST["export-excelByCourse"]))
{
 $query = "SELECT * FROM ojt_pelajar";
 $result = mysqli_query($con, $query);
 if(mysqli_num_rows($result) > 0)
 {
  header('Content-Type: application/octent-strem');
  header('Content-Disposition: attachment; filename=listOjt_byCourse.xls');
  echo $output;
 }
}

?>
