<?php
error_reporting(0);
include_once("class/class.koneksi.php");
$database = new koneksi();
$db = $database->doKoneksi();

include_once("class/class.pegawai.php");
$pegawai = new Pegawai($db);
$id_pegawai = isset($_GET['id_pegawai']) ? $_GET['id_pegawai'] : die('ERROR: missing ID.');
$pegawai->id_pegawai = $id_pegawai;
	
if($pegawai->delete()){
	echo '<script>alert("Data Berhasil Dihapus!");
			document.location="?page=list_pegawai&success=true"; </script>';
} else{
	echo '<script>alert("Data Gagal Dihapus!");
			document.location="?page=list_pegawai&success=true"; </script>';
		
}
?>


