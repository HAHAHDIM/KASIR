<!DOCTYPE html>
<html>
<head>
	<title>UKK KASIR</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<style>

body{
background-image: url('4K-Beautiful-Desktop-Wallpaper-Colorful-Nature-Sunset-Landscape-scaled.jpg');
}

.container{
	border: 2px solid;
	border-radius: 10px;
	color: white;
	/* max-width: 650px; */
	background: transparent;
	backdrop-filter: blur(8px);
	margin-top: 200px;
	animation: colorChange 3s infinite;
}

@keyframes colorChange {
	0% {
		border-color: rgb(255, 0, 0);
	}
	50% {
		border-color: rgb(0, 255, 0);
	}
	100% {
		border-color: rgb(0, 0, 255);
	}
}

p{ 
	margin-top: 13%;

}
</style>
<body>

<div class="container p-4 col-lg-4">
	<h1 class="text-center mb-5 mt-5">Login</h1>
	<p class="fs-6 mb-3">Input username dan password.</p>
	<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="gagal"){
			echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
		}
	}
	?>
	<form method="post" action="cek_login.php">
		<div class="form-group">
			<label>Username</label>
			<input type="text" class="form-control" name="username">
		</div>
		<div class="form-group">
			<label>Password</label>
			<input type="password" class="form-control" name="password">
		</div>
		<div class="form-group mb-3 mt-3">
			<button type="submit" class="btn btn-outline-light form-control">Login</button>
		</div>
	</form>
</div>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>