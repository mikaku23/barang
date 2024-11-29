<?php
// Memulai sesi PHP

// Memanggil koneksi dari file koneksi.php
include 'koneksi.php';

function countTotalUsers($koneksi) {
    // Query untuk menghitung jumlah data di tabel user
    $sql = "SELECT COUNT(*) AS total FROM user";
    $result = $koneksi->query($sql);

    if ($result->num_rows > 0) {
        // Mengambil hasil
        $row = $result->fetch_assoc();
        return $row['total'];
    } else {
        return 0;
    }
}

// Mendapatkan jumlah total user
$totalUsers = countTotalUsers($koneksi);

// Menyimpan hasil ke dalam session
$_SESSION['total_users'] = $totalUsers;


function countTotalPengelola($koneksi) {
    // Query untuk menghitung jumlah data di tabel user
    $sql = "SELECT COUNT(*) AS total FROM pengelola";
    $result = $koneksi->query($sql);

    if ($result->num_rows > 0) {
        // Mengambil hasil
        $row = $result->fetch_assoc();
        return $row['total'];
    } else {
        return 0;
    }
}

// Mendapatkan jumlah total user
$totalPengelola = countTotalPengelola($koneksi);
$_SESSION['total_pengelola'] = $totalPengelola;

function countTotalbarang($koneksi) {
    // Query untuk menghitung jumlah data di tabel user
    $sql = "SELECT COUNT(*) AS total FROM barang";
    $result = $koneksi->query($sql);

    if ($result->num_rows > 0) {
        // Mengambil hasil
        $row = $result->fetch_assoc();
        return $row['total'];
    } else {
        return 0;
    }
}

// Mendapatkan jumlah total user
$totalbarang = countTotalbarang($koneksi);
$_SESSION['total_barang'] = $totalbarang;


function countTotalpeminjaman2($koneksi) {
    // Query untuk menghitung jumlah data di tabel user
    $sql = "SELECT COUNT(*) AS total FROM peminjaman2";
    $result = $koneksi->query($sql);

    if ($result->num_rows > 0) {
        // Mengambil hasil
        $row = $result->fetch_assoc();
        return $row['total'];
    } else {
        return 0;
    }
}

// Mendapatkan jumlah total user
$totalpeminjaman2 = countTotalpeminjaman2($koneksi);
$_SESSION['total_peminjaman2'] = $totalpeminjaman2;

function countTotalpengembalian($koneksi) {
    // Query untuk menghitung jumlah data di tabel user
    $sql = "SELECT COUNT(*) AS total FROM pengembalian";
    $result = $koneksi->query($sql);

    if ($result->num_rows > 0) {
        // Mengambil hasil
        $row = $result->fetch_assoc();
        return $row['total'];
    } else {
        return 0;
    }
}

// Mendapatkan jumlah total user
$totalpengembalian = countTotalpengembalian($koneksi);
$_SESSION['total_pengembalian'] = $totalpengembalian;

function countTotalRusak($koneksi) {
    // Query untuk menghitung jumlah barang dengan status 'rusak'
    $sql = "SELECT COUNT(*) AS total FROM barang WHERE status = 'rusak'";
    $result = $koneksi->query($sql);

    if ($result->num_rows > 0) {
        // Mengambil hasil
        $row = $result->fetch_assoc();
        return $row['total'];
    } else {
        return 0;
    }
}

// Mendapatkan jumlah total barang rusak
$totalrusak = countTotalRusak($koneksi);
$_SESSION['total_rusak'] = $totalrusak;


function countTotalbagus($koneksi) {
    // Query untuk menghitung jumlah barang dengan status 'bagus'
    $sql = "SELECT COUNT(*) AS total FROM barang WHERE status = 'ada'";
    $result = $koneksi->query($sql);

    if ($result->num_rows > 0) {
        // Mengambil hasil
        $row = $result->fetch_assoc();
        return $row['total'];
    } else {
        return 0;
    }
}

// Mendapatkan jumlah total barang bagus
$totalbagus = countTotalbagus($koneksi);
$_SESSION['total_bagus'] = $totalbagus;

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body>
  
