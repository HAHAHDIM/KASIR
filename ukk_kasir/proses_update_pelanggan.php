<?php
// koneksi database
include 'koneksi.php';

// menangkap data yang di kirim dari form
$PelangganID = $_POST['PelangganID'];
$NamaPelanggan = $_POST['NamaPelanggan'];
$NomorTelepon = $_POST['NomorTelepon'];
$Alamat = $_POST['Alamat'];

// update data pelanggan berdasarkan ID
mysqli_query($koneksi, "UPDATE pelanggan SET NamaPelanggan='$NamaPelanggan', Alamat='$Alamat', NomorTelepon='$NomorTelepon' WHERE PelangganID='$PelangganID'");

// mengalihkan halaman kembali ke data_pelanggan.php setelah update
header("location:data_pelanggan.php?pesan=update");
?>
