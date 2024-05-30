<?php
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
}
require 'function.php';

// cek  apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {

// var_dump($_POST);
//     var_dump($_FILES);
//     die;

    // cek data berhasil ditambahkan atau tidak
    if (tambah($_POST) > 0 ) {
    echo "
        <script>
        alert('data berhasil ditambahkan');
        document.location.href = 'index.php';
        </script>
    "; 
    } else {
        echo "
      <script>
        alert('data gagal ditambahkan');
        document.location.href = 'index.php';
      </script>
      ";}

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>data pendaftaran</title>
</head>
<body>
    <h1>tembah data</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
            <label for="nrp">NRP</label>
            <input type="text" name="nrp" id="nrp" placholder="nrp" required>
            </li>
            <li>
                <label for="nama">nama</label>
                <input type="text" name="nama" id="nama" placholder="nama" required>
            </li>
            <li>
                <label for="jurusan">jurusan</label>
                <input type="text" name="jurusan" id="jurusan" placholder="jurusan" required>
            </li>
            <li>
                <label for="email">email</label>
                <input type="text" name="email" id="email" placholder="email" required>
            </li>
            <li>
                <label for="gambar">gambar</label>
                <input type="file" name="gambar" id="gambar" placholder="gambar" >
            </li>
            <li>
                <button type="submit" name="submit">Kirim</button>
            </li>
        </ul>
    </form>
    <a href="index.php">kembali</a>
</body>
</html>