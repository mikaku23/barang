<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
            right: 35px;
            cursor: pointer;
            transform: translateY(-40%);
                    }
            .remember-forgot {
                font-size: 1.0em;
                color: #162938;
                display: flex;
                justify-content: space-between;
                margin: -15px 0 15px;
                float:right;
                margin-right:20px;
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
            <h2>Login</h2>
            <form action="../db/db_login.php?action=login" method="post">
                <div class="input-box">
                    <span class="icon"><ion-icon name="person"></ion-icon></span>
                    <input type="text" id="username" name="username" required>
                    <label>Username</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" id="password" name="password" required>
                    <label>Password</label>
                    <span class="toggle-password" onclick="togglePassword()">
                        <ion-icon name="eye-outline" id="toggleIcon"></ion-icon>
                    </span>
                </div>
                <div class="remember-forgot">
                    <a href="register.php">register?</a>
                    </div>
                   <a href="login.php">
                <button type="submit" class="btn">Login</button></a>

            </form>
        </div>
    </div>

    <script src="../dist/js/login.js"></script>
</body>
</html>
