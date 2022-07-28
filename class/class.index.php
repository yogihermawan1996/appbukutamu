<?php
error_reporting(0);
class Index {
public function views(){
	
include("class/class.koneksi.php");
session_start();
if(!isset($_SESSION)){
	echo "<script>location.href='index.php'</script>";
}
$config = new koneksi();
$db = $config->doKoneksi();

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Buku Tamu</title>
<link rel='icon' type='image/png' href='assets/images/logo.png'>
<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="assets/css/ionicons.min.css" rel="stylesheet" type="text/css">
<link href="assets/css/admin-lte.min.css" rel="stylesheet" type="text/css">
<link href="assets/css/admin-skin.min.css" rel="stylesheet" type="text/css">
<link href="assets/css/admin.css" rel="stylesheet" type="text/css">
<script>
    // inisialisasi kesiapan dokumen
    $(function(){
        // semua table yang mengandung id = data, akan berubah jadi super seiya
        $('table#data').DataTable();
    });
    </script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <header class="main-header">
        <a href="#" class="logo">
            <span class="logo-mini">TAMU</span>
            <span class="logo-lg"><b>BUKU TAMU</b></span>
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
        </nav>
    </header>

    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <section class="sidebar">
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="assets/images/user.png" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    
                    <br><i class="fa fa-circle text-success"></i>
                     <?php echo $_SESSION['level']; ?>
                </div>
            </div>

            <ul class="sidebar-menu">
            <?php if($_SESSION['level'] == 'Administrator' || $_SESSION['level'] == 'Users'){ ?>
                <li class="header">MENU UTAMA</li>
                <li class="active treeview">
                    <a href="?page=dashboard">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>                   
                </li>
            <?php } ?>
            <?php if($_SESSION['level'] == 'Administrator'){ ?>
              
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-folder"></i> <span>Master Data</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>                    
                    <ul class="treeview-menu">
                         <li class="active"><a href="?page=list_user"><i class="fa fa-user"></i>Data User</a></li>
                        <li class="active"><a href="?page=list_unitkerja"><i class="fa fa-building-o"></i>Unit Kerja</a></li>
                        <li class="active"><a href="?page=list_pegawai"><i class="fa fa-users"></i>Pegawai</a></li>
                    </ul>
                </li>
            
                <li class="active treeview">
                    <a href="?page=list_bukutamu">
                        <i class="fa fa-book"></i> <span>Buku Tamu</span>
                    </a>                   
                </li>
                  <?php }?>
              
                <?php if($_SESSION['level'] == 'Administrator' || $_SESSION['level'] == 'Users'){ ?>

                 <li class="active treeview">
                    <a href="?page=report_bukutamu">
                        <i class="fa fa-print"></i> <span>Laporan Tamu</span>
                    </a>                   
                </li>
              <?php }?>
                <?php if($_SESSION['level'] == 'Administrator' || $_SESSION['level'] == 'Users'){ ?>
				<li class="active treeview">
                    <a href="?page=logout">
                        <i class="fa fa-sign-out"></i> <span>Logout</span>
                    </a>                   
                </li>
                	<?php }?>
            </ul>
        </section>
    </aside>
    <!-- Left side column. contains the logo and sidebar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
                    <div class="content-utama">
                       <?php
					// jika tidak di menu apapun
                       if(!isset($_GET['page'])){
                            // include dashboard
                            include "views/dashboard.php";
                        // jika sedang di menu
                        }else{
						// jika file yang diperlukan ada
						if(file_exists("views/$_GET[page].php"))
							// include halaman yang dperlukan
							include "views/$_GET[page].php";
						else
							// jika tidak ada, maka include dashboard
							include "views/dashboard.php";
                    }
					?>
                    </div>
    </div>

   

</div><!-- ./wrapper -->

<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/js/app.min.js" type="text/javascript"></script>
</body>
</html>
<?php
}
}
?>

