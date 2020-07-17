<?php
   include("koneksi.php");


      $id = $_GET['id'];

      $sql = "DELETE FROM data_bantuan WHERE id='$id'";
      $result = mysqli_query($conn, $sql);

      if( $result ){
        echo "<script>alert('Data Berhasil di Hapus'); window.location='daftar.php';</script>";
    } else {
        die("gagal menghapus...");
    }

?>
