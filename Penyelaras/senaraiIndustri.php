<?php include 'header-penyelaras.php';
   $sql = "SELECT * FROM ojt_industri";
   $info = mysqli_query($con,$sql); 
   include '..\page/func_list_industri.php';
   ?>
