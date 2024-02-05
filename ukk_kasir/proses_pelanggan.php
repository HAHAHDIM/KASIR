<?php 
// koneksi database
include 'koneksi.php';

// menangkap data yang di kirim dari form
$PelangganID = $_POST['PelangganID'];
$NamaPelanggan = $_POST['NamaPelanggan'];
$NomorTelepon = $_POST['NomorTelepon'];
$Alamat = $_POST['Alamat'];
// menginput data ke database
mysqli_query($koneksi,"insert into pelanggan values('$PelangganID','$NamaPelanggan','$Alamat','$NomorTelepon')");

// mengalihkan halaman kembali ke data_barang.php
header("location:data_pelanggan.php?pesan=simpan");

?>