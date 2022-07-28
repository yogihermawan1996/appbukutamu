<?php
error_reporting(0);
include_once("class/class.koneksi.php");
$database = new koneksi();
$db = $database->doKoneksi();

include_once("class/class.bukutamu.php");
$bukutamu = new BukuTamu($db);
$id_tamu = isset($_GET['id_tamu']) ? $_GET['id_tamu'] : die('ERROR: missing ID.');
$bukutamu->id_tamu = $id_tamu;
	
if($bukutamu->delete()){
	echo '<script>alert("Data Berhasil Dihapus!");
			document.location="?page=list_bukutamu&success=true"; </script>';
} else{
	echo '<script>alert("Data Gagal Dihapus!");
			document.location="?page=list_bukutamu&success=true"; </script>';
		
}
?>


