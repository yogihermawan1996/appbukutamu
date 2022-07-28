<?php
error_reporting(0);
session_start();

date_default_timezone_set('Asia/Jakarta');
$jam_datang = date('H:i');
$jam_keluar = date('00:00');

include_once("class/class.pegawai.php");
$pegawai = new Pegawai($db);

$config = new koneksi();
$db = $config->doKoneksi();

if($_POST){
    include_once("class/class.bukutamu.php");
    $eks = new BukuTamu($db);
    $eks->id_tamu = $_POST['id_tamu'];
    $eks->tanggal = $_POST['tanggal'];
	$eks->no_identitas = $_POST['no_identitas'];
	$eks->nama = $_POST['nama'];
	$eks->alamat = $_POST['alamat'];
	$eks->jenis_kelamin = $_POST['jenis_kelamin'];
    $eks->no_telp = $_POST['no_telp'];
    $eks->instansi = $_POST['instansi'];
	$eks->keperluan = $_POST['keperluan'];
	$eks->jam_datang = $_POST['jam_datang'];
	$eks->jam_keluar = $_POST['jam_keluar'];
	$eks->bertemu = $_POST['bertemu'];
	$eks->status = $_POST['status'];
	
    if($eks->insert()){
		echo '<script>alert("Data Berhasil Disimpan!");
			document.location="?page=list_bukutamu&success=true"; </script>';

		}
	}
?>

<head>
    <link rel="stylesheet" href="assets/select2/select2.min.css"/>
  	<script src="assets/select2/jquery-2.1.4.min.js"></script>
    <script src="assets/select2/select2.min.js"></script>
</head>

<h3><b>Form Data Buku Tamu</b></h3>
<div class="content-utama">
	<div>
				<form class="well" method="POST" action="#" id="input">
						<div class="form-group">
							<label>Tanggal</label>
							<input type="date" class="form-control" id="tanggal" name="tanggal" required>
						</div>
						<div class="form-group">
							<label>No Identitas (KTP/SIM/PASPOR)</label>
							<input type="text" class="form-control" id="no_identitas" name="no_identitas" placeholder="No KTP/SIM/PASPOR" required>
						</div>
						<div class="form-group">
							<label>Nama</label>
							<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Tamu" required>
						</div>
						<div class="form-group">
							<label>Alamat</label>
							<input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" required>
						</div>
						<div class="form-group">
							<label>Jenis Kelamin</label>
							<select id="jenis_kelamin" name="jenis_kelamin" class="form-control" required>
								<option>--Pilih Jenis Kelamin--</option>
								<option value="Laki-Laki">Laki-Laki</option>
								<option value="Perempuan">Perempuan</option>
							</select>
						</div>
						<div class="form-group">
							<label>No Telepon</label>
							<input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="cth : 08xxxx" required>
						</div>
						<div class="form-group">
							<label>Instansi</label>
							<input type="text" class="form-control" id="instansi" name="instansi" placeholder="Instansi" required>
						</div>
						<div class="form-group">
							<label>Keperluan</label>
							<input type="text" class="form-control" id="keperluan" name="keperluan" placeholder="Keperluan" required>
						</div>
						<div class="form-group">
							<label>Jam Datang</label>
							<input type="time" class="form-control" id="jam_datang" name="jam_datang"  value = <?= $jam_datang ?>>
						</div>
						<div class="form-group">
							<input type="hidden" class="form-control" id="jam_keluar" name="jam_keluar" value = <?= $jam_keluar ?> >
						</div>
						<div class="form-group">
							<label>Bertemu</label>
							<select id="bertemu" name="bertemu" class="form-control" required>
								<option>--Bertemu--</option>
								<?php
									$stmt = $pegawai->read();
									while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
									extract($row);
									echo '<option value"'.$row['id_pegawai'].'">'.$row['nip'].' - '.$row['nama'].' - '.$row['unit_kerja'].' </option>';
								}
								?>
							</select>
							<script type="text/javascript">
								$(document).ready(function () {
									$("#bertemu").select2({
									placeholder: "Bertemu"
									});
							});
							</script>
						</div>	
						<div class="form-group">
							<input type="hidden" class="form-control" id="status" name="status" value="Belum Selesai" required>
						</div>
							<input type="submit" name="simpan" class="btn btn-success" value="SAVE">
							<input type="button" onclick="document.location='?page=list_bukutamu'" name="kembali" value="BACK" class="btn btn-primary">
					</form>    
				</div>
			</div>
	



