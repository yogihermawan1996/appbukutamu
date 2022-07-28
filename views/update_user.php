<?php
error_reporting(0);
$id_user = isset($_GET['id_user']) ? $_GET['id_user'] : die('ERROR: missing ID.');
include_once("class/class.user.php");
$eks = new User($db);

$eks->id_user = $id_user;

$eks->readOne();

if($_POST){
	$eks->nama = $_POST['nama'];
	$eks->level = $_POST['level'];
	$eks->username = $_POST['username'];
    $eks->password = md5($_POST['password']);
    
   if($eks->update()){
		echo '<script>alert("Data Berhasil Diedit!");
			document.location="?page=list_user&success=true"; </script>';
	}
}
?>

<head>
    <link rel="stylesheet" href="assets/select2/select2.min.css"/>
  	<script src="assets/select2/jquery-2.1.4.min.js"></script>
    <script src="assets/select2/select2.min.js"></script>
</head>

<h3><b>Update Data User</b></h3>
<div class="content-utama">
	<div>
				<form class="well" method="POST" action="#" id="input">
						<div class="form-group">
							<label>Nama</label>
							<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $eks->nama; ?>" placeholder="Nama User">
						</div>
						<div class="form-group">
							<label>Level</label>
							<select id="level" name="level" class="form-control" required>
								<option>--Pilih--</option>
								<option value="Administrator">Administrator</option>
								<option value="Users">Users</option>
							</select>
							<script type="text/javascript">
								$(document).ready(function () {
									$("#level").select2({
									placeholder: "Pilih Level"
									});
							});
							</script>
						</div>
						<div class="form-group">
							<label>Username</label>
							<input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo $eks->username; ?>"  required>
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" class="form-control" id="password" name="password" value="<?php echo $eks->password; ?>" placeholder="Password" required>
						</div>
							<input type="submit" name="simpan" class="btn btn-success" value="UPDATE">
							<input type="button" onclick="document.location='?page=list_user'" name="kembali" value="BACK" class="btn btn-primary">
					</form>    
				</div>
			</div>
			