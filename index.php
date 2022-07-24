<?php
session_start();

if (!isset($_SESSION["login"])){
	header("Location: login.php");
	exit;
}

require 'functions.php';	

$mahasiswa = query("SELECT * FROM mahasiswa ");


// ketika Tombol Cari Ditekan
if (isset($_POST["cari"])) {
	$mahasiswa = cari($_POST["keyword"]);

}

 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--<link rel="stylesheet" type="text/css" href="index.css">-->
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<title>Halaman Admin</title>
	<style>
		.loader {
	background-color: black;
	width: 20px;
	position: absolute;
	left: 330px;
	z-index: 1;
	display: none;
}
	</style>
	

</head>
<body>
	<header style="
	background-color:#0d6efd;
	position: fixed;
	width: 100%;
	z-index: 9999;

	">

	<a class="btn btn-danger" href="logout.php" role="button" style="
    float: right;
    margin-top: 20px;
    margin-right: 20px;
	">LOGOUT</a>
	
	<h1 style="padding: 20px; font-weight:bold; color: white;">Daftar <span class="efek-ngetik" style="color:white;"></span></h1>

	<a class="btn btn-light" href="tambah.php" role="button" style="margin-right: 20px; float:right;">Tambah Data Mahasiswa</a>

 	<form action="" method="POST">
		
		<form class="d-flex" role="search" >
        <input class="form-control me-2" type="search" placeholder="Cari Data Mahasiswa ...." aria-label="Search" autocomplete="off" id="keyword"style="width:30%; margin-left: 20px;">
        <button class="btn btn-outline-success" type="submit" type="submit" name="cari" id="tombol-cari" >Search</button>
      	</form>

	</form>

	<br>
</header>
<section class="datamhs" style="
padding-top: 155px;
padding-bottom: 0px;

">
 <div id="container">
	
	<div class="data">
	<table class="table table-dark table-striped" border="1" cellpadding="10" cellspacing="0">
		
		<tr>
			<th>No.</th>
			<th>Aksi</th>
			<th>Gambar</th>
			<th>NIM</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Jurusan</th>
		</tr>


		<?php $i=1; ?>
		<?php foreach ($mahasiswa as $row) : ?>
		<tr>
			<td><?= $i; ?></td>
			<td>
			<a class="btn btn-primary" href="ubah.php?id=<?= $row["id"]; ?>" role="button">UBAH</a>
			<a class="btn btn-danger" href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('YAKIN???');" role="button">HAPUS</a>
			
			</td>
			<td><img src="img/<?= $row["gambar"]; ?>" width="50"></td>
			<td><?= $row["nim"]; ?></td>
			<td><?= $row["nama"]; ?></td>
			<td><?= $row["email"]; ?></td>
			<td><?= $row["jurusan"]; ?></td>
		</tr>
		<?php $i++ ?>
		<?php endforeach ?>
	</table>

	</div>
</div>
</section>


<footer style="
background-color: #0d6efd;
padding: 20px;
margin-top: 0;
"><div class="container">
	<h5 style="
	color: white;
	text-align: center;
	align-content: center;
	">Copyright 2022, By Naufal Harits Prasetia --</h5>
</div>

</footer>



	<script type="text/javascript" src="js/jalan.js"></script>
	<script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
