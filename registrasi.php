<?php 


require 'functions.php';

if(isset($_POST["register"])) {

	if(registrasi($_POST) > 0 ) {
		echo "<script>
		alert('User Baru Berhasil Ditambahkan!!!');
		document.location.href = 'login.php';
		</script>";
	}else {
		echo mysqli_error($conn);
	}

}



 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Halaman Registrasi</title>
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<style>
		label {
			display: block;
		}
	</style>
</head>
<body>
	
	<header style="background-color:#0d6efd ; padding: 20px; color : white;">
	
	<h1>Halaman Registrasi</h1>

	</header>

	<section class="registrasi">
<form action="" method="POST">
	
	<ul>
			<div class="input-group mb-3" style="
			margin-top:20px ;
			width: 40%;

			">
			<span class="input-group-text" id="inputGroup-sizing-default">USERNAME</span>
			<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="username" id="username">
			</div>

			<div class="input-group mb-3" style="
			margin-top:20px ;
			width: 40%;

			">
			<span class="input-group-text" id="inputGroup-sizing-default">PASSWORD</span>
			<input type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="password" id="password">
			</div>

			<div class="input-group mb-3" style="
			margin-top:20px ;
			width: 40%;

			">
			<span class="input-group-text" id="inputGroup-sizing-default">KONFIRMASI</span>
			<input type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="password2" id="password2">
			</div>
			<!--
			<label for="username">Username :</label>
			<input type="text" name="username" id="username">
		
			<label for="password">Password :</label>	
			<input type="password" name="password" id="password">	
			
		
			<label for="password2">Konfirmasi :</label>
			<input type="password" name="password2" id="password2">
		
			-->

			<button type="submit" name="register" class="btn btn-success">DAFTAR</button>
		
		
			<a class="btn btn-primary" href="login.php" role="button">KEMBALI</a>
	</ul>

</form>
</section>
	
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
 

</body>
</html>