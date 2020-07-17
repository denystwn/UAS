<?php
session_start();
  if (empty($_SESSION['username'])) {
    header('location:index.php');
  }
 ?>

 <?php

include("koneksi.php");

// kalau tidak ada id di query string
if( !isset($_GET['id']) ){
    header('Location: daftar.php');
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM data_bantuan WHERE id='$id'";
$query = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
    die("data tidak ditemukan...");
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
      <li class="nav-item">
        <a class="nav-link" href="login.php">Input Penerimaan Bantuan <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
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
<table class="table table-bordered">
  <h4 class="mt-3">Form Edit Data</h4><hr>
    <form class="form-inline my-2 my-lg-0" method="post" action="proses-edit.php">
    <br>
    <form>
        <div class="form-group row">
          <label for="alokasi" class="col-sm-2 col-form-label">No ID</label>
            <div class="col-sm-10">
              <input type="number" name="id" class="form-control" placeholder="id" value="<?php echo $data['id'] ?>" readonly>
            </div>
        </div>
        <div class="form-group row">
      		<label for="alokasi" class="col-sm-2 col-form-label">Jenis Alokasi</label>
      		<input type="hidden" name="alokasi" value="<?php echo $row['alokasi']; ?>">
      		<div class="col-sm-10">
      			<select name="alokasi" class="form-control" required>
      				<option value="<?php echo $data['alokasi']; ?>"><?php echo $data['alokasi']; ?></option>

      			<?php

      				$q = mysqli_query($conn, "SELECT * FROM data_alokasi");
      				while(list($jenis_alokasi ) = mysqli_fetch_array($q)){
      					echo '<option value="'.$jenis_alokasi.'">'.$jenis_alokasi.'</option>';
      				}

      			?>

      			</select>
      		</div>
      	</div>
        <!-- <div class="form-group row">
          <label for="alokasi" class="col-sm-2 col-form-label">Jenis Alokasi</label>
            <div class="col-sm-10">
              <input type="text" name="alokasi" class="form-control" placeholder="alokasi" value="<?php echo $data['alokasi'] ?>">
            </div>
        </div> -->
        <div class="form-group row">
          <label for="dana" class="col-sm-2 col-form-label">Jumlah Dana</label>
            <div class="col-sm-10">
              <input type="text" name="dana" class="form-control" placeholder="dana" value="<?php echo $data['dana'] ?>">
            </div>
        </div>
        <div class="form-group row">
          <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
            <div class="col-sm-10">
              <input type="text" name="nama" class="form-control" placeholder="nama" value="<?php echo $data['nama'] ?>">
            </div>
        </div>
        <div class="form-group row">
          <label for="no_hp" class="col-sm-2 col-form-label">No Handphone</label>
            <div class="col-sm-10">
              <input type="text" name="no_hp" class="form-control" placeholder="no_hp" value="<?php echo $data['no_hp'] ?>">
            </div>
        </div>
        <div class="form-group row">
          <label for="email" class="col-sm-2 col-form-label">E-Mail</label>
            <div class="col-sm-10">
              <input type="text" name="email" class="form-control" placeholder="email" value="<?php echo $data['email'] ?>">
            </div><br><br><br><br>
        </div>
        <div class="form-group row">
          <div class="col-sm-10" align="center">
            <button type="submit" name="simpan" class="btn btn-primary" value="Update">Simpan Data</button>
            <a class="btn btn-primary" href="daftar.php" role="button">Kembali</a>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-10" align="center">
          </div>
        </div>

</main><!-- /.container -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script></body>
</body>
</html>
