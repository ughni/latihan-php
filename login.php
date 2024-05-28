<?php 
// koneksi ke function
require 'function.php';

// apakah tombol login sudah di click atau belum
if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];


    // apakah name sudah ada didatabase
    $result =  mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

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
    <h1>Login</h1>

    <form action="" method="post">
        <ul>
            <li>
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placholder="Username">
            </li>
            <li>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placholder="paswword">
            </li>
            <li>
                <button type="submit" name="login">Login</button>
            </li>
        </ul>
    </form>
</body>
</html>