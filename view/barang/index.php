<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  
</head>
<style>
    .action-btns {
        display: flex;
        justify-content: center;
        gap: 8px;
    }

    .action-btns .btn {
        margin: 0;
    }
</style>

<body>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Barang</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>

        <div class="card-body">
            <!-- Tombol Tambah Data -->
            <div class="row">
                <div class="col">
                    <a href="index.php?page=barang_create&title=barang_create" class="btn btn-success btn-md"><i class="fas fa-plus"></i> Tambah Data</a>
                </div>
            </div>
            <!-- Form Filter Kategori dan Status -->
            <div class="row pt-3">
                <div class="col-md-8">
                    <form method="GET" action="">
                        <div class="input-group">
                            <?php
                            include "koneksi.php";
                            // Ambil semua parameter GET
                            $params = $_GET;
                            unset($params['kategori'], $params['status']); // Hapus parameter 'kategori' dan 'status'
                            foreach ($params as $key => $value) {
                                echo "<input type='hidden' name='$key' value='$value'>";
                            }
                            ?>
                            <!-- Dropdown Kategori -->
                            <select name="kategori" class="form-control" style="max-width: 250px; margin-right: 8px;">
                                <option value="" disabled selected>Pilih Ruangan</option>
                                <option value="">Semua Ruang</option>
                                <?php
                                $query_kategori = "SELECT * FROM kategori";
                                $hasil_kategori = mysqli_query($koneksi, $query_kategori);
                                $kategori_list = [];
                                while ($kategori = mysqli_fetch_assoc($hasil_kategori)) {
                                    $kategori_list[$kategori['idkategori']] = $kategori['ruang'];
                                    $selected = isset($_GET['kategori']) && $_GET['kategori'] == $kategori['idkategori'] ? 'selected' : '';
                                    echo "<option value='" . $kategori['idkategori'] . "' $selected>" . $kategori['ruang'] . "</option>";
                                }
                                ?>
                            </select>
                            <!-- Dropdown Status -->
                            <select name="status" class="form-control" style="max-width: 200px; margin-right: 8px;">
                                <option value="" disabled selected>Pilih Status</option>
                                <option value="">Semua Status</option>
                                <?php
                                $status_options = ['Baik', 'Dipinjam', 'Rusak Ringan', 'Rusak Berat']; // Pilihan status
                                foreach ($status_options as $status) {
                                    $selected = isset($_GET['status']) && $_GET['status'] == $status ? 'selected' : '';
                                    echo "<option value='$status' $selected>$status</option>";
                                }
                                ?>
                            </select>
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </form>
                </div>
            </div>
            <br>
            <!-- Tabel Data Barang -->
            <div class="row">
                <div class="col">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nama</th>
                                <th>Status</th>
                                <th>Ruang</th>
                                <th>Kondisi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Ambil filter kategori dan status
                            $filter_kategori = isset($_GET['kategori']) ? $_GET['kategori'] : '';
                            $filter_status = isset($_GET['status']) ? $_GET['status'] : '';

                            // Query data barang
                            $query = "SELECT * FROM barang WHERE 1=1";
                            if (!empty($filter_kategori)) {
                                $query .= " AND idkategori = '$filter_kategori'";
                            }
                            if (!empty($filter_status)) {
                                $query .= " AND status = '$filter_status'";
                            }
                            $query .= " ORDER BY idbarang";

                            $hasil = mysqli_query($koneksi, $query);
                            $id = 1;

                            // Tampilkan data
                            while ($data = mysqli_fetch_assoc($hasil)) {
                                $ruang = isset($kategori_list[$data['idkategori']]) ? $kategori_list[$data['idkategori']] : 'Tidak Diketahui';
                                echo "
                                <tr>
                                    <td>NB0$id</td>
                                    <td>{$data['nama']}</td>
                                    <td>{$data['status']}</td>
                                    <td>$ruang</td>
                                    <td>
                                        <div class='action-btns'>
                                            <a href='db/db_barang.php?proses=rusakberat&idbarang={$data['idbarang']}' 
                                            class='btn btn-sm " . ($data['status'] == 'rusak berat' ? 'btn-danger' : 'btn-outline-danger') . "'>
                                            <i class='fas fa-bolt'></i>
                                            </a>
                                            <a href='db/db_barang.php?proses=rusakringan&idbarang={$data['idbarang']}' 
                                            class='btn btn-sm " . ($data['status'] == 'rusak ringan' ? 'btn-warning' : 'btn-outline-warning') . "'>
                                            <i class='fas fa-bolt'></i>
                                            </a>
                                            <a href='db/db_barang.php?proses=perbaiki&idbarang={$data['idbarang']}' 
                                            class='btn btn-sm " . ($data['status'] == 'baik' ? 'btn-success' : 'btn-outline-success') . "'>
                                            <i class='fas fa-hand-holding-medical'></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class='action-btns'>
                                            <a href='index.php?title=barang_view&page=barang_detail&idbarang={$data['idbarang']}' class='btn btn-outline-primary btn-sm'><i class='fas fa-eye'></i></a>
                                            <a href='index.php?title=barang_edit&page=barang_edit&idbarang={$data['idbarang']}' class='btn btn-outline-warning btn-sm'><i class='fas fa-pencil-alt'></i></a>
                                            <a href='db/db_barang.php?proses=hapus&idbarang={$data['idbarang']}' class='btn btn-outline-danger btn-sm'><i class='far fa-trash-alt'></i></a>
                                        </div>
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
    </div>
</body>

</html>
