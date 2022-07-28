<?php
error_reporting(0);
include_once("class/class.koneksi.php");
$database = new koneksi();
$db = $database->doKoneksi();

include_once("class/class.unitkerja.php");
$unitkerja = new UnitKerja($db);
$id_unitkerja = isset($_GET['id_unitkerja']) ? $_GET['id_unitkerja'] : die('ERROR: missing ID.');
$unitkerja->id_unitkerja = $id_unitkerja;
	
if($unitkerja->delete()){
	echo '<script>alert("Data Berhasil Dihapus!");
			document.location="?page=list_unitkerja&success=true"; </script>';
} else{
	echo '<script>alert("Data Gagal Dihapus!");
			document.location="?page=list_unitkerja&success=true"; </script>';
		
}
?>


