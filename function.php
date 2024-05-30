<?php
// koneksi ke database 
$conn = mysqli_connect("localhost","root","","phpdasar");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// function tambah data 
function tambah($data) {
    global $conn;
    $nrp = htmlspecialchars($data['nrp']);
    $nama = htmlspecialchars($data['nama']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $email = htmlspecialchars($data['email']);

    // upload gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    $query = "INSERT INTO pendaftaran VALUES ('', '$nrp', '$nama', '$jurusan','$email','$gambar') 
    ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


// function upload
function upload() {

    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    
    // cek apakah user sudah  diupload atau belum
    if ($error === 4 ) {
        echo '
        <script> alert("anda belum memasukan gambar")</script>
        ';
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekGambarValid = ['jpg', 'png', 'jpng'];
    $ekGambar = explode(".", $namaFile);
    $ekGambar = strtolower(end($ekGambar));

    // cek apakah ynag di upload gambar apa bukan
    if (!in_array($ekGambar, $ekGambarValid)) {
        echo '
        <script>alert("anda memasukan bukan gambar")</script>
     ';   
    }

    // cek apakah ukuran melebihi batas
    if($ukuranFile > 1000000) {
                echo '
            <script>
            alert("anda foto melebihi ukuran yang tersedia");
            </script>
        ';
        return false;
    }

    // cek lolos pengecekan, gambar siap diupload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= ".";
    $namaFileBaru .= $ekGambar; 


    move_uploaded_file( $tmpName, "img/". $namaFileBaru);
   return $namaFileBaru;
}

// function hapus
function hapus($no) {
    global $conn;
    mysqli_query($conn,"DELETE FROM pendaftaran WHERE no = $no");
    return mysqli_affected_rows( $conn );
}

// function ubah data guru 
function ubah($data) {
    global $conn;
    $no = $data['no'];
    $nrp = htmlspecialchars($data['nrp']);
    $nama = htmlspecialchars($data['nama']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $email = htmlspecialchars($data['email']);
    $gambarLama = htmlspecialchars($data['gambarLama']);

    // cek apakah user mengganti gambar apa ngga
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $data['gambarLama'];
        } else {
        $gambar = upload();  // Misalkan uploadGambar() adalah fungsi upload Anda
    }

    $query = "UPDATE pendaftaran SET  nrp = '$nrp', nama = '$nama', jurusan =  '$jurusan', email = '$email', gambar = '$gambar'  WHERE no = $no";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// function cari
function cari($keyword) {
    $query = "SELECT * FROM pendaftaran WHERE
     nrp LIKE '%$keyword%' OR
     nama LIKE '%$keyword%' OR
     jurusan LIKE '%$keyword%'
     ";
    return query($query);
}



// function refisterasi
function registerasi($data) {
    global $conn;

    $username = strtolower(stripcslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data ["password2"]);

    // cek apakah username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
   
    if (mysqli_fetch_assoc($result)) {
        echo "
        <script> alert('nama anda sudah terdaftar'); </script>
        ";
        return false;
    }


    // apakah password sama password konfirmasi sama atau tidak
    // if( $password !== $password2) {
    //     echo '
    //     <script> 
    //         alert("password salah");
    //     </script>  
    //     ';
    //     return false;
    // }

    if($password !== $password2) {
        echo '
             <script> 
                 alert("password salah");
             </script>  
            ';
             return false;
    }   
    // enkripsi password
    // $password = password_hash($password, PASSWORD_DEFAULT);
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambah userbaru ke database
    // mysqli_query($conn,"INSERT INTO user VALUES ('', '$username', '$password') ");
    mysqli_query($conn, "INSERT INTO user VALUES ('', '$username', '$password') ");

    return mysqli_affected_rows($conn);
}




?>