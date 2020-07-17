<?php

$DB_HOST = "localhost";
$DB_NAME = "uas";
$DB_USER = "root";
$DB_PASS = "";

$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
  if (mysqli_connect_error())
    {
      echo "Gagal koneksi ke MYSQL: " . mysqli_connect_error();
    }

 ?>
