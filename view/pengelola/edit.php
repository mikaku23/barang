<?php
        include "koneksi.php";
        $id = $_GET['id'];
        $query = "SELECT * FROM pengelola WHERE id='$id'";
        $find_one = mysqli_query($koneksi, $query);
        $data = mysqli_fetch_assoc($find_one);

        ?>
      <!-- Default box -->

      <div class="card card-warning">
          <div class="card-header">
              <h3 class="card-title">Ubah Data <?=$data['nama'] ?></h3>
              </div>
          </div>
          <div class="card-body">

            <form action="db/db_pengelola.php?action=edit" method="post">
                <div class="form-group">
            <input type="hidden" value="<?=$data['id'] ?>" id="id" name="id">
                  <label for="id">Id </label>
                  <input type="text" class="form-control"  value="<?= $data['id'] ?>" disabled>
              </div>
              <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['nama'] ?>" >
              </div>
                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" id="username" name="username" value="<?= $data['username'] ?>" >
              </div>
                <div class="form-group">
                  <label for="nohp">No Hp</label>
                  <input type="text" class="form-control" id="nohp" name="nohp" value="<?=$data['nohp'] ?>">
              </div>
              <div class="form-group">
                  <label for="jenis">Jenis Kelamin</label>
                    <select name="jenis" id="jenis" class="form-control" value="<?= $data['jenis'] ?>">
                      
                        <option value="laki-laki">Laki-Laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
              </div>
                <div class="form-group">
                  <label for="status">Status</label>
                    <select name="status" id="status" class="form-control" value="<?= $data['status'] ?>">
                      
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
              <button type="submit" class="btn btn-warning"><i class="fas fa-save"></i> Ubah</button>
          </div>
          </form>
      </div>
      <!-- /.card -->