<?php
        include "koneksi.php";
        $id = $_GET['idbarang'];
        $query = "SELECT * FROM barang WHERE idbarang='$id'";
        $find_one = mysqli_query($koneksi, $query);
        $data = mysqli_fetch_assoc($find_one);
        ?>
      <!-- Default box -->

      <div class="card card-warning">
          <div class="card-header">
              <h3 class="card-title">Ubah Data Buku <?=$data['nama'] ?></h3>
              </div>
          </div>
          <div class="card-body">

           <form action="db/db_barang.php?proses=edit" method="post">
          <div class="form-group">
            <input type="hidden" value="<?=$data['idbarang'] ?>" id="idbarang" name="idbarang">
                  <label for="idbarang">Id</label>
                  <input type="text" class="form-control"  value="<?= $data['idbarang'] ?>" disabled>
              </div>
              <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['nama'] ?>" >
              </div>
              <div class="form-group">
                  <label for="jumlah">Jumlah</label>
                  <input type="text" class="form-control" id="jumlah" name="jumlah" value="<?= $data['jumlah'] ?>" >
              </div>
              <div class="form-group">
                  <label for="warna">Warna</label>
                  <input type="text" class="form-control" id="warna" name="warna" value="<?= $data['warna'] ?>" >
              </div> 
              <div class="form-group">
                    <label for="status">Kondisi Barang</label>
                    <select class="form-control" id="status" name="status"  >
                        <option disabled selected><?= $data['status'] ?></option>
                        <option >Ada</option>
                        <option >Rusak</option>
                        
                    </select>
                </div>
              <div class="form-group">
                    <label for="spesifik_lain">Spesifik Lain</label>
                    <select class="form-control" id="spesifik_lain" name="spesifik_lain" onchange="toggleInputField(this)" >
                        <option value="" disabled selected><?= $data['spesifik_lain'] ?></option>
                        <option value="spesifikasi 1">Tidak Ada</option>
                        <option value="lain" >lainnya</option>
                    </select>
                   <input type="text" id="spesifik_lain_field" class="form-control" name="spesifik_lain" placeholder="Masukkan spesifik lain" style="display:none;">
                </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer text-right">
            <a href='index.php?page=barang&title=barang'>
             <button type="button" class="btn btn-primary">
                <i class="fas fa-arrow-circle-left"></i> Kembali
             </button>
             </a>
              <button type="submit" class="btn btn-warning"><i class="fas fa-save"></i> Ubah</button>
          </div>
          </form>
      </div>
       <script>
        function toggleInputField(select) {
            const inputField = document.getElementById('spesifik_lain_field');
            if (select.value === 'lain') {
                inputField.style.display = 'block';
            } else {
                inputField.style.display = 'none';
            }
        }
    </script>
      <!-- /.card -->