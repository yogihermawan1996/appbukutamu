<?php
error_reporting(0);

include_once('class/class.koneksi.php');
$config = new koneksi();
$db = $config->doKoneksi();
	
if($_POST){
	
	include_once('class/class.akses.php');
	$login = new Akses($db);
	$login->userid = $_POST['username'];
	$login->passid = md5($_POST['password']);
	
	if($login->login()){
		echo "<script type=text/javascript>alert('Selamat.. Anda Berhasil Login kedalam Sistem');
				   location.href='views.php';
				  </script>";	
	}
	
	else{
		echo "<script>alert('Login Gagal!!! Pastikan username dan password sudah benar')</script>";
	}
}
?>

<!DOCTYPE>
<html lang="en">
<head>
<title>Buku Tamu</title>
<link rel='icon' type='image/png' href='assets/images/logo.png'>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link media="all" type="text/css" rel="stylesheet" href="assets/css/bootstrap.min.css">
<link media="all" type="text/css" rel="stylesheet" href="assets/css/style.css">
</head>

<body>
	<div class="top">
		<div class="container">
			<center><h3><b>APLIKASI BUKU TAMU</h3></b></center>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div>
				<div class="box">
					<center><h3><b>Login</b></h3></center>
					<form role="form" method="POST" action="">
						<div class="form-group">
						<label>Username</label>
							<input type="text" class="form-control" name="username" value="" placeholder="Username">
						</div>
						<div class="form-group">
						<label>Password</label>
							<input type="password" class="form-control" name="password" placeholder="Password">
						</div>
						<div class="form-group">	
							<center><button class="btn btn-primary fa fa-sign-in" type="submit">Login</button></center>
						</div>
					</form>	
			</div>
		</div>
	</div>
	<div class="footer">
		<div class="container">
			<p>Copyright &copy 2022. <a>Yogi Hermawan</a></p>
		</div>
	</div> 
</body>
</html>