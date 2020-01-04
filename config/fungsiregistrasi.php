<?php

require "connec.php";

function register($data)
{
    global $con;

    $ktp = htmlspecialchars($data['ktp']);
    $noHandpone = htmlspecialchars($data['No_telp']);
    $nama = strtolower(htmlspecialchars($data['Nama']));
    $alamat = htmlspecialchars($data['Alamat']);
    $email = htmlspecialchars( $data['email'] );
    $password = mysqli_real_escape_string($con, $data['password']);
    $password2 = mysqli_real_escape_string($con, $data['cpassword']);

    // upload gambar
    $gambar = upload();

    //cek username tersedia atau tidak

    $result = mysqli_query($con, "SELECT nama FROM costumer WHERE nama = '$nama'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('username sudah terdaftar gunakan username lain!.')
               </script>";

        return false;
    }

    //cek confirmasi password
    if ($password !== $password2) {
        echo "<script>
                alert('confirmasi password berbeda!.')
               </script>";

        return false;
    }

    //enkripsi password

    $password = password_hash($password, PASSWORD_DEFAULT);


    //tambah data in database
    mysqli_query($con, "INSERT INTO costumer 
                                    VALUES 
                                    ('$ktp','$noHandpone','$nama','$alamat','$email','$password','$gambar')");

    return mysqli_affected_rows($con);

}

function upload () {

    $namaGambar = $_FILES['gambar']['name'];
    $size = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmp = $_FILES['gambar']['tmp_name'];

    //cek upload file ada atu tidak ada

    if ( $error === 4){

        echo "<script>
                alert('inputkan gambar terlebih dahulu!');
               </script>";

        return false;
    }

    // cek jenis file gambar atau bukan
    $formatGambar = ['jpg','jpeg','png'];
    $format = explode('.', $namaGambar);
    $format = strtolower(end($format));

    if ( !in_array($format,$formatGambar) ){

        echo "<script>
                alert('format gambar tidak di bolehkan!');
               </script>";

        return false;

    }

    // cek size gambar

    if ($size > 3000000){

        echo "<script>
                alert('ukuran gambar terlalu besar!');
               </script>";

        return false;

    }

    $newImageName = uniqid();
    $newImageName .= '.';
    $newImageName .=  $format;
    $folder ='../../upload/regfoto/';

    move_uploaded_file($tmp, $folder. $newImageName);

    return $newImageName;

}
