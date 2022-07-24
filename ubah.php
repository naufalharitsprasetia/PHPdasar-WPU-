<?php 	
	session_start();

if (!isset($_SESSION["login"])){
	header("Location: login.php");
	exit;
}

require 'functions.php';

// Ambil Data di URL
$id = $_GET["id"];
// query data mahassiswa berdasarkan id nya
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];
	// cek apakah tombol submit sudah di pencet atau belum
	if (isset($_POST["submit"])) {


	

	//cek apakah data berhasil diubah atau tidak
	if (ubah($_POST)>0) {
		echo "
			<script>
				alert('Data Berharsil DiUbah!!!');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "<script>
				alert('Data GAGAL DiUbah!!');
				document.location.href = 'index.php';
			</script>";
	}

}




 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<title>Ubah Data Mahasiswa</title>
</head>
<body>

	<header style="background-color:#0d6efd ; padding: 20px; color : white;">
	
	<h1>Ubah Data </h1>

	</header>

	<section class="tambahdata" style="
	padding: 30px;
	">
	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
		<input type="hidden" name="gambarLama" value="<?= $mhs["gambar"]; ?>">
		
		<!--
		<ul>
			<li>
				<label for="nim">NIM :</label>
				<input type="text" name="nim" id="nim" required value="<?= $mhs["nim"]?>">
			</li>
			<li>
				<label for="nama">Nama :</label>
				<input type="text" name="nama" id="nama" required value="<?= $mhs["nama"]; ?>">
			</li>
			<li>
				<label for="email">Email :</label>
				<input type="text" name="email" id="email" value="<?= $mhs["email"]; ?>" >
			</li>
			<li>
				<label for="jurusan">Jurusan :</label>
				<input type="text" name="jurusan" id="jurusan" required value="<?= $mhs["jurusan"]; ?>">
			</li>
			<li>
				<label for="gambar">Gambar :</label>
				<img src="img/<?= $mhs['gambar'] ; ?>" width="60"> <br>
				<input type="file" name="gambar" id="gambar" ; ?>
			</li>
			<li>
				<button type="submit" name="submit">UBAH!!!!</button>
			</li>
		</ul> -->
		<!-- UBAH DATA -->
		<div class="input-group mb-3">
  			<span class="input-group-text" id="inputGroup-sizing-default" for="nim">NIM</span>
  			<input type="number"  class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="nim" id="nim" value="<?= $mhs["nim"]?>" required>
			</div>

			<div class="input-group mb-3">
  			<span class="input-group-text" id="inputGroup-sizing-default" for="nama">Nama</span>
  			<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="nama" id="nama" value="<?= $mhs["nama"]?>" required>
			</div>

			<div class="input-group mb-3">
  			<span class="input-group-text" id="inputGroup-sizing-default" for="email">Email</span>
  			<input type="email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="email" id="email" value="<?= $mhs["email"]?>">
			</div>

			<div class="input-group mb-3">
  			<span class="input-group-text" id="inputGroup-sizing-default" for="jurusan">Jurusan</span>
  			<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="jurusan" id="jurusan" value="<?= $mhs["jurusan"]?>" required>
			</div>


			<div class="input-group mb-3">
			<img src="img/<?= $mhs['gambar'] ; ?>" width="90" class="rounded" alt="..."> <br>
  			<label class="input-group-text" for="gambar">Ganti</label>
			</div>
			
			<input class="btn btn-primary" type="submit" value="UBAH" name="submit">

			<a class="btn btn-warning" href="login.php" role="button">KEMBALI</a>


	</form>
	</section>
		
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>	



</body>
</html>