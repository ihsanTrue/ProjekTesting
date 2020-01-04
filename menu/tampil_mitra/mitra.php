<?php
session_start();
include "../../config/fungsi_mitra";
require "../../config/function_login.php";

$mitra = query("SELECT * FROM mitra");

?>

<!--set waktu-->

<?php
$tanggal = mktime(date("m"), date("d"), date("Y"));
date_default_timezone_set('Singapore');
$jam = date("H:i:s");
$a = date("H");
$pesan = "";

if (($a >= 6) && ($a <= 11)) {
  $pesan = "Selamat Pagi !!";
} elseif (($a > 11) && ($a <= 15)) {
  $pesan = "Selamat Siang !!";
} elseif (($a > 15) && ($a <= 18)) {
  $pesan = "Selamat Sore !!";
} else {
  $pesan = "Selamat Malam !! ";
}

?>

<!--SESSION-->

<?php

if (isset($_POST['login'])) {

  $username = $_POST['username'];
  $password = $_POST['pass'];


  $login = login($username, $password);


  $result = mysqli_query($con, "SELECT * FROM costumer");

  $rows =mysqli_fetch_assoc($result);

  if ($login === $rows['nama']) {

    $us = strtoupper($pesan ." ". $login);

    echo "
    <script> 
    alert ('Hallo, $us');
    </script>
    ";

    $_SESSION["users"] = $login;

  }

}

