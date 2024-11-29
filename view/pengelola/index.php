    <!-- Default box -->
      <div class="card">
          <div class="card-header">
              <h3 class="card-title">Data pengelola</h3>

              <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-minus"></i>
                  </button>

              </div>
          </div>
          <div class="card-body">
              <div class="row">
                  <div class="col">
                      <a href="index.php?page=pengelola_create&title=pengelola_create" class="btn btn-success btn-md"><i class="fas fa-plus"></i> Tambah Data</a>
                  </div>
              </div>
              <div class="row pt-3">
                <div class="col">
                    <?php
                            include "koneksi.php";
                            $query="SELECT id,nama,username,jenis,status FROM pengelola order by id";
                            $hasil=mysqli_query($koneksi,$query);
                            
                    ?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>id</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Jenis Kelamin</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $id=1;
                    while($data=mysqli_fetch_assoc($hasil)){
                        echo "<tr>
                            <td>P0$id</td>
                            <td>".$data['nama']."</td>
                            <td>".$data['username']."</td>
                            <td>".$data['jenis']."</td>
                            <td>".$data['status']."</td>
                            <td>
                                    <a href='index.php?title=pengelola_view&page=pengelola_detail&id=$data[id]' class='btn btn-outline-primary btn-sm'><i class='fas fa-eye'></i></a>

                                     <a href='index.php?title=pengelola_edit&page=pengelola_edit&id=$data[id]' class='btn btn-outline-warning btn-sm'><i class='fas fa-pencil-alt'></i></a>
                                     
                                     <a href='db/db_pengelola.php?action=hapus&id=$data[id]' class='btn btn-outline-danger btn-sm'><i class='far fa-trash-alt'></i></a>
                            </td>
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
      <!-- /.card -->