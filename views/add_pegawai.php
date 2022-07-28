<?php
error_reporting(0);
session_start();

include_once("class/class.unitkerja.php");
$unitkerja = new UnitKerja($db);

$config = new koneksi();
$db = $config->doKoneksi();

if($_POST){
    include_once("class/class.pegawai.php");
    $eks = new Pegawai($db);
    $eks->id_pegawai = $_POST['id_pegawai'];
    $eks->unit_kerja = $_POST['unit_kerja'];
	$eks->nip = $_POST['nip'];
	$eks->nama = $_POST['nama'];
	$eks->no_telp = $_POST['no_telp'];
	

    if($eks->insert()){
		echo '<script>alert("Data Berhasil Disimpan!");
			document.location="?page=list_pegawai&success=true"; </script>';

		}
	}
?>

<head>
    <link rel="stylesheet" href="assets/select2/select2.min.css"/>
  	<script src="assets/select2/jquery-2.1.4.min.js"></script>
    <script src="assets/select2/select2.min.js"></script>
</head>

<h3><b>Form Data Pegawai</b></h3>
<div class="content-utama">
	<div>
				<form class="well" method="POST" action="#" id="input">
						<div class="form-group">
							<label>NIP</label>
							<input type="text" class="form-control" id="nip" name="nip" placeholder="NIP Pegawai" required>
						</div>
						<div class="form-group">
							<label>Nama</label>
							<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Pegawai" required>
						</div>
						<div class="form-group">
							<label>No Telepon</label>
							<input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="cth : 08xxxx" required>
						</div>
						<div class="form-group">
							<label>Pilih Unit Kerja</label>
							<select id="unit_kerja" name="unit_kerja" class="form-control" required>
								<option>--Pilih Unit Kerja--</option>
								<?php
									$stmt = $unitkerja->read();
									while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
									extract($row);
									echo '<option value"'.$row['id_unitkerja'].'">'.$row['unit_kerja'].'</option>';
								}
								?>
							</select>
							<script type="text/javascript">
								$(document).ready(function () {
									$("#unit_kerja").select2({
									placeholder: "Pilih Unit Kerja"
									});
							});
							</script>
						</div>	
							<input type="submit" name="simpan" class="btn btn-success" value="SAVE">
							<input type="button" onclick="document.location='?page=list_pegawai'" name="kembali" value="BACK" class="btn btn-primary">
					</form>    
				</div>
			</div>
	



