<?php 
// koneksi ke function.php
require '../function.php';

$keyword = $_GET['keyword'];

$query = "SELECT * FROM pendaftaran WHERE
nrp LIKE '%$keyword%' OR
nama LIKE '%$keyword%' OR
jurusan LIKE '%$keyword%'
";

$mhs = query($query);

?>


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