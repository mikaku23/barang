<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data peminjaman</title>
    <script src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js" type="module"></script>
    <script src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js" nomodule></script>
    <style>
        .reset-icon {
            font-size: 1.2em;
            vertical-align: middle;
            position: relative;
            top: -2px;
        }
    </style>
</head>
<body>
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Tambah Data peminjaman</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        
        <form action="db/db_peminjaman.php?proses=create" method="POST">
                <div class="card-body">
               <div class="form-group">
                  <label for="nama_peminjam">Nama</label>
                  <input type="hidden" class="form-control" nama="nama_peminjam" name="nama_peminjam"  value="<?=$_SESSION['nama'] ?> " >
                  <input type="text" class="form-control"  value="<?=$_SESSION['nama'] ?> " disabled>
              </div>
               <div class="form-group">
                  <label for="status">Status</label>
                  <input type="hidden" class="form-control" status="status" name="status"  value="<?=$_SESSION['status'] ?>" >
                  <input type="text" class="form-control" value="<?=$_SESSION['status'] ?>" disabled>
              </div>
                <div class="form-group">
                    <label for="idbarang">Nama Barang</label>
                    <select class="form-control" id="idbarang" name="idbarang" required>
                        <option value="" disabled selected>Pilih Barang</option>
                        <?php
                        include "koneksi.php";
                        // Query untuk mengambil id dan nama barang
                        $query = mysqli_query($koneksi, "SELECT idbarang, nama FROM barang where status= 'baik'");
                        while ($data = mysqli_fetch_assoc($query)) {
                            // Gabungkan id dan nama dalam satu value
                            echo "<option value='" . $data['idbarang'] . "-" . $data['nama'] . "'>" . $data['idbarang'] . "-" . $data['nama'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
               <div class="form-group">
                  <label for="jumlah">jumlah</label>
                  <input type="number" min="1" max="1000" class="form-control" jumlah="jumlah" name="jumlah" required>
              </div>
          </div>
            <!-- /.card-body -->

            <div class="card-footer text-right">
                <a href='index.php?title=peminjaman&page=peminjaman'>
             <button type="button" class="btn btn-primary">
                <i class="fas fa-arrow-circle-left"></i> Kembali
             </button>
             </a>
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <button type="reset" class="btn btn-warning">
                    <ion-icon name="refresh-circle-outline" class="reset-icon"></ion-icon> Reset
                </button>
            </div>
        </form>
    </div>
</body>
</html>
