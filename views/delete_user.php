<?php
error_reporting(0);
include_once("class/class.koneksi.php");
$database = new koneksi();
$db = $database->doKoneksi();

include_once("class/class.user.php");
$user = new User($db);
$id_user = isset($_GET['id_user']) ? $_GET['id_user'] : die('ERROR: missing ID.');
$user->id_user = $id_user;
	
if($user->delete()){
	echo '<script>alert("Data Berhasil Dihapus!");
			document.location="?page=list_user&success=true"; </script>';
} else{
	echo '<script>alert("Data Gagal Dihapus!");
			document.location="?page=list_user&success=true"; </script>';
		
}
?>


