<?php
        include "koneksi.php";
        $id = $_GET['idpinjam'];
        $query = "SELECT * FROM peminjaman2 WHERE idpinjam='$id'";
        $find_one = mysqli_query($koneksi, $query);
        $data1 = mysqli_fetch_assoc($find_one);

        ?>
      <!-- Default box -->
       

      <div class="card card-warning">
          <div class="card-header">
              <h3 class="card-title">Ubah Data Peminjaman <?=$data1['nama_peminjam'] ?></h3>
              </div>
          </div>
          <div class="card-body">

            <form action="db/db_peminjaman.php?proses=edit" method="post">
                <div class="form-group">
            <input type="hidden" value="<?=$data1['idpinjam'] ?>" id="idpinjam" name="id">
                  <label for="id">Id </label>
                  <input type="text" class="form-control"  value="<?= $data1['idpinjam'] ?>" disabled>
              </div>
              <div class="form-group">
                    <label for="nama_peminjam">Nama Peminjam</label>
                    <select class="form-control" id="nama_peminjam" name="nama_peminjam" disabled>
                        <option><?=$data1['nama_peminjam']?></option>
                    <?php
                    include "koneksi.php";
                    $query = mysqli_query($koneksi, "SELECT nama FROM user");
                    while ($data = mysqli_fetch_assoc($query)) {
                        echo "<option value='" . $data['nama'] . "'>" . $data['nama'] .  "</option>";
                    }
                    ?>
                </select>
                </div>
                <div class="form-group">
                    <label for="idbarang">Id dan Nama Barang</label>
                    <select class="form-control" id="idbarang" name="idbarang" required>
                         <option><?=$data1['nama_barang']?></option>
                        <?php
                        include "koneksi.php";
                        // Query untuk mengambil id dan nama barang
                        $query = mysqli_query($koneksi, "SELECT idbarang, nama FROM barang");
                        while ($data = mysqli_fetch_assoc($query)) {
                            // Gabungkan id dan nama dalam satu value
                            echo "<option value='" . $data['idbarang'] . "-" . $data['nama'] . "'>" . $data['idbarang'] . "-" . $data['nama'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                  <label for="jumlah">Jumlah</label>
                  <input type="text" class="form-control" id="jumlah" name="jumlah"  value="<?=$data1['jumlah'] ?>" disabled>
              </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer text-right">
            <a href='index.php?page=peminjaman&title=peminjaman'>
             <button type="button" class="btn btn-primary">
                <i class="fas fa-arrow-circle-left"></i> Kembali
             </button>
             </a>
              <button type="submit" class="btn btn-warning"><i class="fas fa-save"></i> Ubah</button>
          </div>
          </form>
      </div>
      <!-- /.card -->