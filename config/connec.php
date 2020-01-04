<?php
$url = "localhost";
$user = "root";
$password = "";
$dataBase = "sirent2";

$con = mysqli_connect($url, $user, $password, $dataBase);

if ($con->connect_error){

    echo "gagal Koneksi ke databases : (" . $con-> connect_error. ")";
}
