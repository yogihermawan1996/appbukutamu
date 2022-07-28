<?php
error_reporting(0);
session_start();
class Laporan {
		
public function LaporanBukuTamu() {
		
$conn = new mysqli('localhost', 'root', '', 'bukutamu');
if (isset($_POST['tanggal_awal']) && isset($_POST['tanggal_akhir'])) {
	 if ($_POST['tanggal_awal'] && $_POST['tanggal_akhir']) {
		$tanggal_awal = $_POST['tanggal_awal'];
		$tanggal_akhir = $_POST['tanggal_akhir'];
	}
}
?>

<head>
    <link rel="stylesheet" href="assets/select2/select2.min.css"/>
  	<script src="assets/select2/jquery-2.1.4.min.js"></script>
    <script src="assets/select2/select2.min.js"></script>
</head>

	<div class="content-utama">
	<div>
	<form id="input" action=""  method="post">
	<center><h3><u><b>LAPORAN BUKU TAMU</b></u></h3></center>
	<table class="table table-responsive" id="data">
	<tr>
	<td>
		<div class="form-group">
			<br><label>&nbsp; &nbsp; PILIH TANGGAL AWAL</label>
			<input type="date" class="form-control" id="tanggal_awal" name="tanggal_awal"> <br>
			<label>&nbsp; &nbsp; PILIH TANGGAL AKHIR</label> 
			<input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir"> <br>
			<input type="submit" name="submit" value="PILIH" class="btn btn-success" > 
		</div>
	</td>
	</tr>
	</table>
	</form>
	</div>
	</div>

	 <div class="col text-right" style="padding-right: 10px;padding-bottom: 4px;">
     <a href="?page=export_bukutamu&tanggal_awal=<?= $tanggal_awal?>&tanggal_akhir=<?= $tanggal_akhir?>" target="_self">
       <button class="btn btn-success" name="submit">EXPORT</button>
     </a> 
     </div>
	
	<table class="table table-condensed">
	<thead>
		 <tbody>
		<tr>
			<th>No</th>
			<th>Tanggal</th>
			<th>Nama</th>
			<th>Keperluan</th>
			<th>Jam Datang</th>
			<th>Jam Keluar</th>
			<th>Bertemu</th>
			<th>Status</th>
		</tr>
		<?php
		$no=1;
		$q = mysqli_query($conn, "SELECT * FROM tbl_bukutamu WHERE tanggal BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
		while ($data = $q->fetch_assoc()) {
		?>
				<tr>
					<td align="center" width="1%"><?= $no++ ?></td>
					<td><?php echo date('d-m-Y', strtotime($data['tanggal']))?></td>
					<td><?php echo $data['nama']; ?></td>
					<td><?php echo $data['keperluan']; ?></td>
					<td><?php echo $data['jam_datang']; ?></td>
					<td><?php echo $data['jam_keluar']; ?></td>
					<td><?php echo $data['bertemu']; ?></td>
					<td><?php echo $data['status']; ?></td>
				</tr>
				</tbody>
			<?php  }  ?>
	</thead>
	</table>
<?php } } ?>





