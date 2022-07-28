<?php  
error_reporting(0);
include_once("class/class.bukutamu.php");
$bukutamu = new BukuTamu($db);
$stmt = $bukutamu->read();
?>

<head>
	<script src="assets/select2/jquery-2.1.4.min.js"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/app.min.js" type="text/javascript"></script>
</head>

<div class="content-utama">
	<center><h3><u><b>DATA TAMU</b></u></h3></center>
		<a href="?page=add_bukutamu" class="btn btn-primary fa fa-plus"> Add Data Tamu</a> <br>
		<br><table class="table table-striped table-bordered" id="data">
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
					<th>Ubah Status</th>
					<th>Tools</th>
					</tr>
			</thead>
			<tbody>
			<?php
				$i=1;
				while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			?>
				<tr>
					<td align="center" width="1%"><?php echo $i; ?></td>
					<td><?php echo date('d-m-Y', strtotime($row['tanggal']))?></td>
					<td><?php echo $row['nama']; ?></td>
					<td><?php echo $row['keperluan']; ?></td>
					<td><?php echo $row['jam_datang']; ?></td>
					<td><?php echo $row['jam_keluar']; ?></td>
					<td><?php echo $row['bertemu']; ?></td>
					<td><?php echo $row['status']; ?></td>
					<td>
						<a class="btn btn-warning fa fa-edit" href="?page=update_bukutamu&id_tamu=<?php echo $row['id_tamu']; ?>" title="Update"></a>
					</td>
					<td>
						<a class="btn btn-success fa fa-search" href="?page=detail_tamu&id_tamu=<?php echo $row['id_tamu']; ?>" title="Detail Tamu"></a>
						<a class="btn btn-danger fa fa-trash" href="?page=delete_bukutamu&id_tamu=<?php echo $row['id_tamu']; ?>" title="Delete" onclick="return confirm('Yakin ingin menghapus data ?')"></a>
					</td>
					
				</tr>
				<?php $i++; } ?>

			</tbody>
			<script>
	$(document).ready(function(){
    $('#data').DataTable();
    });
</script>
		</table>
</div>

