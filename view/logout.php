<?php
session_start();
session_unset();
session_destroy();
  echo "<script type='text/javascript'>
    alert('Anda telah logout');
    window.location='../view/login.php';
    </script>";
?>