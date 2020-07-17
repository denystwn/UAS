<!doctype html>
<?php
session_start();
  if (empty($_SESSION['username'])) {
    header('location:index.php');
  }
 ?>

 <!-- format rupiah
  <?php
  function rupiah($angka){

    $hasil_rupiah = number_format($angka,0,',','.');
    return $hasil_rupiah;

  }
  ?> -->


<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Aplikasi Penerimaan Bantuan COVID-19</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="login.php">Input Penerimaan Bantuan <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="daftar.php">Data Penerimaan Bantuan</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cetak.php">Cetak Data</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout <span class="sr-only"></span></a>
      </li>
    </ul>
  </div>
</nav>

<main role="main" class="container">
  <div class="starter-template">
    <h4 class="mt-3">Daftar Data Penerimaan Bantuan</h4><hr>
    <table class="table" id="data">
      <thead>
        <tr>
          <th scope="col">No ID</th>
          <th scope="col">Jenis Alokasi</th>
          <th scope="col">Jumlah Dana</th>
          <th scope="col">Nama Lengkap</th>
          <th scope="col">No Handphone</th>
          <th scope="col">E-Mail</th>
          <th scope="col">Action</th>
        </tr>
      </thead>

      <tbody>
      <?php include("koneksi.php");
      $sql = "SELECT * FROM data_bantuan";
      $query = mysqli_query($conn, $sql);

      while($data = mysqli_fetch_array($query)){
          echo "<tr>";

          echo "<td>".$data['id']."</td>";
          echo "<td>".$data['alokasi']."</td>";
          echo "<td>".rupiah($data['dana'])."</td>";
          echo "<td>".$data['nama']."</td>";
          echo "<td>".$data['no_hp']."</td>";
          echo "<td>".$data['email']."</td>";
          echo "<td>";
          echo "<a href='edit.php?id=".$data['id']."'>Edit</a> | ";
          echo "<a href='hapus.php?id=".$data['id']."'>Hapus</a>";
          echo "</td>";

          echo "</tr>";
      }
      ?>

  </tbody>
    </table>
  </div>


<!-- <script src="main.js"></script> -->
</main><!-- /.container -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script></body>
</body>
</html>
