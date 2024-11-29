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
              <h3 class="card-title">Data Barang</h3>

              <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-minus"></i>
                  </button>

              </div>
          </div>
          <div class="card-body">
            <div class="row">
                  <div class="col">
                      <a href="index.php?page=barang_create&title=barang_create" class="btn btn-success btn-md"><i class="fas fa-plus"></i> Tambah Data</a>
                  </div>
              </div>
              <div class="row pt-3">
                <div class="col">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Nama</th>
                    <th>Jumlah</th>
                    <th>Warna</th>
                    <th>Status</th>
                    <th>Spesifikasi lain</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>

                    <?php
                        include "koneksi.php";
                        $id=1;
                        $sql=mysqli_query($koneksi,"SELECT * FROM barang");
                        while($data=mysqli_fetch_array($sql)){
                            echo "
                            <tr>
                            <td>NB0$id</td>
                            <td>$data[nama]</td>
                            <td>$data[jumlah]</td>
                            <td>$data[warna]</td>
                            <td>$data[status]</td>
                            <td>$data[spesifik_lain]</td>
                            <td><div class='action-btns '>
                              <a href='index.php?title=barang_view&page=barang_detail&idbarang=$data[idbarang]' class='btn btn-outline-primary btn-sm'><i class='fas fa-eye'></i></a>
                              <a href='index.php?title=barang_edit&page=barang_edit&idbarang=$data[idbarang]' class='btn btn-outline-warning btn-sm'><i class='fas fa-pencil-alt'></i></a>
                              <a href='db/db_barang.php?proses=rusak&idbarang=$data[idbarang]' class='btn btn-outline-danger btn-sm'><i class='fas fa-bolt'></i></a>
                              <a href='db/db_barang.php?proses=hapus&idbarang=$data[idbarang]' class='btn btn-outline-danger btn-sm'><i class='far fa-trash-alt'></i></a>
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