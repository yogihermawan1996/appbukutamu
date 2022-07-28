<?php
include_once("class/class.unitkerja.php");
include_once("class/class.pegawai.php");
include_once("class/class.bukutamu.php");
?>

<head>
    <link href="assets/js/datatables.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <script src="assets/js/datatables.min.js"></script>
</head>
<div class="content-utama">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h2>
                            <h4>
                                <b><?php
                                $unitkerja = new UnitKerja($db);
                                $stmt = $unitkerja->countUnitkerja();
                            ?></b>
                            </h4>
                            </h2>
                            <p>Data Unit Kerja</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-folder"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h2>
                            <h4>
                                <b><?php
                                $pegawai = new Pegawai($db);
                                $stmt = $pegawai->countPegawai();
                            ?></b>
                            </h4>
                            </h2>
                            <p>Data Pegawai</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-man"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->
                
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h2>
                            <h4>
                                <b><?php
                                $selesai = new BukuTamu($db);
                                $stmt = $selesai->countTamuSelesai();
                            ?></b>
                            </h4>
                            </h2>
                            <p>Total Tamu (Selesai)</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-man"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->

                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h2>
                            <h4>
                                <b><?php
                                $belumselesai = new BukuTamu($db);
                                $stmt = $belumselesai->countTamuBelumSelesai();
                            ?></b>
                            </h4>
                            </h2>
                            <p>Total Tamu (Belum Selesai)</p>
                            
                        </div>
                        <div class="icon">
                            <i class="ion ion-man"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->
            </div><!-- /.row -->
             </section>
    </div>