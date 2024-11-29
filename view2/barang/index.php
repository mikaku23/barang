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
              </div>
              <div class="row pt-3">
                <div class="col">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Status</th>
                    <th>Nama</th>
                    <th>Jumlah</th>
                    <th>Warna</th>
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
                            <td>$data[status]</td>  
                            <td>$data[nama]</td>
                            <td>$data[jumlah]</td>
                            <td>$data[warna]</td>
                            <td>$data[spesifik_lain]</td>
                            <td><div class='btn-group'>
                              <a href='web2.php?title=barang_view&page=barang_detail&idbarang=$data[idbarang]' class='btn btn-outline-primary btn-sm'><i class='fas fa-eye'></i></a>
                             
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
      
                           