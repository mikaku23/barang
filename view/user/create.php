<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<script src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js" type="module"></script>
<script src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js" nomodule></script>

</head>
<body>
    <style>
        .reset-icon {
    font-size: 1.2em; 
    vertical-align: middle;
    position: relative;
    top: -2px;
}

        </style>
    <div class="card card-success">
          <div class="card-header">
              <h3 class="card-title">Tambah Data user</h3>

              <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-minus"></i>
                  </button>

              </div>
          </div>
          <form action="db/db_user.php?action=create" method="post">
          <div class="card-body">
              <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama" required>
              </div>
               <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username" required>
              </div>
               <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
              </div>
                <div class="form-group">
                  <label for="kelas">Kelas</label>
                  <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Masukkan kelas" required>
              </div>
              <div class="form-group">
    <label for="jenis">Jenis Kelamin</label>
    <select name="jenis" id="jenis" class="form-control" required>
         <option value="" disabled selected>Silahkan Pilih</option>
        <option value="laki-laki">Laki-laki</option>
        <option value="perempuan">Perempuan</option>
    </select>
</div>
<div class="form-group">
    <label for="status">Status</label>
    <select name="status" id="status" class="form-control" required>
         <option value="" disabled selected>Silahkan Pilih</option>
        <option value="guru">Guru</option>
        <option value="siswa">Siswa</option>
    </select>
</div>

          </div>
          <!-- /.card-body -->

        <div class="card-footer text-right">
                <a href='index.php?title=user&page=user'>
             <button type="button" class="btn btn-primary">
                <i class="fas fa-arrow-circle-left"></i> Kembali
             </button>
             </a>
                 <a href='index.php?page=user_create&title=user_create'>
            <button type="reset" class="btn btn-warning">
                <ion-icon name="refresh-circle-outline" class="reset-icon"></ion-icon> Reset
           </button>
                </a>
             <button type="submit" class="btn btn-success">
                <i class="fas fa-save"></i> Simpan
             </button>

        </div>

          </form>
      </div>
</body>
</html> 