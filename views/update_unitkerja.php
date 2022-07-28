<?php
error_reporting(0);
$id_unitkerja = isset($_GET['id_unitkerja']) ? $_GET['id_unitkerja'] : die('ERROR: missing ID.');
include_once("class/class.unitkerja.php");
$eks = new UnitKerja($db);

$eks->id_unitkerja = $id_unitkerja;

$eks->readOne();

if($_POST){
	$eks->unit_kerja = $_POST['unit_kerja'];
    
   if($eks->update()){
		echo '<script>alert("Data Berhasil Diedit!");
			document.location="?page=list_unitkerja&success=true"; </script>';
	}
}
?>

<head>
    <link rel="stylesheet" href="assets/select2/select2.min.css"/>
  	<script src="assets/select2/jquery-2.1.4.min.js"></script>
    <script src="assets/select2/select2.min.js"></script>
</head>

<h3><b>Update Unit Kerja</b></h3>
<div class="content-utama">
	<div>
				<form class="well" method="POST" action="#" id="input">
						<div class="form-group">
							<label>Unit Kerja</label>
							<input type="text" class="form-control" id="unit_kerja" name="unit_kerja" value="<?php echo $eks->unit_kerja; ?>" placeholder="Unit Kerja">
						</div>
							<input type="submit" name="simpan" class="btn btn-success" value="UPDATE">
							<input type="button" onclick="document.location='?page=list_unitkerja'" name="kembali" value="BACK" class="btn btn-primary">
					</form>    
				</div>
			</div>
			