<?php 
// koneksi database
include 'koneksi.php';

// menangkap data id yang di kirim dari url
$PelangganID = $_POST['PelangganID'];


// Menghapus data dari penjualan terlebih dahulu
mysqli_query($koneksi, "DELETE FROM penjualan WHERE PelangganID='$PelangganID'");
// Setelah itu, baru menghapus data dari pelanggan
mysqli_query($koneksi, "DELETE FROM pelanggan WHERE PelangganID='$PelangganID'");

// mengalihkan halaman kembali ke pembelian.php
header("location:pembelian.php?pesan=hapus");

?>