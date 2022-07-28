<?php
error_reporting(0);
session_start();

date_default_timezone_set('Asia/Jakarta');
$jam_keluar = date('H:i');

$config = new koneksi();
$db = $config->doKoneksi();

$id_tamu = isset($_GET['id_tamu']) ? $_GET['id_tamu'] : die('ERROR: missing ID.');
include_once("class/class.bukutamu.php");
$eks = new BukuTamu($db);

$eks->id_tamu = $id_tamu;

$eks->readOne();

if($_POST){
	$eks->nama = $_POST['nama'];
	$eks->jam_keluar = $_POST['jam_keluar'];
	$eks->status = $_POST['status'];
    
   if($eks->update()){
		echo '<script>alert("Data Berhasil Diedit!");
			document.location="?page=list_bukutamu&success=true"; </script>';
	}
}
?>

<head>
  <link rel="stylesheet" href="assets/select2/select2.min.css"/>
  	<script src="assets/select2/jquery-2.1.4.min.js"></script>
    <script src="assets/select2/select2.min.js"></script>
</head>

<h3><b>Update Data Buku Tamu</b></h3>
<div class="content-utama">
	<div>
				<form class="well" method="POST" action="#" id="input">
			
						<div class="form-group">
							<label>Nama</label>
							<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $eks->nama; ?>" placeholder="Nama Tamu" required readonly>
						</div>
						
						<div class="form-group">
							<label>Jam Keluar</label>
							<input type="time" class="form-control" id="jam_keluar" name="jam_keluar" value="<?php echo $eks->jam_keluar; ?>" >
						</div>

						<div class="form-group">
							<label>Status</label>
							<select id="status" name="status" class="form-control" required>
								<option>--Pilih Status--</option>
								<option value="Selesai">Selesai</option>
								<option value="Belum Selesai">Belum Selesai</option>
							</select>
						</div>
					
							<input type="submit" name="simpan" class="btn btn-success" value="UPDATE">
							<input type="button" onclick="document.location='?page=list_bukutamu'" name="kembali" value="BACK" class="btn btn-primary">
					</form>    
						</div>
			</div>
	

			