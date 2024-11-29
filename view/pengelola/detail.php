 <?php
      include "koneksi.php";
      $id=$_GET['id'];
      $query="SELECT * FROM pengelola WHERE id='$id'";
      $find_one=mysqli_query($koneksi,$query);
      $data=mysqli_fetch_assoc($find_one);

      ?>


      <!-- Default box -->
      <div class="card card-primary">
          <div class="card-header">
              <h3 class="card-title">Data <?=$data['nama'] ?></h3>

              <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-minus"></i>
                  </button>

              </div>
          </div>
          <div class="card-body">
              <div class="form-group">
                  <label for="id">Id</label>
                  <input type="text" class="form-control" id="id" name="id" disabled value="<?=$data['id'] ?>">
              </div>
              <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" class="form-control" id="nama" name="nama" disabled value="<?=$data['nama'] ?>">
              </div>
                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" id="username" name="username" disabled value="<?=$data['username'] ?>">
              </div>
                <div class="form-group">
                  <label for="nohp">No Hp</label>
                  <input type="text" class="form-control" id="nohp" name="nohp" disabled value="<?=$data['nohp'] ?>">
              </div>
              <div class="form-group">
                  <label for="jenis">Jenis Kelamin</label>
                    <select name="jenis" id="jenis" class="form-control" disabled value="<?=$data['jenis'] ?>">
                      <option disabled selected><?= $data['jenis'] ?></option>
                        <option value="laki-laki">Laki-Laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
              </div>
                <div class="form-group">
                  <label for="status">Status</label>
                    <select name="status" id="status" class="form-control" disabled value="<?=$data['status'] ?>">
                      <option disabled selected><?= $data['status'] ?></option>
                        <option value="guru">Guru</option>
                        <option value="admin">Admin</option>
                    </select>
              </div>


          </div>
          <!-- /.card-body -->

         <div class="card-footer text-right">
            <a href='index.php?page=pengelola&title=pengelola'>
             <button type="button" class="btn btn-primary">
                <i class="fas fa-arrow-circle-left"></i> Kembali
             </button>
             </a>
 
        </div>
      </div>
      <!-- /.card -->