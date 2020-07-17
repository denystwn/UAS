<!doctype html>

<?php
session_start();
  if (empty($_SESSION['username'])) {
    header('location:index.php');
  }
 ?>

<!-- format rupiah -->
 <?php
 function rupiah($angka){

   $hasil_rupiah = number_format($angka,0,',','.');
   return $hasil_rupiah;

 }
 ?>

 <?php
 function tanggal_indo($tanggal) {
	$bulan = array (1 =>'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
	$split = explode('-', $tanggal);
	return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
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

      @media print
      {
        .noprint {display:none;}
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
        <a class="nav-link" href="daftar.php">Data Penerimaan Bantuan</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="cetak.php">Cetak Data</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout <span class="sr-only"></span></a>
      </li>
    </ul>
  </div>
</nav>
  <?php
  date_default_timezone_set('Asia/Jakarta');
  $tgl = tanggal_indo(date("Y-m-d"));
  $pukul = date("H:i");
  ?>
  <main role="main" class="container">
  <div class="starter-template">
    <h4><center>Rekapitulasi Penerimaan Bantuan Sosial COVID-19<center></h4>
      <h5><center>Sampai dengan <?php echo "$tgl, Pukul $pukul WIB";?><center></h5>
    <table class="table" id="data">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Jenis Alokasi</th>
          <th scope="col">Jumlah Transaksi</th>
          <th scope="col">Jumlah Dana</th>
        </tr>
      </thead>

      <!-- Data Alat Pelindung Diri -->
      <?php include("koneksi.php");
      $sql= mysqli_query($conn, "SELECT count(alokasi), sum(dana) from data_bantuan where alokasi='Alat Pelindung Diri'");
      list($alokasi, $dana)= mysqli_fetch_array($sql);
      $dana=$dana + 0;
      $no=1;

      if ($dana != 0) {
      echo "<tr>";
      echo "<td>".$no++."</td>";
      echo "<td>Alat Pelindung Diri</td>";
      echo "<td>".$alokasi."</td>";
      echo "<td>".rupiah($dana)."</td>";
      echo "</tr>";
      }
      ?>

      <!-- Data Logistik Mahasiswa -->
      <?php include("koneksi.php");
      $sql= mysqli_query($conn, "SELECT count(alokasi), sum(dana) from data_bantuan where alokasi='Logistik Mahasiswa'");
      list($alokasi, $dana)= mysqli_fetch_array($sql);
      $dana=$dana + 0;

      if ($dana != 0) {
      echo "<tr>";
      echo "<td>".$no++."</td>";
      echo "<td>Logistik Mahasiswa</td>";
      echo "<td>".$alokasi."</td>";
      echo "<td>".rupiah($dana)."</td>";
      echo "</tr>";
      }
      ?>

      <!-- Data Bantuan Kuota Mahasiswa -->
      <?php include("koneksi.php");
      $sql= mysqli_query($conn, "SELECT count(alokasi), sum(dana) from data_bantuan where alokasi='Bantuan Kuota Mahasiswa'");
      list($alokasi, $dana)= mysqli_fetch_array($sql);
      $dana=$dana + 0;

      if ($dana != 0) {
      echo "<tr>";
      echo "<td>".$no++."</td>";
      echo "<td>Bantuan Kuota Mahasiswa</td>";
      echo "<td>".$alokasi."</td>";
      echo "<td>".rupiah($dana)."</td>";
      echo "</tr>";
      }
      ?>

      <!-- Data Hand Sanitizer -->
      <?php include("koneksi.php");
      $sql= mysqli_query($conn, "SELECT count(alokasi), sum(dana) from data_bantuan where alokasi='Hand Sanitizer'");
      list($alokasi, $dana)= mysqli_fetch_array($sql);
      $dana=$dana + 0;

      if ($dana != 0) {
        echo "<tr>";
        echo "<td>".$no++."</td>";
        echo "<td>Hand Sanitizer</td>";
        echo "<td>".rupiah($dana)."</td>";
        echo "<td>".$alokasi."</td>";
        echo "</tr>";
      }
      ?>

      <!-- Data Sembako Masyarakat -->
      <?php include("koneksi.php");
      $sql= mysqli_query($conn, "SELECT count(alokasi), sum(dana) from data_bantuan where alokasi='Sembako Masyarakat'");
      list($alokasi, $dana)= mysqli_fetch_array($sql);
      $dana=$dana + 0;

      if ($dana != 0) {
      echo "<tr>";
      echo "<td>".$no++."</td>";
      echo "<td>Sembako Masyarakat</td>";
      echo "<td>".$alokasi."</td>";
      echo "<td>".rupiah($dana)."</td>";
      echo "</tr>";
      }
      ?>

  </tbody>
    </table>
  </div>

  <div class="noprint">
    <button id="tombol" onclick="window.print()" class="btn btn-warning pull-right"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Cetak</button>
  </div>

</main><!-- /.container -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script></body>
</body>
</html>
