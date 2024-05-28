<?php
// koneksi ke function
require 'function.php';
// apakah tombol login sudah  diclick atau belum  
if (isset($_POST['login'])) {

    // tangkat user mau isi apa
    $username = $_POST["username"];
    $password = $_POST["password"];

    // cek apakah benar user sudah login
    $reslut = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
    // kalo  benar 
    if(mysqli_num_rows($reslut) === 1 ) {
    // cek password 
        $row = mysqli_fetch_assoc($reslut);  // ini tangkap semua isi baris table
       if(password_verify($password, $row['password'])) // ini verifikasi password 
        {
            header('Location: index.php');
            exit;
       }

    }

    $error = true;
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Halaman Login</h1>
    <br>
    <?php if (isset($error)) : ?>
    <p>username atau password salah</p>
    <?php endif; ?>
    <br>
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
                <button type="submit" name="login">Login</button>
            </li>
        </ul>
    </form>
</body>
</html>