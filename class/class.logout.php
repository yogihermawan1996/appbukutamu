<?php
error_reporting(0);
class Logout{
	public function logoutsistem()
	{
	session_start();
	session_destroy();
	echo"<script>alert('Terima kasih, Anda Berhasil Keluar');
	window.location='index.php';
	</script>";
	} 
}
?>
