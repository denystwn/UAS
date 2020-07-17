<?php

include("koneksi.php");

// cek apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['simpan'])){

    // ambil data dari formulir
    $id = $_POST['id'];
    $alokasi = $_POST['alokasi'];
    $dana = $_POST['dana'];
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $email= $_POST['email'];

    // buat query update
    $sql = "UPDATE data_bantuan SET alokasi='$alokasi', dana='$dana', nama='$nama', no_hp='$no_hp', email='$email' WHERE id='$id'";
    $query = mysqli_query($conn, $sql);

    // apakah query update berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman daftar.
        echo "<script>alert('Data Berhasil di Update'); window.location='daftar.php';</script>";
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }


} else {
    die("Akses dilarang...");
}

?>
