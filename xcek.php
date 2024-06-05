<?php

require_once __DIR__ . '/vendor/autoload.php';
require 'function.php';
$mhs = query("SELECT * FROM pendaftaran");


$html = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
<h1>Data Pendaftaran</h1>
<br>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>NRP</th>
            <th>Nama</th>
            <th>jurusan</th>
            <th>email</th>
            <th>gambar</th>
        </tr>';

$i = 1;
    foreach($mhs as $row) {
    $html .= '<tr>
        <td>' . $i++ . '</td>
        <td>' . $row["nrp"] . '</td>
        <td>' . $row["nama"] . '</td>
        <td>' . $row["jurusan"] . '</td>
        <td>' . $row["email"] . '</td>
        <td><img src="img/'. $row["gambar"] .' " width="60"></td>  
        </tr>';
    }

$html .=  '</table>   
</body>
</html>
';


$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output('data-pendaftaran.pdf', 'I');
?>

