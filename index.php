<!-- php -->
<?php
require 'function.php';
$mhs = query('SELECT * FROM pendaftaran'); 


// kalau sudah click tombol cari
if (isset($_POST['cari']) ) {    
    $mhs = cari($_POST['keyword']);
}
?>
<!-- html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pendaftaran</title>
</head>
<body>
    <h1>Data Pendaftaran</h1>


    <form action="" method="post">
        <input type="text" name="keyword" autofocus autocomplete size="80" placeholder="Masukan yang mau cari">
        <button type="submit" name="cari">Cari</button>
    </form>
<br><br>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>link</th>
            <th>NRP</th>
            <th>Nama</th>
            <th>jurusan</th>
            <th>email</th>
            <th>gambar</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach ($mhs as $row) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td>
            <a href="ubah.php?no=<?= $row["no"]; ?>">ubah</a>
            <a href='hapus.php?no=<?= $row["no"]; ?>' onclick="return confirm('yakin data mau dihapus secara permanen')"> Hapus</a>
            </td>
            <td><?= $row['nrp']; ?></td>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['jurusan']; ?></td>
            <td><?= $row['email']; ?></td>
            <td><img src="img/<?= $row['gambar']; ?>" width="80" alt="fff"><td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
    <a href="tambah.php">tambah</a>
    
</body>
</html>