<?php 
// koneksi ke function  
require 'function.php';
// apakah tombol register sudah di tekan atau belum
if (isset($_POST["register"])) {

    if(registerasi($_POST) > 0 ) {
        echo "
        <script>
            alert('selamat datang');
        </script>";
    } else {
        echo mysqli_error($conn);
    }
}




?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regestrasi</title>
    <style>
        label {
            display: block;
        }

    </style>
</head>
<body>
    <h1>
        sing up
    </h1>
   <form action="" method="post">
        <ul>
            <li>
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placholder="Username">
            </li>
            <li>
                <label for="password">password</label>
                <input type="password" name="password" id="password" placholder="password">
            </li>
            <li>
                <label for="password2">password</label>
                <input type="password" name="password2" id="password2" placholder="password2">
            </li>
            <li>
                <button type="submit" name="register">register</button>
            </li>
        </ul>
   </form>
</body>
</html>