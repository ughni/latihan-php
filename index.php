<!-- php -->
<?php
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
}

require 'function.php';

// pagination
// konfigurasi
$jumlahPerhalaman = 3; // jumlah data perhalaman 
$jumlahData = count(query("SELECT * FROM pendaftaran")); //mengambil ada berapa isi tabel
$jumlahHalaman = ceil(  $jumlahData / $jumlahPerhalaman ); // untuk bagi ke atas
// kalo pertama buka halaman jalankan ini dulu
$halmAktif = (isset($_GET["hal"]) ) ? $_GET["hal"] : 1; //kalo baru buka halaman langsung ke halaman pertama
$awalData = ($jumlahPerhalaman * $halmAktif) - $jumlahPerhalaman; // ini untuk algoritma perbandingan



$mhs = query("SELECT * FROM pendaftaran LIMIT $awalData, $jumlahPerhalaman"); 
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
    <link rel="stylesheet" href="style/style.css">
    <style>
        .lod {
            width: 70px;
            position: absolute;
            display: none;
        }
        @media print{
            .logout, .fom {
            display: none;
            }
        }

    </style>
</head>
    <h1>Data Pendaftaran</h1>

    <br>
    <a href="logout.php" class="logout">logout</a> | <a href="xcek.php" target="_blank">Cetak</a>
    <br>

    <form action="" class="fom" method="post">
        <input type="text" name="keyword" id="keyword" autofocus autocomplete="off" size="80" placeholder="Masukan yang mau cari">
        <button type="submit" name="cari" id="tombol-cari">Cari</button>

        <img src="img/loading.gif" class="lod">
    </form>
<br><br>
<div id="container">
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
    </div>
    <a href="tambah.php">tambah</a>
   
    <!-- nafigasi  -->
    <?php if($halmAktif > 1) : ?>  <!-- kalo lebih besar dari satu  -->
        <a href="?hal=<?= $halmAktif - 1; ?>">&laquo;</a>  <!-- ini jalankan  -->
    <?php endif; ?>  <!-- untuk mengakhiri if  -->

    <?php for($i = 1; $i <= $jumlahHalaman; $i++) : ?>  <!-- ini pengulangan apakah i lebih besar dari jumlahHalaman atau untuk menampilkan nomer  -->
        <!-- if -->
        <?php if ($i == $halmAktif) : ?>  <!-- ini di jalankan kalo yang aktif yang mana -->
            <a href="?hal=<?= $i; ?>" style="color: red; font-weight: bold;" ><?=  $i;  ?></a>  <!-- ini kalo hasilnya true  -->
            <?php else  : ?>
                <a href="?hal=<?= $i; ?>"><?=  $i;  ?></a>  <!-- ini kalo hasilnya fales --> 
        <?php endif; ?>  <!-- ini tutup if -->
    <?php endfor; ?>     <!-- ini tutup for -->
    ``
    <!-- min  -->
    <?php if($halmAktif < $jumlahHalaman) : ?>  <!-- kalo lebih besar dari satu  -->
        <a href="?hal=<?= $halmAktif + 1; ?>">&raquo;</a>  <!-- ini jalankan  -->
    <?php endif; ?>  <!-- untuk mengakhiri if  -->

     
    

    <script src="javascript/jquery-3.7.1.min.js"></script>
    <script src="javascript/js.js"></script>
</body>
</html>


<!-- 2BsY.KZu)7J!A&6 password InfinityFree -->