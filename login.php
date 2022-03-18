<?php 
include 'dbcon.php';

session_start();

if (isset($_POST['submit'])) {
      $username=$_POST['username'];
      $password=$_POST['password'];

      $username = stripslashes($username);
      $password = stripslashes($password);
      $username = mysqli_real_escape_string($con,$username);
      $password = mysqli_real_escape_string($con,$password);

      if ($username && $password) {

      $query ="select * from ojt_pengguna where password='$password' AND username='$username'";
      $result = mysqli_query($con,$query);
      $rows = mysqli_num_rows($result);
      $row = mysqli_fetch_array($result);
      $type = $row['usertype'];

      if ($rows==1) {
        if ($type == 1) {
                          $_SESSION['login_user']=$username;
                           header("location: admin\admin.php");
                           exit();
                        }
                    
        elseif ($type == 2) {
                      $_SESSION['login_user']=$username;
                      header("location: pensyarah\pensyarah.php");
                       }
        
        elseif ($type == 3) {
                $_SESSION['login_user']=$username;
                header("location: penyelaras/penyelaras.php");
                }
        elseif ($type == 4) {
                $_SESSION['login_user']=$username;
                header("location: penyelia/penyelia.php?dapat=$username");
                }
             }
      else {
          echo $error = "<script>alert('Username atau Katalaluan adalah Salah')</script>";
  
      }

      }
      else{
       echo $error = "<script> alert('Sila Masukkan Username dan Password')</script>";
      }
}