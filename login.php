<?php 
session_start();
require 'functions.php';
// //CEK COOKIE
if(isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
	$id = $_COOKIE['id'];
	$key = $_COOKIE['key'];

	// Ambil Username Berdasarkan ID
	$result = mysqli_query($conn, "SELECT username FROM users WHERE id = $id");
	$row = mysqli_fetch_assoc($result);

	//cek cookie dan username
	if($key === hash('sha256',$row['username'])){
		$_SESSION['login'] = true;
	}


}


if (isset($_SESSION["login"])){
	header("Location: index.php");
	exit;
}



if (isset($_POST["login"])) {
	$username = $_POST["username"];
	$password = $_POST["password"];

$result = mysqli_query($conn,"SELECT * FROM users WHERE username = '$username'");
	
	//CEK USERNAME
if (mysqli_num_rows($result) === 1) {

	// cek password
	$row = mysqli_fetch_assoc($result);
	if (password_verify($password,$row["password"])) {
			//set session
			$_SESSION["login"] = true;

			// Cek Remember ME
			if (isset($_POST['remember'])) {
				//buat cookie
				setcookie('id', $row['id'], time()+3600);
				setcookie('key', hash('sha256',$row['username']));

				setcookie('login', 'true' , time()+3600);
			}



			echo "<script>
				alert('Anda Berhasil Login!!!');
				document.location.href = 'index.php';
			</script>";
		exit;

		}

	}
	$error = true;

}

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<title>Halaman Login</title>
</head>
<body>

	<header style="padding:20px; background-color: #0d6efd; color: white;">
	<h1>Halaman Login</h1>
	<div style="clear: both;justify-content: right;display: flex;">
	<button type="link" class="btn btn-light" ><a href="registrasi.php" style="text-decoration: none; color: red; " class="reg">Registrasi</a></button>
	</div>
	<style type="text/css">
		button:hover {
			transition: 2s;
			transform: scale(1.2);
		}
	</style>
	</header>


	<marquee class="marq" bgcolor="#adb5bd" scrollamount="8s" behavior="alternate" onmouseover="this.stop()" onmouseout="this.start()" direction="right" style=" padding:10px;" > --- HALAMAN LOGIN --- </marquee>
		<style type="text/css">
		.marq {
			font-weight: bolder;
			color:#0d6efd;
		}
		.marq:hover{
			background-color: black;
			color: white;
		}
	</style>

	<section class="halamanlogin">

<?php if(isset($error)) : ?>
	<p style="color: red; font-style: italic;">USERNAME / PASSWORD SALAH</p>
<?php endif; ?>
	
	<!-- VERSI BOOTSTRAP -->


		<form action="" method="POST" style=" padding: 50px; position: inherit; text-align: center; background-color: grey;">

		<h2 style="color: white; font-weight: bold;">LOGIN</h2>
		<!--
		<div class="form-floating mb-3">
  		<input type="text" class="form-control" id="floatingInput" id="username" name="username" placeholder="name@example.com" style="width:300px;margin-left:425px;">
  		<label for="floatingInput"style="margin-left:425px;">Username</label>
		</div>

		<div class="form-floating">
  		<input name="password" id="password" type="password" class="form-control" id="floatingPassword" placeholder="Password" style="width:300px;margin-left:425px;">
  		<label for="password" for="floatingPassword" style="margin-left:425px;">Password</label>
  		</div> -->
  		<div class="input-group mb-3" style="
			margin-top:20px ;
			width: 40%;
			margin: auto;
			display: flex;
			justify-content: center;
			">
			<span class="input-group-text" id="inputGroup-sizing-default">USERNAME</span>
			<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="username" id="username">
			</div>

			<div class="input-group mb-3" style="
			margin-top:20px ;
			width: 40%;
			margin: auto;
			display: flex;
			justify-content: center;
			">
			<span class="input-group-text" id="inputGroup-sizing-default">PASSWORD</span>
			<input type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="password" id="password">
			</div>

  		<div class="form-check" style="display:flex; justify-content:center; margin-top:10px;">
  		<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" style="padding: 12px; ">
  		<label class="form-check-label" for="flexCheckDefault" style=" color:white; margin-left:10px; margin-top: 3px;">
	    Remenber ME
  		</label>
		</div>
		<div style="display: flex; justify-content: center;">	 
		 <button type="submit" name="login" class="btn btn-primary" style="margin:20px ;">LOGIN</button>
		</div>


		</form>


		<!--
		<form action="" method="POST">
	Versi HTML BIASA
	<ul>
		<li>
			<label for="username">Username :</label>
			<input type="text" name="username" id="username">
		</li>
		<li>
			<label for="password">Password :</label>
			<input type="password" name="password" id="password">
		</li>
		<li>
			
			<input type="checkbox" name="remember" id="remember">
			<label for="remember">Remember Me</label>
		</li>
		<li>
			<button type="submit" name="login">LOGIN</button>
		</li>
	</ul>


</form>
-->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
 

</body>

</html>