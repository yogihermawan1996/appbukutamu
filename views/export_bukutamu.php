<?php

$hari_ini = date('N');
$tanggal_sekarang = date('Y-m-d');
$tanggal_sekarang = tglIndo($tanggal_sekarang);

  function hariIndo($ke) {
    $hari = [
      'Senin',
      'Selasa',
      'Rabu',
      'Kamis',
      'Jum\'at',
      'Sabtu',
      'Minggu'
    ];

    return $hari[$ke-1];
  }
  
  function tglIndo($tgl) {
    $bulan = [
      'Januari',
      'Februari',
      'Maret',
      'April',
      'Mei',
      'Juni',
      'Juli',
      'Agustus',
      'September',
      'Oktober',
      'November',
      'Desember'
    ];

    $pisah = explode('-', $tgl);
    
    return $pisah[2] . ' ' . $bulan[(int)$pisah[1]-1] . ' ' . $pisah[0];
  }
  
  function bulanTahunSekarang($tgl) {
    $bulan = [
      'Januari',
      'Februari',
      'Maret',
      'April',
      'Mei',
      'Juni',
      'Juli',
      'Agustus',
      'September',
      'Oktober',
      'November',
      'Desember'
    ];

    $pisah = explode('-', $tgl);
    
    return $bulan[(int)$pisah[1]-1] . ' ' . $pisah[0];
  }
?>

<!DOCTYPE html>
<html>
<head>
  	<script src="assets/select2/jquery-2.1.4.min.js"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="assets/js/app.min.js" type="text/javascript"></script>
    <script>
		window.print();
		</script>
</head>
	<body> 
		<?php
		$conn = new mysqli('localhost', 'root', '', 'bukutamu');
			if (isset($_POST['tanggal_awal']) && isset($_POST['tanggal_akhir'])) {
		 	if ($_POST['tanggal_awal'] && $_POST['tanggal_akhir']) {
			$tanggal_awal = $_POST['tanggal_awal'];
			$tanggal_akhir = $_POST['tanggal_akhir'];
			}
		}
		?>

		<h2 style="text-align: left; margin-bottom: 0px;"><center><b>LAPORAN TAMU</b></center></h2>
		<h4 style="text-align: left; margin-bottom: 0px;"><center><strong><?= hariIndo($hari_ini) ?></strong>, <strong><?= $tanggal_sekarang?></strong></center></h4> <br> <br>

	<table class="table table-striped table-bordered" id="data"> 
	<thead>
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
		</thead>
		<tbody>
		<?php
		$conn = new mysqli('localhost', 'root', '', 'bukutamu');
			if (isset($_GET['tanggal_awal']) && isset($_GET['tanggal_akhir'])) {
			if ($_GET['tanggal_awal'] && $_GET['tanggal_akhir']) {
			$tanggal_awal = $_GET['tanggal_awal'];
			$tanggal_akhir = $_GET['tanggal_akhir'];
			 	} 	
    }
		$q = mysqli_query($conn, "SELECT * FROM tbl_bukutamu WHERE tanggal BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
		$no=1;
		while ($row = $q->fetch_assoc()) {
		?>
				<tr>
					<td align="center" width="5%"><?= $no++ ?></td>
					<td><?php echo date('d-m-Y', strtotime($row['tanggal']))?></td>
					<td><?php echo $row['nama']; ?></td>
					<td><?php echo $row['keperluan']; ?></td>
					<td><?php echo $row['jam_datang']; ?></td>
					<td><?php echo $row['jam_keluar']; ?></td>
					<td><?php echo $row['bertemu']; ?></td>
					<td><?php echo $row['status']; ?></td>
				</tr>

			<?php  }  ?>
			</tbody>
	    </thead>
  </table>
</html>

