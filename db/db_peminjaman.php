<?php
session_start();
$proses = $_GET['proses'];
include "../koneksi.php";


if($proses == "create"){
        $query = mysqli_query($koneksi, "SELECT MAX(idpinjam) AS max_idpinjam FROM peminjaman2");
    $data = mysqli_fetch_assoc($query);
    $id = $data['max_idpinjam'] ? $data['max_idpinjam'] + 1 : 1;
    if ($id > 999) {
        echo "ID sudah mencapai batas maksimum 999.";
        exit;}

      $nama_peminjam = $_SESSION['nama'];
    $status = 'dipinjam';
    $nama_barang = $_POST['idbarang'];
    $idbarang = $_POST['idbarang'];
    $jumlah = (int)$_POST['jumlah']; // Jumlah yang ingin dipinjam
    $tanggal_pinjam = date("Y-m-d");

    // Ambil jumlah barang saat ini
    $queryBarang = "SELECT jumlah FROM barang WHERE idbarang = '$idbarang'";
    $resultBarang = mysqli_query($koneksi, $queryBarang);
    $dataBarang = mysqli_fetch_assoc($resultBarang);

    if ($dataBarang['jumlah'] < $jumlah) {
        // Jika barang yang ingin dipinjam lebih banyak dari stok yang tersedia
        echo "<script>alert('Barang tidak cukup. Stok tersisa hanya {$dataBarang['jumlah']} barang.'); window.history.back();</script>";
        exit;
    }

    $query="INSERT INTO peminjaman2 SET idpinjam='$id',nama_peminjam='$nama_peminjam',status='$status', idbarang='$idbarang',jumlah='$jumlah', nama_barang='$nama_barang', tanggal_pinjam='$tanggal_pinjam' ";
    mysqli_query($koneksi,$query);

    $updateBarangQuery = "UPDATE barang SET jumlah = jumlah - $jumlah WHERE idbarang = '$idbarang'";
    mysqli_query($koneksi, $updateBarangQuery);

        $query="UPDATE barang SET status='dipinjam'
    WHERE idbarang='$idbarang'";
    $update=mysqli_query($koneksi,$query);
}
elseif ($proses == "edit") {
    $id=$_POST['id'];
    $status=$_SESSION['status'];
    $nama_peminjam=$_SESSION['nama'];
    $idbarang=$_POST['idbarang'];
    $nama_barang=$_POST['idbarang'];
    $tanggal_pinjam=date("Y-m-d");


    mysqli_query($koneksi, "UPDATE peminjaman2 SET nama_peminjam='$nama_peminjam',status='$status', idbarang='$idbarang', nama_barang='$nama_barang', tanggal_pinjam='$tanggal_pinjam'
    WHERE idpinjam='$id'");
}

elseif ($proses == 'hapus') {
    $id = $_GET['idpinjam'];

    // Ambil data peminjaman yang akan dihapus
    $queryPeminjaman = "SELECT idbarang, jumlah FROM peminjaman2 WHERE idpinjam = '$id'";
    $result = mysqli_query($koneksi, $queryPeminjaman);
    $dataPeminjaman = mysqli_fetch_assoc($result);

    if ($dataPeminjaman) {
        $idbarang = $dataPeminjaman['idbarang'];
        $jumlahDipinjam = $dataPeminjaman['jumlah'];

        // Tambahkan kembali jumlah barang di tabel barang
            $query="UPDATE barang SET status='baik' WHERE idbarang='$idbarang'";
    $update=mysqli_query($koneksi,$query);
    
        $updateBarangQuery = "UPDATE barang SET jumlah = jumlah + $jumlahDipinjam WHERE idbarang = '$idbarang'";
        mysqli_query($koneksi, $updateBarangQuery);
    }

    // Hapus data peminjaman
    $query = "DELETE FROM peminjaman2 WHERE idpinjam = '$id'";
    mysqli_query($koneksi, $query);}

header("location:../index.php?page=peminjaman&title=peminjaman");

?>
