<?php
   include("koneksi.php");

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

      $alokasi = $_POST['alokasi'];
      $dana = $_POST['dana'];
      $nama = $_POST['nama'];
      $no_hp = $_POST['no_hp'];
      $email = $_POST['email'];

      $sql = "INSERT INTO data_bantuan (alokasi, dana, nama, no_hp, email) VALUES ('$alokasi', '$dana', '$nama', '$no_hp', '$email')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Data berhasil di tambahkan'); window.location='login.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

   }
?>
