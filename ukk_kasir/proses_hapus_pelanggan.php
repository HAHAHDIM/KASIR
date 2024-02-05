<?php
// koneksi database
include 'koneksi.php';

// menangkap data ID yang akan dihapus dari form
$PelangganID_to_delete = $_POST['PelangganID'];



// menghapus data dari database berdasarkan ID
mysqli_query($koneksi,"DELETE FROM pelanggan WHERE PelangganID=$PelangganID_to_delete");

// mengalihkan halaman kembali ke data_pelanggan.php setelah menghapus
header("location:data_pelanggan.php?pesan=hapus");
?>
