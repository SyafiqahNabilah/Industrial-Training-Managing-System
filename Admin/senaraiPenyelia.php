<?php include 'headerAdmin.php';
   $sql = "SELECT ojt_penyelia_industri.IDPenyelia,ojt_penyelia_industri.namaPenyelia, ojt_penyelia_industri.notel, ojt_penyelia_industri.jawatan, ojt_industri.namaSyarikat 
   FROM `ojt_penyelia_industri`
   JOIN ojt_industri ON ojt_penyelia_industri.IDIndustri = ojt_industri.IDIndustri
   ORDER BY ojt_penyelia_industri.namaPenyelia ASC";
   $info = mysqli_query($con,$sql); 

   include '..\page/func_list_penyelia.php';
   ?>
