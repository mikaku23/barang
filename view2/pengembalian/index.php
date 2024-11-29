<?php
$nama_session = $_SESSION['nama']; // Ambil ID dari session
?>
<div class="card">
          <div class="card-header">
              <h3 class="card-title">Data Pengembalian</h3>

              <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-minus"></i>
                  </button>

              </div>
          </div>
          <div class="card-body">
              <div class="row pt-3">
                <div class="col">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Nama Peminjam</th>
                    <th>Id & Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Tanggal Catat</th>
                    <th>Tanggal Kembali</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>

                    <?php
                        include "koneksi.php";
                        $id=1;
                        $sql=mysqli_query($koneksi,"SELECT * FROM pengembalian WHERE nama_peminjam = '$nama_session'");
                        while($data=mysqli_fetch_array($sql)){
                            echo "
                            <tr>
                            <td>P0$id</td>
                            <td>$data[nama_peminjam]</td>
                            <td>$data[nama_barang]</td>
                            <td>$data[jumlah]</td>
                            <td>$data[tanggal_pinjam]</td>
                            <td>$data[tanggal_kembali]</td>
                            <td><div class='btn-group'>
                              <a href='web2.php?title=pengembalian_view&page=pengembalian_detail&idkembali=$data[idkembali]' class='btn btn-outline-primary btn-sm'><i class='fas fa-eye'></i></a>
                             
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
      
                           