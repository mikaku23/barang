<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<style>
   .action-btns {
    display: flex;
    justify-content: center;
    gap: 8px; /* Jarak antar ikon */
  }

  .action-btns .btn {
    margin: 0; /* Hapus margin default */
  }
  </style>
<body>
  
<div class="card">
          <div class="card-header">
              <h3 class="card-title">Data peminjaman</h3>

              <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-minus"></i>
                  </button>

              </div>
          </div>
          <div class="card-body">
            <div class="row">
                  <div class="col">
                      <a href="index.php?page=peminjaman_create&title=peminjaman_create" class="btn btn-success btn-md"><i class="fas fa-plus"></i> Tambah Data</a>
                  </div>
              </div>
              <div class="row pt-3">
                <div class="col">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Status</th>
                    <th>Nama Peminjam</th>
                    <th>Id & Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Tanggal Catat</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>

                    <?php
                        include "koneksi.php";
                        $id=1;
                        $sql=mysqli_query($koneksi,"SELECT * FROM peminjaman2");
                        while($data=mysqli_fetch_array($sql)){
                            echo "
                            <tr>
                            <td>P0$id</td>
                            <td>$data[status]</td>
                            <td>$data[nama_peminjam]</td>
                            <td>$data[nama_barang]</td>
                            <td>$data[jumlah]</td>
                            <td>$data[tanggal_pinjam]</td>
                            <td><div class='action-btns'>
                              <a href='index.php?title=peminjaman_view&page=peminjaman_detail&idpinjam=$data[idpinjam]' class='btn btn-outline-primary btn-sm'><i class='fas fa-eye'></i></a>
                              <a href='index.php?title=peminjaman_edit&page=peminjaman_edit&idpinjam=$data[idpinjam]' class='btn btn-outline-warning btn-sm'><i class='fas fa-pencil-alt'></i></a>
                              <a href='db/db_peminjaman.php?proses=hapus&idpinjam=$data[idpinjam]' class='btn btn-outline-danger btn-sm'><i class='far fa-trash-alt'></i></a>
                              <a href='index.php?title=peminjaman_kembali&page=peminjaman_kembali& ide=$data[idpinjam]' class='btn btn-outline-info btn-sm'><i class='fas fa-exchange-alt'></i></a>
                        </div></td>
                          </tr>"; 
                          $id++;
                        }

                        ?>
            
                </tbody>
                </table>
                </div>
              </div>

          </div>
          <!-- /.card-body -->

      </div>
      
                           
</body>
</html>