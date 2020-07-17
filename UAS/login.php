<!doctype html>
<?php
session_start();
  if (empty($_SESSION['username'])) {
    header('location:index.php');
  }
 ?>


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
      <li class="nav-item active">
        <a class="nav-link acive" href="login.php">Input Penerimaan Bantuan <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="daftar.php">Data Penerimaan Bantuan</a>
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
    <h4 class="mt-3">Form Penerimaan Bantuan</h4><hr>
    <form action="input_bantuan.php" method="POST">
      <div class="form-group">
        <label>Jenis Alokasi</label>
        <select name="alokasi" class="form-control" required>
          <option value="" disabled selected>===Pilih===</option>
          <?php
          include 'koneksi.php';
    				$q = mysqli_query($conn, "SELECT * FROM data_alokasi");
    				while($data = mysqli_fetch_array($q)){
        	?>
          <option value="<?=$data['jenis_alokasi']?>"><?=$data['jenis_alokasi']?></option>
          <?php
          }
          ?>
        </select>
      </div>
      <div class="form-group">
        <label>Jumlah Dana</label>
        <input type="text" class="form-control" name="dana" id="dana">
      </div>
      <div class="form-group">
        <label>Nama Lengkap</label>
        <input type="text" class="form-control" name="nama">
      </div>

      <div class="form-group">
        <label>No Handphone</label>
        <input type="text" class="form-control" name="no_hp">
      </div>
      <div class="form-group">
        <label>E-mail</label>
        <input type="email" class="form-control" name="email">
      </div>
      <button type="submit" class="btn btn-primary">Input</button>
    </form>
  </div>

<!-- <script src="main.js"></script> -->
</main><!-- /.container -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script></body>
</body>
</html>
