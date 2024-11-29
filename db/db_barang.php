<?php
include "../koneksi.php";
$aksi=$_GET['proses'];

if($aksi=="insert"){
    $query = mysqli_query($koneksi, "SELECT MAX(idbarang) AS max_idbarang FROM barang");
    $data = mysqli_fetch_assoc($query);
    $id = $data['max_idbarang'] ? $data['max_idbarang'] + 1 : 1;
    if ($id > 999) {
        echo "ID sudah mencapai batas maksimum 999.";
        exit;}

    $nama=$_POST['nama'];
    $jumlah=$_POST['jumlah'];
    $warna=$_POST['warna'];
    $spesifik_lain=$_POST['spesifik_lain'];

    $query="INSERT INTO barang SET idbarang='$id',nama='$nama',jumlah='$jumlah',warna='$warna',status = 'ada ' ,spesifik_lain='$spesifik_lain'";
    $insert=mysqli_query($koneksi,$query);

}elseif($aksi=="edit"){
    $id=$_POST['idbarang'];
    $nama=$_POST['nama'];
    $jumlah=$_POST['jumlah'];
    $warna=$_POST['warna'];
    $status=$_POST['status'];
    $spesifik_lain=$_POST['spesifik_lain'];

    // var_dump($nisn,$nama,$alamat);

    $query="UPDATE barang SET nama='$nama',jumlah='$jumlah',warna='$warna', status='$status', spesifik_lain='$spesifik_lain'
    WHERE idbarang='$id'";

    $update=mysqli_query($koneksi,$query);
 

}elseif($aksi=='hapus'){
    $id=$_GET['idbarang'];

     $query = "DELETE FROM barang WHERE idbarang='$id'";
    mysqli_query($koneksi, $query);


}
elseif($aksi=='rusak'){
    $id=$_GET['idbarang'];

    $query="UPDATE barang SET status='rusak'
    WHERE idbarang='$id'";

    $update=mysqli_query($koneksi,$query);


}

header("location:../index.php?title=barang&page=barang");

