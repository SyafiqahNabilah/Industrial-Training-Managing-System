<?php include '..\dbcon.php';

if(isset($_GET["IDIndustri"]) && !empty($_GET["IDIndustri"])){
    //Get all state data
    $id=$_GET["IDIndustri"];
    echo $id;
    $query ="SELECT * FROM ojt_penyelia_industri WHERE IDIndustri = '$id' ORDER BY namaPenyelia ASC";
    $hasil = mysqli_query($con,$query);

    //Count total number of rows
    $count = mysqli_num_rows($hasil);
   
    if($count >0){
        echo '<option value="">Pilih Penyelia</option>';
        while($rows =mysqli_fetch_assoc($hasil)){ 
            echo '<option value="'.$rows['IDPenyelia'].'">'.$rows['namaPenyelia'].'</option>';
        }
    }
    else{
        echo '<option value="">- Tiada maklumat penyelia - </option>';
    }
}
if(isset($_GET["idNegeri"]) && !empty($_GET["idNegeri"])){
    //Get all state data
    $id=$_GET["idNegeri"];
    echo $id;
    $query ="SELECT * FROM ojt_daerah WHERE idNegeri='$id' ORDER BY namaDaerah ASC";
    $hasil = mysqli_query($con,$query);

    //Count total number of rows
    $count = mysqli_num_rows($hasil);
   
    if($count =1){
        echo '<option value="">Pilih Daerah</option>';
        while($rows =mysqli_fetch_assoc($hasil)){ 
            echo '<option value="'.$rows['namaDaerah'].'">'.$rows['namaDaerah'].'</option>';
        }
    }
    else{
        echo '<option value="">- Tiada maklumat Daerah - </option>';
    }
}

?>
