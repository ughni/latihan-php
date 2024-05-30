<?php
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
}
// koneksi ke  function
require 'function.php';


// tangkap URL no
$no = $_GET["no"];

// query data guru berdasarkan no
$gr = query("SELECT * FROM pendaftaran WHERE no = $no")[0];

// cek apakah tombol submit ditekan atau belum
if (isset($_POST["submit"])) {

    
    // if untuk menubah database
    if ( ubah($_POST) > 0 ) {
    echo "
        <script>
        alert('data berhasil diubah');
        document.location.href = 'index.php';
        </script>
    "; 
    } else {
        echo "
      <script>
        alert('data gagal diubah');
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
    <title>tambah data guru</title>
</head>
<body>
    <h1>Ubah data</h1>
    <form  action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="no" value="<?= $gr['no'] ?>">
                <input type="hidden" name="gambarLama" value="<?= $gr['gambar'] ?>">
        <ul>
            <li>
            <label for="nrp">NRP</label>
            <input type="text" name="nrp" id="nrp" placholder="nrp" required value="<?= $gr['nrp'] ?>">
            </li>
            <li>
                <label for="nama">nama</label>
                <input type="text" name="nama" id="nama" placholder="nama" required value="<?= $gr['nama'] ?>">
            </li>
            <li>
                <label for="jurusan">jurusan</label>
                <input type="text" name="jurusan" id="jurusan" placholder="jurusan" required value="<?= $gr['jurusan'] ?>">
            </li>
            <li>
                <label for="email">email </label>
                <input type="text" name="email" id="email" placholder="email" required value="<?= $gr['email'] ?>">
            </li>
            <li>
                <label for="gambar">gambar</label><br>
                <img src="img/<?= $gr['gambar']; ?>" width="80" alt="fff">
                <input type="file" name="gambar" id="gambar"><br>
            </li>
            <li>
                <button type="submit" name="submit">Ubah Data</button>
            </li>
        </ul>
    </form>
    <a href="index.php">kembali</a>
</body>
</html>