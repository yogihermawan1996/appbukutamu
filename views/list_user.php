<?php  
error_reporting(0);
include_once("class/class.user.php");
$user = new User($db);
$stmt = $user->read();
?>

<head>
	<link href="assets/js/datatables.min.css" rel="stylesheet">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/bootstrap.datatable.css" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet">
    <script src="assets/js/datatables.min.js"></script>
</head>

<div class="content-utama">
	<center><h3><u><b>DATA USER</b></u></h3></center>
		<a href="?page=add_user" class="btn btn-primary fa fa-plus"> Add User</a> <br>
		<br><table class="table table-striped table-bordered" id="data">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Level</th>
					<th>Username</th>
					<th>Tools</th>
			</thead>
			<tbody>
			<?php
				$i=1;
				while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			?>
				<tr>
					<td align="center" width="1%"><?php echo $i; ?></td>
					<td><?php echo $row['nama']; ?></td>
					<td><?php echo $row['level']; ?></td>
					<td><?php echo $row['username']; ?></td>
					<td>
						<a class="btn btn-warning fa fa-edit" href="?page=update_user&id_user=<?php echo $row['id_user']; ?>" title="Edit"></a>
						<a class="btn btn-danger fa fa-trash" href="?page=delete_user&id_user=<?php echo $row['id_user']; ?>" title="Hapus" onclick="return confirm('Yakin ingin menghapus data ?')"></a>
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
