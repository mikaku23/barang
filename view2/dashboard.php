<?php
// Memulai sesi PHP

// Memanggil koneksi dari file koneksi.php
include 'koneksi.php';

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

function countTotalpinjam($koneksi) {
    // Query untuk menghitung jumlah barang dengan status 'pinjam'
    $sql = "SELECT COUNT(*) AS total FROM barang WHERE status = 'pinjam'";
    $result = $koneksi->query($sql);

    if ($result->num_rows > 0) {
        // Mengambil hasil
        $row = $result->fetch_assoc();
        return $row['total'];
    } else {
        return 0;
    }
}

// Mendapatkan jumlah total barang pinjam
$totalpinjam = countTotalpinjam($koneksi);
$_SESSION['total_pinjam'] = $totalpinjam;



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
      
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-navy elevation-1"><i class="fas fa-exchange-alt"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">pengembalian</span>
                <span class="info-box-number"><?=$_SESSION['total_pengembalian'] ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
</div>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/chart.js/Chart.min.js"></script>
<script src="dist/js/pages/dashboard2.js"></script>
</body>
</html>

