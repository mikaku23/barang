<?php
session_start();
include "../koneksi.php";

// Ambil username dan password dari input form
$username = $_POST['username'];
$password = $_POST['password'];

// Cek di tabel user
$sqluser = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
$jumlahuser = mysqli_num_rows($sqluser);
$datauser = mysqli_fetch_array($sqluser);


if ($jumlahuser === 1) {
    // Jika ditemukan di tabel user
    $_SESSION['username'] = $datauser['username'];
    $_SESSION['nama'] = $datauser['nama'];
    $_SESSION['status'] = $datauser['status'];
    $_SESSION['id'] = $datauser['id'];
    $_SESSION['status_login1'] = true;
    $_SESSION['waktu'] = time();

    // Redirect ke halaman user
    header("location:../web2.php");
    exit;
}

// Jika tidak ditemukan di tabel user, cek di tabel pengelola
$sqlpengelola = mysqli_query($koneksi, "SELECT * FROM pengelola WHERE username='$username' AND password='$password'");
$jumlahpengelola = mysqli_num_rows($sqlpengelola);
$datapengelola = mysqli_fetch_array($sqlpengelola);

if ($jumlahpengelola === 1) {
    // Jika ditemukan di tabel pengelola
    $_SESSION['username'] = $datapengelola['username'];
    $_SESSION['nama'] = $datapengelola['nama'];
    $_SESSION['status'] = $datapengelola['status'];
    $_SESSION['id'] = $datapengelola['id'];
    $_SESSION['status_login2'] = true;
    $_SESSION['waktu'] = time();

    // Redirect ke halaman pengelola
    header("location:../index.php");
    exit;
}

// Jika tidak ditemukan di kedua tabel
echo "<script type='text/javascript'>
    alert('Username atau Password Salah');
    window.location='../view/login.php';
    </script>";
?>
