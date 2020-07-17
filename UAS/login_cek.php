<?php
   include("koneksi.php");
   session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

      $username = $_POST['username'];
      $password = $_POST['password'];

      $sql = "SELECT * FROM user WHERE username = '$username' and password = '$password'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

      $count = mysqli_num_rows($result);
      // If result matched $myusername and $mypassword, table row must be 1 row

      if($count == 1) {
         $_SESSION['username'] = $username;
         header("location: login.php");
      }else {
         echo "<script>alert('Username atau Password Salah !!!'); window.location='index.php';</script>";
      }
   }
?>
