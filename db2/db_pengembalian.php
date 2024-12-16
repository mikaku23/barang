<?php
session_start();
$proses = $_GET['proses'];
include "../koneksi.php";

if ($proses == 'kembali') {
    // Ambil ID pengembalian terakhir
    $query = mysqli_query($koneksi, "SELECT MAX(idkembali) AS max_idkembali FROM pengembalian");
    $data = mysqli_fetch_assoc($query);
    $idkembali = $data['max_idkembali'] ? $data['max_idkembali'] + 1 : 1;

    // Validasi ID maksimum
    if ($idkembali > 999) {
        echo "ID sudah mencapai batas maksimum 999.";
        exit;
    }

    // Ambil data dari form
    $idp = $_POST['ID'];
    $nama = $_POST['NM'];
    $barang = $_POST['NB'];
    $idbarang = $_POST['NB'];
    $tanggal = $_POST['TP'];
    $jumlah = (int)$_POST['J']; // Pastikan ini angka
    $tanggal_kembali = date("Y-m-d");

    // Periksa status peminjaman sebelum melanjutkan
    $queryStatus = "SELECT status FROM peminjaman2 WHERE idpinjam = '$idp'";
    $resultStatus = mysqli_query($koneksi, $queryStatus);
    $dataStatus = mysqli_fetch_assoc($resultStatus);

    if ($dataStatus === 'dikembalikan') {
        // Jika barang sudah dikembalikan, tampilkan alert dan hentikan proses
        echo "<script>alert('Barang sudah dikembalikan.'); window.history.back();</script>";
        exit;
    }

    // Masukkan data ke tabel pengembalian
    $query1 = "INSERT INTO pengembalian 
               SET idkembali='$idkembali', idpinjam='$idp', nama_barang='$barang', nama_peminjam='$nama', jumlah='$jumlah', tanggal_pinjam='$tanggal', tanggal_kembali='$tanggal_kembali'";
    $insert = mysqli_query($koneksi, $query1);

    // Update status di tabel peminjaman
    $updateStatusQuery = "UPDATE peminjaman2 SET status = 'dikembalikan' WHERE idpinjam = '$idp'";
    mysqli_query($koneksi, $updateStatusQuery);

        $query="UPDATE barang SET status='baik' WHERE idbarang='$idbarang'";
    $update=mysqli_query($koneksi,$query);

    // Ambil data barang yang dipinjam untuk diperbarui
    $queryPeminjaman = "SELECT idbarang, jumlah FROM peminjaman2 WHERE idpinjam = '$idp'";
    $result = mysqli_query($koneksi, $queryPeminjaman);
    $dataPeminjaman = mysqli_fetch_assoc($result);

    if ($dataPeminjaman) {
        $idbarang = $dataPeminjaman['idbarang'];
        $jumlahDipinjam = $dataPeminjaman['jumlah'];

        // Tambahkan kembali jumlah barang di tabel barang
        $updateBarangQuery = "UPDATE barang SET jumlah = jumlah + $jumlahDipinjam WHERE idbarang = '$idbarang'";
        mysqli_query($koneksi, $updateBarangQuery);
    }
    
  header("location:../web2.php?page=peminjamann&title=peminjamann");
}

elseif($proses=='hapuskembali'){
        $idp = $_POST['ID'];
    $idkembali=$_GET['idkembali'];


    $updateStatusQuery = "UPDATE peminjaman2 SET status = 'dipinjam' WHERE idpinjam = '$idkembali'";
    mysqli_query($koneksi, $updateStatusQuery);


    $query="DELETE FROM pengembalian WHERE idkembali='$idkembali'";
    mysqli_query($koneksi,$query);

        $query="UPDATE barang SET status='dipinjam' WHERE idbarang='$idbarang'";
    $update=mysqli_query($koneksi,$query);

header("location:../web2.php?page=peminjaman&title=peminjaman");


}
        

?>
