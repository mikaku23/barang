 <?php
      include "koneksi.php";
      $id=$_GET['idpinjam'];
      $query="SELECT * FROM peminjaman2 WHERE idpinjam='$id'";
      $find_one=mysqli_query($koneksi,$query);
      $data=mysqli_fetch_assoc($find_one);

      ?>


      <!-- Default box -->
      <div class="card card-primary">
          <div class="card-header">
              <h3 class="card-title">Data Peminjaman <?=$data['nama_peminjam'] ?></h3>

              <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-minus"></i>
                  </button>

              </div>
          </div>
          <div class="card-body">
              <div class="form-group">
                  <label for="id">Id</label>
                  <input type="text" class="form-control" id="id" name="id" disabled value="<?=$data['idpinjam'] ?>">
              </div>
              <div class="form-group">
                  <label for="nama_peminjam">Nama Peminjam</label>
                  <input type="text" class="form-control" id="nama_peminjam" name="nama_peminjam" disabled value="<?=$data['nama_peminjam'] ?>">
              </div>
              <div class="form-group">
                  <label for="status">Status</label>
                  <input type="text" class="form-control" id="status" name="status" disabled value="<?=$data['status'] ?>">
              </div>
                <div class="form-group">
                  <label for="nama_barang">Nama Barang</label>
                  <input type="text" class="form-control" id="nama_barang" name="nama_barang" disabled value="<?=$data['nama_barang'] ?>">
              </div>
                <div class="form-group">
                  <label for="jumlah">Jumlah</label>
                  <input type="text" class="form-control" id="jumlah" name="jumlah" disabled value="<?=$data['jumlah'] ?>">
              </div>
                <div class="form-group">
                  <label for="tanggal_pinjam">Tanggal Pinjam</label>
                  <input type="text" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" disabled value="<?=$data['tanggal_pinjam'] ?>">
              </div>



          </div>
          <!-- /.card-body -->

         <div class="card-footer text-right">
            <a href='web2.php?page=peminjaman&title=peminjaman'>
             <button type="button" class="btn btn-primary">
                <i class="fas fa-arrow-circle-left"></i> Kembali
             </button>
             </a>
 
        </div>
      </div>
      <!-- /.card -->