// penghancuran session
if (isset($_POST["logout"])) {
  session_destroy();
  session_unset();
  $_SESSION = [];
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../asset/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="../../asset/bootstrap/bootstrap.min.css">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Righteous|Kanit|Exo+2|Mada|Sonsie+One
          |Condiment|Sedgwick+Ave+Display|Marck+Script|Faster+One|Aladin|Black+Ops+One&display=swap">
    <link rel="stylesheet" href="../../asset/css/style.css">
    <link rel="stylesheet" href="../../asset/css/style.min.css">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    <!-- <link href="https://fonts.googleapis.com/css?family=Marck+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Sedgwick+Ave+Display&display=swap" rel="stylesheet">  -->

    <link rel="shortcut icon" href="../../asset/icon/1x/Asset 5.png" type="image/x-icon">
    <title>SiRent</title>

</head>

<body>


<!-- Navbar -->
<div id="potition" style="position: fixed; z-index: 1000; width: 100%;">
    <nav class="navbar navbar-light" style="background-color: white;">
        <a class="navbar-brand" href="#"
           style="font-family:'Condiment', 'Marck Script', 'cursive'; font-size: 30px; margin-left: 100px;">
            <!-- SiRent -->
            <img src="../../asset/icon/1x/sirent_1.png" class="d-inline-block align-top" alt="" style="width: 150px;">
        </a>
        <ul class="nav justify-content-center" style="margin-right:70px ;">
          <?php if (isset($_SESSION["users"])) : ?>
              <li class="nav-item" style="margin-right:-25px ;">
                  <a class="nav-link">
                      <!-- button to modal -->
                      <button type="button" class="btn btn-light"><img
                                  src="../../asset/icon/user2.png" alt="user" style="width: 25px;">
                          <span style="color: #007bff; font-family: 'Righteous', cursive;">
                            <!-- Log In -->
                            <?= strtoupper($_SESSION["users"]); ?>
                        </span>
                      </button>
                  </a>
              </li>
              <form action="" method="post">
                  <li class="nav-item">
                      <div class="nav-link">
                          <button type="submit" class="btn btn-primary" name="logout"><span
                                      style="font-family: 'Righteous', cursive;">Log Out</span></button>
                      </div>
                  </li>
              </form>
          <?php else: ?>
              <li class="nav-item" style="margin-right:-25px ;">
                  <a class="nav-link">
                      <!-- button to modal -->
                      <button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModal"><img
                                  src="../../asset/icon/user2.png" alt="user" style="width: 25px;">
                          <span style="color: #007bff; font-family: 'Righteous', cursive;">
                            <!-- Log In -->
                            Log In
                        </span>
                      </button>
                  </a>
              </li>

              <li class="nav-item">
                  <a class="nav-link" href="../registrasi/Register.php">
                      <button type="button" class="btn btn-primary"><span
                                  style="font-family: 'Righteous', cursive;">Daftar</span></button>
                  </a>
              </li>
          <?php endif; ?>
        </ul>
    </nav>

    <!-- nav  -->
    <ul class="nav justify-content-center bg-light">
        <li class="nav-item">
            <a class="nav-link active" href="../../index.php"
               style="color: rgb(51, 51, 51); font-family: 'Kanit', sans-serif;">Halaman Awal</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../tampil_mitra/mitra.php"
               style="color: rgb(51, 51, 51); font-family: 'Kanit', sans-serif;">Mitra
                Kami</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../mobil/tmobil.php"
               style="color: rgb(51, 51, 51); font-family: 'Kanit', sans-serif; ">Pilihan
                Kendaraan</a>
        </li>
    </ul>
</div>
<br>

<!-- Header -->
<div class="card-header gardient"
     style="width: 100%; border-radius: 0; height: 350px; border: none; background-color: #18ffff; margin-top: 88px;">
    <br>
    <div class="row" style="width: 100%;">
        <div class="col-7">
            <h5 style="color: white; font-size: 40px; font-family: 'Kanit', sans-serif;">
                Rental Mobil untuk Semua Kebutuhan Perjalanan Anda
            </h5>
            <br>
            <p style="color: white; font-family: 'Kanit', sans-serif;">
                Ketika kemudahan bepergian tercapai, Anda dapat menikmati kota tujuan dengan maksimal. Mulai dari
                menjelajahi tempat populer, berwisata kuliner, atau sekadar berkeliling dalam kota, partner rental
                mobil tepercaya kami siap untuk mengantar Anda.
            </p>
        </div>
        <div class="col-5">
            <img src="../../asset/image/mobil-pameran-honda.png" alt=""
                 style="width: 100%; height: 80%; float: right; margin-top: 155px;">

        </div>
    </div>
</div>


<!-- container -->
<div class="container" style="margin-top: 200px; margin-bottom: 150px">
    <hr>

    <div class="row">
            <?php foreach ($mitra as $row) : ?>
        <div class="col-6">
                <div class="card mb-3 ShadowBox" >
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <br>
                            <img src="../../upload/imgmitra/<?= $row['img']; ?>" class="card-img" alt="No Image" style="width: 10rem; margin-left: 5px; margin-top: 20px">
                            <br>
                            <br>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h2 class="card-title" style="font-family: 'Arial'"><?= $row["Nama"];?></h2>
                                <p class="card-text" style="font-size: 12pt">Alamat .<?= $row["Alamat"];?>, No telp. <?= $row["No_telp"]?></p><br>
                                <p class="card-text"><small class="text-body" style="font-family: inherit"> <?= $row["email"]?></small></p>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
            <?php endforeach; ?>

    </div>

</div>

<!-- Footer -->
<div class="card-footer " style="background-color: black;">
    <div class="container" style="margin-top: 25px; font-family: 'mada', sans-serif;">
        <div class="row">
            <div class="col-4">
                <img src="../../asset/icon/1x/sirent2.png" class="d-inline-block align-top" alt=""
                     style="width: 200px;">
            </div>
            <div class="col-2">
                <h5 style="color: white; margin-bottom: 15px;">Tentang Sirent</h5>
                <a href="" style="color: rgb(197, 196, 196);">Pusat Bantuan</a><br>
                <a href="" style="color: rgb(197, 196, 196);">Hubungi Kami</a><br>
                <br>
                <h5 style="color: white; margin-bottom: 15px;">Follow kami di</h5>
                <a href="" style="color: rgb(197, 196, 196);">
                    <img src="../../asset/icon/twitter.png" alt="" style="width: 35px;">
                    Twitter</a><br>
                <a href="" style="color: rgb(197, 196, 196);">
                    <img src="../../asset/icon/facebook.png" alt="" style="width: 35px;">
                    Facebook</a><br>
                <a href="" style="color: rgb(197, 196, 196);">
                    <img src="../../asset/icon/instagram.png" alt="" style="width: 35px;">
                    Instagram</a>
            </div>
            <div class="col">
                <h5 style="color: white; margin-bottom: 15px;">Produk</h5>
                <a href="" style="color: rgb(197, 196, 196);">Rental Mobil Lepas Kunci</a><br>
                <a href="" style="color: rgb(197, 196, 196);">Rental Mobil Dengan Sopir</a><br>
            </div>
            <div class="col-3">
                <h5 style="color: white; margin-bottom: 15px;">Lainya</h5>
                <a href="" style="color: rgb(197, 196, 196);">Syarat & Ketentuan</a><br>
                <a href="" style="color: rgb(197, 196, 196);">Kebijakan Privasi</a><br>
                <br>
                <h5 style="color: white; margin-bottom: 15px;">Sponsor</h5>
                <div class="row">
                    <div class="col">
                        <div class="xej">
                            <img src="../../asset/icon/sponsoret_bni.png" alt="" style="width: 50%; margin-top: 10px;">
                        </div>
                    </div>
                    <div class="col">
                        <div class="xej">
                            <img src="../../asset/icon/sponsoret_bri.png" alt="" style="width: 50%; margin-top: 10px;">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="xej">
                            <img src="../../asset/icon/sponsoret_mandiri.png" alt=""
                                 style="width: 50%; margin-top: 10px;">
                        </div>
                    </div>
                    <div class="col">
                        <div class="xej">
                            <img src="../../asset/icon/sponsoret_bca.png" alt="" style="width: 50%; margin-top: 10px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <hr style="background-color: rgb(54, 54, 54); margin-top: 50px;">
    <br>
    <center style="color: white;">Copyright © 2019 Sirent</center>
    <br>
    <br>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style=" color: rgb(51, 51, 51)" id="exampleModalLabel">
                    Log In Ke Akun Anda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post" action="">
                    <div class="form-group">
                        <label for="formGroupExampleInput" style="color: rgb(51, 51, 51);">Nama atau
                            no. Telpon</label>
                        <input type="text" class="form-control" name="username">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2" style="color: rgb(51, 51, 51);">Password</label>
                        <input type="password" class="form-control" name="pass">
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-primary" style="width: 100%;" name="login">Log
                                    In
                                </button>

                            </div>
                            <div class="col-7">
                                <p style="margin-bottom: 0%; margin-top: 0%; color: rgb(51, 51, 51);">
                                    Belum punya akun ?</p>
                                <a href="#" style="width: 20px;">Daftar</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="container">
                    <p
                            style="margin-bottom: 0%; margin-top: 0%; color: rgb(51, 51, 51); font-family: 'Kanit', 'sans-serif';">
                        Nikmati berbagai kemudahan dengan menjadi member Sirent.</p>
                </div>

            </div>
        </div>
    </div>
</div>
</body>

</html>