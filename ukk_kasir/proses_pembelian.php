<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data formulir
    $tanggal_transaksi = $_POST['tanggal_transaksi'];
    $PelangganID = $_POST['PelangganID'];
    $produks = $_POST['produk'];
    $jumlahs = $_POST['jumlah'];
    $totals = $_POST['total'];

   
    // Insert ke tabel penjualan
    $insertPenjualan = mysqli_query($koneksi, "INSERT INTO penjualan (TanggalPenjualan, TotalHarga, PelangganID) VALUES ('$tanggal_transaksi', '$totals', '$PelangganID')");

    if ($insertPenjualan) {
        // Ambil PenjualanID yang dibuat
        $penjualanID = mysqli_insert_id($koneksi);

        // Loop untuk setiap produk
        for ($i = 0; $i < count($produks); $i++) {
            $produkID = $produks[$i];
            $jumlahProduk = $jumlahs[$i];
            $subtotal = $totals[$i];

            // Periksa apakah stok cukup
            $checkStock = mysqli_query($koneksi, "SELECT Stok FROM produk WHERE ProdukID = '$produkID'");
            $currentStock = mysqli_fetch_assoc($checkStock)['Stok'];

            if ($currentStock >= $jumlahProduk) {
                // Perbarui stok pada tabel produk
                $updateStock = mysqli_query($koneksi, "UPDATE produk SET Stok = Stok - '$jumlahProduk' WHERE ProdukID = '$produkID'");

                // Insert ke tabel detailpenjualan
                $insertDetailPenjualan = mysqli_query($koneksi, "INSERT INTO detailpenjualan (PenjualanID, ProdukID, JumlahProduk, Subtotal) VALUES ('$penjualanID', '$produkID', '$jumlahProduk', '$subtotal')");

                // Perbarui TotalHarga pada tabel penjualan
                $updateTotalHarga = mysqli_query($koneksi, "UPDATE penjualan SET TotalHarga = IFNULL(TotalHarga, 0) + '$subtotal' WHERE PenjualanID = '$penjualanID'");
            } else {
                echo "<script>alert('Stok produk tidak mencukupi untuk produk dengan ID: $produkID'); window.history.back();</script>";
                exit;
            }
        }

  

        echo "<script>alert('Data Berhasil Ditambah!'); document.location='pembelian.php?';</script>";
    } else {


        echo "<script>alert('Error: " . mysqli_error($koneksi) . "');</script>";
    }

    // Tutup koneksi database
    mysqli_close($koneksi);
}
?>