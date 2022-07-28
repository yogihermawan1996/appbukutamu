<?php  
error_reporting(0);
session_start();

$config = new koneksi();
$db = $config->doKoneksi();

$id_tamu = isset($_GET['id_tamu']) ? $_GET['id_tamu'] : die('ERROR: missing ID.');
include_once("class/class.bukutamu.php");
$eks = new BukuTamu($db);

$eks->id_tamu = $id_tamu;

$eks->readDetail();
?>

<head>
	<link href="assets/js/datatables.min.css" rel="stylesheet">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/bootstrap.datatable.css" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet">
  <script src="assets/js/datatables.min.js"></script>
</head>

<div class="content-utama">
	<center><h3><u><b>DETAIL TAMU</b></u></h3></center>
		<br><table class="table table-condensed">
				<tr>
					<td>Tanggal</td>
					<td>:</td>
					<td><?php echo date('d-m-Y', strtotime($eks->tanggal)) ?></td>
				</tr>
				<tr>
					<td>No Identitas</td>
					<td>:</td>
					<td><?php echo $eks->no_identitas; ?></td>
				</tr>
				<tr>
					<td>Nama</td>
					<td>:</td>
					<td><?php echo $eks->nama; ?></td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>:</td>
					<td><?php echo $eks->alamat; ?></td>
				</tr>
				<tr>
					<td>Jenis Kelamin</td>
					<td>:</td>
					<td><?php echo $eks->jenis_kelamin; ?></td>
				</tr>
				<tr>
					<td>No Telepon</td>
					<td>:</td>
					<td><?php echo $eks->no_telp; ?></td>
				</tr>
				<tr>
					<td>Instansi</td>
					<td>:</td>
					<td><?php echo $eks->instansi; ?></td>
				</tr>
				<tr>
					<td>Keperluan</td>
					<td>:</td>
					<td><?php echo $eks->keperluan; ?></td>
				</tr>
				<tr>
					<td>Jam</td>
					<td>:</td>
					<td><?php echo $eks->jam_datang; ?></td>
				</tr>
				<tr>
					<td>Bertemu dengan</td>
					<td>:</td>
					<td><?php echo $eks->bertemu; ?></td>
				</tr>
				<tr>
					<td>Status</td>
					<td>:</td>
					<td><?php echo $eks->status; ?></td>
				</tr>
		</table>
		<a href="?page=list_bukutamu" class="btn btn-primary fa fa-arrow-left"> Back</a> <br>
</div>

