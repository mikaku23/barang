<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data barang</title>
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
            <h3 class="card-title">Tambah Data barang</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>

        <form action="db/db_barang.php?proses=insert" method="POST">
            <div class="card-body">
                <div class="form-group">
                    <label for="nama">Nama Barang</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama barang"
                        required>
                </div>
                <div class="form-group">
                    <label for="nomorbarang">Nomor Barang</label>
                    <input type="text" class="form-control" id="nomorbarang" name="nomorbarang" placeholder="Masukkan nomor barang"
                        required>
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah Barang</label>
                    <input type="number" class="form-control" min="1" max="1000" id="jumlah" name="jumlah"
                        placeholder="Masukkan jumlah" required>
                </div>
                <div class="form-group">
                    <label for="warna">Warna</label>
                    <input type="text" class="form-control" id="warna" name="warna" placeholder="Masukkan warna"
                        required>
                </div>
                <div class="form-group">
                    <label for="idkategori">Ruangan</label>
                    <select class="form-control" id="idkategori" name="idkategori" required>
                        <option value="">Pilih kategori</option>
                        <?php
                        include "koneksi.php";
                        // Query untuk mengambil id dan ruang barang
                        $query = mysqli_query($koneksi, "SELECT idkategori, ruang FROM kategori ");
                        while ($data = mysqli_fetch_assoc($query)) {
                            // Gabungkan id dan ruang dalam satu value
                            echo "<option value='" . $data['idkategori'] . "-" . $data['ruang'] . "'>" . $data['idkategori'] . "-" . $data['ruang'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="spesifik_lain">Spesifik Lain</label>
                    <input type="text" class="form-control" id="spesifik_lain" name="spesifik_lain" placeholder="Masukkan spesifik_lain"
                        required>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer text-right">
                <a href='index.php?title=barang&page=barang'>
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
</body>

</html>