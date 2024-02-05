<?php 
session_start();

	// cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']==""){
	header("location:../index.php?pesan=gagal");
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Administrator</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<style>
	body{
		background: url('4K-Beautiful-Desktop-Wallpaper-Colorful-Nature-Sunset-Landscape-scaled.jpg');
	}
	.container{
		background-color: transparent;
		border: 2px solid;
	border-radius: 10px;
	color: white;
	/* max-width: 650px; */
	margin-top: 200px;
		
	}
	.content{
		background-color: transparent;
	}
	.card{
		background-color: transparent;

	}
</style>

<body>
	<div class="container">
		<div class="content">