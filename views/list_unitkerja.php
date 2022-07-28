<?php  
error_reporting(0);
include_once("class/class.unitkerja.php");
$unitkerja = new UnitKerja($db);
$stmt = $unitkerja->read();
?>

<head>
	<link href="assets/js/datatables.min.css" rel="stylesheet">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/bootstrap.datatable.css" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet">
    <script src="assets/js/datatables.min.js"></script>
</head>

<div class="content-utama">
	<center><h3><u><b>DATA UNIT KERJA</b></u></h3></center>
		<a href="?page=add_unitkerja" class="btn btn-primary fa fa-plus"> Add Unit Kerja</a> <br>
		<br><table class="table table-striped table-bordered" id="data">
			<thead>
				<tr>
					<th>No</th>
					<th>Unit Kerja</th>
					<th>Tools</th>
			</thead>
			<tbody>
			<?php
				$i=1;
				while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			?>
				<tr>
					<td align="center" width="1%"><?php echo $i; ?></td>
					<td><?php echo $row['unit_kerja']; ?></td>
					<td>
						<a class="btn btn-warning fa fa-edit" href="?page=update_unitkerja&id_unitkerja=<?php echo $row['id_unitkerja']; ?>" title="Edit"></a>
						<a class="btn btn-danger fa fa-trash" href="?page=delete_unitkerja&id_unitkerja=<?php echo $row['id_unitkerja']; ?>" title="Hapus" onclick="return confirm('Yakin ingin menghapus data ?')"></a>
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
