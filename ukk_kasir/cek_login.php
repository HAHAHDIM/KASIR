<?php
session_start();

// Koneksi ke database (gantilah sesuai pengaturan XAMPP Anda)
$koneksi = new mysqli("localhost", "root", "", "kasir");

// Periksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Ambil data dari form login jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['password'])) {
    // Ambil data dari form login
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Escape karakter khusus untuk mencegah serangan SQL Injection
    $username = $koneksi->real_escape_string($username);
    $password = $koneksi->real_escape_string($password);

    // Hash password sebelum mencocokkan dengan yang tersimpan di database
    $hashed_password = md5($password); // MD5 hashing, bisa diganti dengan metode hashing yang lebih aman

    // Query ke database untuk mengecek login
    $query = "SELECT * FROM petugas WHERE username='$username' AND password='$hashed_password'";
    $result = $koneksi->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['id_petugas'] = $row['id_petugas'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['level'] = $row['level'];

        // Redirect ke halaman dashboard
        header("Location: home.php");
        exit();
    } else {
        $error = "Username atau password salah.";
        header("Location: index.php?error=$error");
        exit();
    }
}

$koneksi->close();
?>