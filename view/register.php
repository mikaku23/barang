<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
<link rel="icon" type="image/x-icon" href="dist/img/logo3.png">
    <link rel="stylesheet" href="../dist/css/login.css">
    <script src="https://cdn.jsdelivr.net/npm/ionicons@5.5.2/dist/ionicons/ionicons.esm.js" type="module"></script>
    <script src="https://cdn.jsdelivr.net/npm/ionicons@5.5.2/dist/ionicons/ionicons.js" nomodule></script>
    <style>        
        .input-box {
            position: relative;
        }
        .icon, .toggle-password {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
        }
        .icon {
            right: 0;
        }
        .toggle-password {
            right: 15px;
            cursor: pointer;
            transform: translateY(-40%);
        }
select {
    width: 100%;
    height: 20px;
    bottom:50px;
    top:-20px;
    background: rgba(255, 255, 255, 0.2);
    color: #162938;
    border: 2px solid #162938;
    border-radius: 8px;
    outline: none;
    padding: 5px 10px;
    font-size: 1em;
    cursor: pointer;
    transition: all 0.3s ease-in-out;
}

select:hover {
    background: rgba(255, 255, 255, 0.5);
}

select:focus {
    border-color: #4caf50; /* Warna hijau sebagai highlight */
    box-shadow: 0 0 8px rgba(76, 175, 80, 0.5);
}

option {
    background: rgba(255, 255, 255, 1);
    color: #162938;
    font-size: 1em;
}
.remember-forgot {
    font-size: 1.0em;
    color: #162938;
    display: flex;
    justify-content: space-between;
    margin: -15px 0 15px;
    float:left;
    margin-left:10px;
    cursor: pointer;
    padding-top:10px;
}

.remember-forgot label input {
    accent-color: #162938;
    margin-right: 3px;
}

.remember-forgot a {
    color: #162938;
    text-decoration: none;
}

.remember-forgot a:hover {
    text-decoration: underline;
}

</style>
</head>
<body>
    <div class="wrapper">
        <div class="form-box login">
            <h2>Register</h2>
                <form action="../db/db_user.php?action=create" method="post">
                <div class="input-box">
                    <input type="text" id="nama" name="nama"  required>
                    <label for="text">Nama</label>
                </div>
                <div class="input-box">
                    <input type="text" id="username" name="username"  required>
                    <label for="username">Username</label>
                </div>
                <div class="input-box">
                    <input type="password" id="password" name="password"  required>
                    <label>Password</label>
                                        <span class="toggle-password" onclick="togglePassword()">
                        <ion-icon name="eye-outline" id="toggleIcon"></ion-icon>
                    </span>
                </div>
                <div class="input-box">
                    <input type="text" id="kelas" name="kelas"  required>
                    <label for="text">Kelas</label>
                </div>

                    <label for="jenis">Jenis Kelamin</label>
                    <select name="jenis" id="jenis" class="input-box" required>
                        <option value="" disabled selected>Silahkan Pilih</option>
                        <option value="laki-laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>

  
                    <label for="status">Status</label>
                    <select name="status" id="status" class="input-box" required>
                        <option value="" disabled selected>Silahkan Pilih</option>
                        <option value="guru">Guru</option>
                        <option value="siswa">Siswa</option>
                    </select>

                <br>
                                <div class="remember-forgot">
                    <a href="login.php">Kembali</a>
                    </div>
                    
                <button type="submit" class="btn">Regis</button>
            </form>
        </div>
    </div>
    <script src="../dist/js/login.js"></script>
</body>
</html>
