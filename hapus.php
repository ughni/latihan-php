<?php 
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
}
require 'function.php';

$no = $_GET["no"];

if (hapus($no) > 0 ) {
    echo "
    <script>
    alert('data berhasil ditambahkan');
    document.location.href = 'index.php';
    </script>
    ";
 } else {
    echo "
    <script>
    alert('data gagal dihapus ditambahkan');
    document.location.href = 'index.php';
    </script>
    ";
 }
 ?> 