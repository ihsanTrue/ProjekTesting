<?php

require "connec.php";

function login($user, $pass)
{
    global $con;


    $result = mysqli_query($con, "SELECT * FROM `costumer` WHERE nama = '$user'");

//    cek username

    if (mysqli_num_rows($result)) {

//        cek password

        $rows = mysqli_fetch_assoc($result);

        if (password_verify($pass, $rows["password"])) {
            return $rows["nama"];
        }

    } else {
        echo "<script>
                alert('Anda Belum terdaftar!.')
               </script>";
        return false;
    }

}

function loginadm($user, $pass)
{
    global $con;


    $result = mysqli_query($con, "SELECT * FROM `admin` WHERE username = '$user' AND  password = '$pass'");


    if (mysqli_num_rows($result)) {


        $rows = mysqli_fetch_assoc($result);


        return $rows["username"];


    } else {
        echo "<script>
                alert('Login gagal!.')
               </script>";
        return false;
    }
}