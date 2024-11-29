 <?php
      include "koneksi.php";
      $id=$_GET['ide'];
      $query="SELECT * FROM peminjaman2 WHERE idpinjam='$id'";
      $find_one=mysqli_query($koneksi,$query);
      $data=mysqli_fetch_assoc($find_one);

      ?>


      <!-- Default box -->
      <div class="card card-info">
          <div class="card-header">
              <h3 class="card-title">Data Peminjaman <?=$data['nama_peminjam'] ?> </h3>

              <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-minus"></i>
                  </button>

              </div>
          </div>
          <div class="card-body">
                        <form action="db/db_pengembalian.php?proses=kembali" method="post">
              <div class="form-group">
                  <label for="ID">Id</label>
                  <input type="hidden" class="form-control" id="ID" name="ID"  value="<?=$data['idpinjam'] ?>"  >
                  <input type="text" class="form-control"   value="<?=$data['idpinjam'] ?>"  disabled>
              </div>
              <div class="form-group">
                  <label for="NM">Nama Peminjam</label>
                  <input type="hidden" class="form-control" id="NM" name="NM"  value="<?=$data['nama_peminjam'] ?>"   >
                  <input type="text" class="form-control"   value="<?=$data['nama_peminjam'] ?>" disabled  >
              </div>
                <div class="form-group">
                  <label for="NB">Nama Barang</label>
                  <input type="hidden" class="form-control" id="NB" name="NB" value="<?=$data['nama_barang'] ?>"  >
                  <input type="text" class="form-control"  value="<?=$data['nama_barang'] ?>"  disabled>
              </div>
                <div class="form-group">
                  <label for="J">Jumlah</label>
                  <input type="hidden" class="form-control" id="J" name="J" value="<?=$data['jumlah'] ?>"  >
                  <input type="text" class="form-control"  value="<?=$data['jumlah'] ?>" disabled >
              </div>
                <div class="form-group">
                  <label for="TP">Tanggal Pinjam</label>
                  <input type="hidden" class="form-control" id="TP" name="TP" value="<?=$data['tanggal_pinjam'] ?>"  >
                  <input type="text" class="form-control"  value="<?=$data['tanggal_pinjam'] ?>" disabled >
              </div>



          </div>
          <!-- /.card-body -->

         <div class="card-footer text-right">
                <a href='index.php?title=peminjaman&page=peminjaman'>
             <button type="button" class="btn btn-primary">
                <i class="fas fa-arrow-circle-left"></i> Back
             </button>
             </a>
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Kembalikan
                </button>
 
        </div>
      </div>
      <!-- /.card -->