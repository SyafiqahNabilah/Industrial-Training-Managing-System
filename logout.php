<?php
   session_start();
   $home = 'index.php';
   if(session_destroy()) {
      header("Location: ".$home);
      exit();
   }
?>