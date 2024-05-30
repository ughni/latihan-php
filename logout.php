<?php 

session_start(); // ini wajib paling awal 
$_SESSION = []; //ini  untuk session kosong
session_unset(); // ini untuk memastikan di hapus  session  
session_destroy(); // untuk mehapus session  

header("Location: login.php");

?>