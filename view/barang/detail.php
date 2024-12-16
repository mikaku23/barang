 <?php
      include "koneksi.php";
      $id=$_GET['idbarang'];
      $query="SELECT * FROM barang WHERE idbarang='$id'";
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
                  <input type="text" class="form-control" id="id" name="id"  disabled value="<?=$data['idbarang'] ?>">
              </div>
              <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" class="form-control" id="nama" name="nama" disabled value="<?=$data['nama'] ?>">
              </div>
              <div class="form-group">
                  <label for="jumlah">Jumlah</label>
                  <input type="text" class="form-control" id="jumlah" name="jumlah" disabled value="<?=$data['jumlah'] ?>">
              </div>
              <div class="form-group">
                  <label for="warna">Warna</label>
                  <input type="text" class="form-control" id="warna" name="warna" disabled value="<?=$data['warna'] ?>">
              </div>
              <div class="form-group">
                  <label for="status">Kondisi Barang</label>
                  <input type="text" class="form-control" id="status" name="status" disabled value="<?=$data['status'] ?>">
              </div>
              <div class="form-group">
                  <label for="spesifik_lain">Spesifikasi Lain</label>
                  <input type="text" class="form-control" id="spesifik_lain" name="spesifik_lain" disabled value="<?=$data['spesifik_lain'] ?>">
              </div>

          </div>
          <!-- /.card-body -->

         <div class="card-footer text-right">
            <a href='index.php?page=barang&title=barang'>
             <button type="submit" class="btn btn-primary">
                <i class="fas fa-arrow-circle-left"></i> Kembali
             </button>
             </a>
 
        </div>
      </div>
      <!-- /.card -->