<section class="content">
      <div class="container-fluid pt-2">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3 col-pt-2">
            <div class="info-box">
              <span class="info-box-icon bg-teal elevation-1"><i class="fas fa-users"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">User</span>
                <span class="info-box-number">
                <?=$_SESSION['total_users'] ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-user-cog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Pengelola</span>
                <span class="info-box-number"><?=$_SESSION['total_pengelola'] ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-gray elevation-1"><i class="fas fa-boxes"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Barang</span>
                <span class="info-box-number"><?=$_SESSION['total_barang'] ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-lightblue elevation-1"><i class="fas fa-box-open"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Peminjaman</span>
                <span class="info-box-number"><?=$_SESSION['total_peminjaman2'] ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
         
 <div class="row justify-content-end">
          <div class="col-12 col-sm-6 col-md-3 text-end">
            <div class="info-box">
              <span class="info-box-icon bg-navy elevation-1"><i class="fas fa-exchange-alt"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Pengembalian</span>
                <span class="info-box-number">
                <?=$_SESSION['total_pengembalian'] ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
</div>
  <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Monthly Recap Report</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <div class="btn-group">
                    
                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                      
                    </div>
                  </div>
                  
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <p class="text-center">
                      <strong>Range: 1 Nov - 1 Des 2024</strong>
                    </p>

                    <div class="chart">
                      <!-- Sales Chart Canvas -->
                      <canvas id="salesChart" height="180" style="height: 180px;"></canvas>
                    </div>
                    <!-- /.chart-responsive -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                    <p class="text-center">
                      <strong>Data Peminjaman Sebulan Terakhir</strong>
                    </p>

                    <div class="progress-group">
                      User
                      <span class="float-right"><b><?=$_SESSION['total_users'] ?> % </b>/100%</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-olive" style="width:<?= ($_SESSION['total_users'] / 100) * 100 ?>%"></div>
                      </div>
                    </div>

                    <div class="progress-group">
                      Barang
                      <span class="float-right"><b><?=$_SESSION['total_barang'] ?>%</b>/100%</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-gray" style="width:<?= ($_SESSION['total_barang'] / 100) * 100 ?>%"></div>
                      </div>
                    </div>

                    <div class="progress-group">
                      Peminjaman
                      <span class="float-right"><b><?=$_SESSION['total_peminjaman2']  ?>%</b>/100%</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-lightblue" style="width:<?= ($_SESSION['total_peminjaman2'] / 100) * 100 ?>%"></div>
                      </div>
                    </div>

                    <div class="progress-group">
                      Pengembalian
                      <span class="float-right"><b><?=$_SESSION['total_pengembalian'] ?>%</b>/100%</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-navy" style="width:<?= ($_SESSION['total_pengembalian'] / 100) * 100 ?>%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->

                  
                    <!-- /.progress-group -->
                  </div>
                  <!-- /.col -->
                </div>
                
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> <?= ($_SESSION['total_bagus'] / 100) * 100 ?>%</span>
                      <h5 class="description-header"><?=$_SESSION['total_bagus'] ?></h5>
                      <span class="description-text">TOTAL BARANG </br> YANG TERSEDIA</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> <?= ($_SESSION['total_peminjaman2'] / 100) * 100 ?>%</span>
                      <h5 class="description-header"><?=$_SESSION['total_peminjaman2'] ?></h5>
                      <span class="description-text">TOTAL BARANG <br>YANG DIPINJAM</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> <?= ($_SESSION['total_pengembalian'] / 100) * 100 ?>%</span>
                      <h5 class="description-header"><?=$_SESSION['total_pengembalian'] ?></h5>
                      <span class="description-text">TOTAL BARANG <br> YANG DIKEMBALIKAN</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block">
                      <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> <?= ($_SESSION['total_rusak'] / 100) * 100 ?>%</span>
                      <h5 class="description-header"><?=$_SESSION['total_rusak'] ?></h5>
                      <span class="description-text">TOTAL BARANG <br> RUSAK</span>
                    </div>
                    <!-- /.description-block -->
                  </div>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/chart.js/Chart.min.js"></script>
<script src="dist/js/pages/dashboard2.js"></script>
</body>
</html>

