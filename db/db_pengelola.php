<?php
include "../koneksi.php";
$aksi=$_GET['action'];

if($aksi=="create"){
    $query = mysqli_query($koneksi, "SELECT MAX(id) AS max_id FROM pengelola");
    $data = mysqli_fetch_assoc($query);
    $id = $data['max_id'] ? $data['max_id'] + 1 : 1;
    if ($id > 999) {
        echo "ID sudah mencapai batas maksimum 999.";
        exit;}

    $nama=$_POST['nama'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $nohp=$_POST['nohp'];
    $jenis=$_POST['jenis'];
    $status=$_POST['status'];
    
    $query="INSERT INTO pengelola SET id='$id',nama='$nama',username='$username',password='$password',nohp='$nohp', jenis='$jenis', status='$status'";
    $insert=mysqli_query($koneksi,$query);

}elseif($aksi=="edit"){
    $id=$_POST['id'];
    $nama=$_POST['nama'];
    $nohp=$_POST['nohp'];
    $username=$_POST['username'];
    $jenis=$_POST['jenis'];
    $status=$_POST['status'];
    // var_dump($nisn,$nama,$alamat);

    $query="UPDATE pengelola SET nama='$nama',nohp='$nohp',username='$username',jenis='$jenis', status='$status'
    WHERE id='$id'";

    $update=mysqli_query($koneksi,$query);
 

}elseif($aksi=='hapus'){
    $id=$_GET['id'];

    $query="DELETE FROM pengelola WHERE id='$id'";
    mysqli_query($koneksi,$query);
}
header("location:../index.php?title=pengelola&page=pengelola");

