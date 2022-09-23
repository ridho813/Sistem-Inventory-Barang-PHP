
<?php

	session_start();
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	$koneksi = new mysqli("localhost","root","","dazel");

	
	?>	

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sistem Inventory Barang Di Dazzel</title>

	<!-- Bootstrap -->
		
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<style>
		body {
	          background: url(img/fotobr.jpg) no-repeat fixed;
	          -webkit-background-size: 100% 100%;
	          -moz-background-size: 100% 100%;
	          -o-background-size: 100% 100%;
	          background-size: 100% 100%;
	        }
		.row {
			margin:100px auto;
			width:400px;
			text-align:center;
		}
		.login {
			background-color:#FFFFFF;
			padding:25px;
			margin-top:10px;
		}
	</style>
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	
	<div class="container">
		<div class="row">
		<div class="center">
		<div class="login">
				
				
				
				<form role="form" action="" method="post">
				<h1> DAZZEL</h1>
				<h4> Sistem Inventory Barang DI Dazzel</h4>
				<br>
					<div class="form-group">
					
					 
						<input type="text" name="username"  class="form-control" placeholder="Masukan Username" required autofocus />
					</div>
					<div class="form-group">
						<input type="password" name="password" class="form-control" placeholder="Masukan Password" required autofocus />
					</div>
					<div class="form-group">
					
					
					</div>
					<div class="form-group">
						<input type="submit"  class="btn btn-primary btn-block" value="Masuk" />
						
					</div>
						<br>
			
				</form>
				
			</div>
		
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>

	<?php
	
					$jabatan = $_POST['jabatan'];
					$login = $_POST['login'];
					// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];
 
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"select * from user where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
 
	// cek jika user login sebagai admin
	if($data['jabatan']=="admin"){
 
		// buat session login dan username
		$_SESSION['id_user'] = $data['id_user'];
		$_SESSION['username'] = $username;
		$_SESSION['jabatan'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:index3.php");
 
	// cek jika user login sebagai pegawai
	}else if($data['jabatan']=="karyawan"){
		// buat session login dan username
		$_SESSION['id_user'] = $data['id_user'];
		$_SESSION['username'] = $username;
		$_SESSION['nama'] = $nama;
		$_SESSION['jabatan'] = "karyawan";
		// alihkan ke halaman dashboard pegawai
		header("location:index3.php");
 
	// cek jika user login sebagai pengurus
	}else if($data['jabatan']=="staf administasi"){
		// buat session login dan username
		$_SESSION['id_user'] = $data['id_user'];
		$_SESSION['username'] = $username;
		$_SESSION['jabatan'] ='staf administasi';
		// alihkan ke halaman dashboard pengurus
		header("location:index.php");
 
	}else{
 
		// alihkan ke halaman login kembali
		echo '<center><div class="alert alert-danger">Maaf... Login gagal. Silahkan Coba Kembali</div></center>';
	}	
}else{
	echo '<center><div class="alert alert-danger">Maaf... Login gagal. Silahkan Coba Kembali</div></center>';
}
 
					
				?>
			