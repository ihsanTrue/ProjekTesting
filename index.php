<?php

session_start();

require "config/connec.php";
require "config/function_login.php";
////require "pemesanan/pemesanan.php";
//
//if (isset($_POST['cari'])) {
//  if (pesan($_POST) > 0) {
////        header("pemesanan/pemesanan.php");
//  } else {
//    echo "gagal";
//  }
//}
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
    <link rel="stylesheet" href="asset/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="asset/bootstrap/bootstrap.min.css">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Righteous|Kanit|Exo+2|Mada|Sonsie+One|Condiment|Sedgwick+Ave+Display|Marck+Script|Faster+One|Aladin|Black+Ops+One&display=swap">

    <link rel="stylesheet" href="asset/css/style.css">
    <link rel="stylesheet" href="asset/css/style.min.css">

    <link rel="stylesheet" href="sweetalert2.min.css">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css"/>
    <!-- <link href="https://fonts.googleapis.com/css?family=Marck+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Sedgwick+Ave+Display&display=swap" rel="stylesheet">  -->

    <link rel="shortcut icon" href="asset/icon/1x/Asset 5.png" type="image/x-icon">
    <title>SiRent</title>

</head>

<body>

<!-- Navbar -->
<div id="potition" style="position: fixed; z-index: 1000; width: 100%;">
    <nav class="navbar navbar-light" style="background-color: white;">
        <a class="navbar-brand" href="#"
           style="font-family:'Condiment', 'Marck Script', 'cursive'; font-size: 30px; margin-left: 100px;">
            <!-- SiRent -->
            <img src="asset/icon/1x/sirent_1.png" class="d-inline-block align-top" alt="" style="width: 150px;">
        </a>
        <ul class="nav justify-content-center" style="margin-right:70px ;">
          <?php if (isset($_SESSION["users"])) : ?>
              <li class="nav-item" style="margin-right:-25px ;">
                  <a class="nav-link">
                      <!-- button to modal -->
                      <button type="button" class="btn btn-light"><img
                                  src="asset/icon/user2.png" alt="user" style="width: 25px;">
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
                                  src="asset/icon/user2.png" alt="user" style="width: 25px;">
                          <span style="color: #007bff; font-family: 'Righteous', cursive;">
                            <!-- Log In -->
                            Log In
                        </span>
                      </button>
                  </a>
              </li>

              <li class="nav-item">
                  <a class="nav-link" href="menu/registrasi/Register.php">
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
            <a class="nav-link active" href="index.php"
               style="color: rgb(51, 51, 51); font-family: 'Kanit', sans-serif;">Halaman Awal</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="menu/tampil_mitra/mitra.php"
               style="color: rgb(51, 51, 51); font-family: 'Kanit', sans-serif;">Mitra
                Kami</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="menu/mobil/tmobil.php"
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
            <img src="asset/image/mobil-pameran-honda.png" alt=""
                 style="width: 100%; height: 80%; float: right; margin-top: 155px;">

        </div>
    </div>
</div>

<!-- card -->
<div class="card w-50 ShadowBox" style="margin-left: 18px; margin-top: -70px;">
    <div class="card-body">
        <h5 class="card-title">Rental Mobil</h5>
        <br>
        <!-- form pemesanan -->
        <form action="menu/mobil/tmobil.php" method="get">
            <div class="row" style="margin-bottom: 16px;">
                <div class="col" style="margin-bottom: 16px;">
                    <label for="Tanggal_sewa">Tanggal Sewa</label>
                    <input id="datepicker" type="text" class="form-control form-control-sm" name="Tanggal_sewa"
                           placeholder="Tanggal sewa">
                    <script>
                        $('#datepicker').datepicker({
                            uiLibrary: 'bootstrap4'
                        });
                    </script>
                </div>
                <div class="col">

                    <label for="durasi">Durasi</label>
                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend ">
                            <div class="input-group-text" style="height: 31px;">
                                <img src="asset/icon/1x/day2.png" alt="" width="31px">
                            </div>
                        </div>

                        <select class="form-control form-control-sm" name="durasi" id="durasi">
                            <option>Pilih Durasi</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                        </select>
                    </div>


                </div>
                <div class="col">
                    <label for="Tanggal_kembali">Tanggal Kembali</label>
                    <input type="text" class="form-control disabled" name="Tanggal_kembali"
                           placeholder="Tanggal Kembali" id="tanggal_kembali" disabled>
                    <small id="passwordHelpBlock" class="form-text text-muted">
                        pengembalian telat dikenakan denda 15% dari tarif mobil / day
                    </small>
                </div>
            </div>
            <div class="row">
                <div class="col">
                  <?php if (!isset($_SESSION["users"])): ?>
                      <button type="button" class="btn btn-warning btn-sm col-4 disabled"
                              style="width: 70%; float: right; background-color: orange;" name="cari">
                          <img src="asset/icon/search.png" alt="" style="width: 30px; ">
                          Cari Mobil
                      </button>
                  <?php else: ?>
                      <button type="submit" class="btn btn-warning btn-sm col-4"
                              style="width: 70%; float: right; background-color: orange;" name="cari">
                          <img src="asset/icon/search.png" alt="" style="width: 30px; ">
                          Cari Mobil
                      </button>
                  <?php endif; ?>
                </div>
            </div>
        </form>
    </div>
  <?php if (!isset($_SESSION["users"])): ?>
      <div class="card" style="border: 0px; border-radius: 0px; height: 70px">
          <hr>
          <div class="card-body" style="margin-top: -20px; text-align: center">
              <p style=" font-size: 12px">Silahkan melakukan
                  <a href="" style="color: #005cbf; font-size: 12px; font-weight: bold;" data-toggle="modal"
                     data-target="#exampleModal">Login</a>
                  ke akun yang telah anda daftarkan terlebih dahulu untuk
                  melakukan penyewaan mobil di sirent!</p>
          </div>
      </div>
  <?php endif; ?>
</div>


<!-- carausel -->
<div class="jumbotron" style="border: none; border-radius: 0; margin-top: 90px;">
    <div id="carouselExampleIndicators" class="carousel slide container" data-ride="carousel"
         style="margin-top: -110px;">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <h2 style="margin-top: 100px; text-align: center; font-family: 'Kanit', sans-serif; ">Tentang
                    Kami
                </h2>
                <hr class="bg-warning" style="width: 50px; height: 2px; font-family: 'Kanit', sans-serif;">
                <p>SIRENT adalah perusahaan rental mobil yang menyediakan layanan peminjaman mobil dari berbagai
                    perusahaan
                    penyedia jasa rental mobil dalam satu platform, memungkinkan anda menciptakan momen liburan
                    bersama keluarga
                    tercinta. kami menawarkan kemudahan penyewaan mobil beserta sopir tanpa repot-repot kesana
                    kemari mencari
                    tempat peminjaman mobil yang nyaman dan terpercaya.</p>
            </div>
            <div class="carousel-item">
                <h2 style="margin-top: 100px; text-align: center; font-family: 'Kanit', sans-serif; ">Visi
                </h2>
                <hr class="bg-warning" style="width: 50px; height: 2px; font-family: 'Kanit', sans-serif;">
                <p>SIRENT adalah perusahaan rental mobil yang menyediakan layanan peminjaman mobil dari berbagai
                    perusahaan
                    penyedia jasa rental mobil dalam satu platform, memungkinkan anda menciptakan momen liburan
                    bersama keluarga
                    tercinta. kami menawarkan kemudahan penyewaan mobil beserta sopir tanpa repot-repot kesana
                    kemari mencari
                    tempat peminjaman mobil yang nyaman dan terpercaya.</p>
            </div>
            <div class="carousel-item">
                <h2 style="margin-top: 100px; text-align: center; font-family: 'Kanit', sans-serif; ">Misi
                </h2>
                <hr class="bg-warning" style="width: 50px; height: 2px; font-family: 'Kanit', sans-serif;">
                <p>SIRENT adalah perusahaan rental mobil yang menyediakan layanan peminjaman mobil dari berbagai
                    perusahaan
                    penyedia jasa rental mobil dalam satu platform, memungkinkan anda menciptakan momen liburan
                    bersama keluarga
                    tercinta. kami menawarkan kemudahan penyewaan mobil beserta sopir tanpa repot-repot kesana
                    kemari mencari
                    tempat peminjaman mobil yang nyaman dan terpercaya.</p>
            </div>
        </div>
        <br>
        <br>
        <!-- -->
    </div>

</div>

<!-- container -->
<div class="container">

    <br>

    <h2 style="margin-top: 100px; text-align: center; font-family: 'Kanit', sans-serif; ">Rental Mobil Lepas Kunci
    </h2>
    <hr class="bg-warning" style="width: 50px; height: 2px; font-family: 'Kanit', sans-serif;">
    <p>Bepergian bersama keluarga atau kerabat semakin asyik jika Anda menggunakan sarana transportasi yang tepat.
        Sewa mobil atau carter mobil dapat menjadi pilihan terbaik untuk memudahkan mobilitas Anda. Untuk semakin
        mendukung fleksibilitas Anda saat bepergian, Traveloka kini telah menyediakan layanan sewa mobil lepas
        kunci. Anda dapat menikmati kenyamanan ini dengan memesan langsung melalui Sirent. Temukan berbagai
        pilihan mobil terbaik, lengkap dengan tarif mobil yang dibutuhkan.</p>

    <br>

    <h2 style="margin-top: 100px; text-align: center; font-family: 'Kanit', sans-serif; ">Rental Mobil Dengan Sopir
    </h2>
    <hr class="bg-warning" style="width: 50px; height: 2px; font-family: 'Kanit', sans-serif;">
    <p>Memilih kendaraan yang tepat saat ingin bepergian adalah hal wajib. Jika Anda berencana keliling keluar kota
        dengan keluarga atau rombongan, sewa mobil atau carter mobil di luar kota menjadi pilihan terbaik. Kini,
        perkembangan teknologi memudahkan Anda untuk sewa mobil di manapun hanya dengan Sirent. Anda dapat
        menemukan pilihan mobil terbaik, yang sesuai dengan kebutuhan. Kemudahan ini akan menjadikan perjalanan Anda
        lebih nyaman dan hemat waktu.</p>
</div>

<!-- Footer -->
<div class="card-footer" style="background-color: black;">
    <div class="container" style="margin-top: 25px; font-family: 'mada', sans-serif;">
        <div class="row">
            <div class="col-4">
                <img src="asset/icon/1x/sirent2.png" class="d-inline-block align-top" alt="" style="width: 200px;">
            </div>
            <div class="col-2">
                <h5 style="color: white; margin-bottom: 15px;">Tentang Sirent</h5>
                <a href="" style="color: rgb(197, 196, 196);">Pusat Bantuan</a><br>
                <a href="" style="color: rgb(197, 196, 196);">Hubungi Kami</a><br>
                <br>
                <h5 style="color: white; margin-bottom: 15px;">Follow kami di</h5>
                <a href="" style="color: rgb(197, 196, 196);">
                    <img src="asset/icon/twitter.png" alt="" style="width: 35px;">
                    Twitter</a><br>
                <a href="" style="color: rgb(197, 196, 196);">
                    <img src="asset/icon/facebook.png" alt="" style="width: 35px;">
                    Facebook</a><br>
                <a href="" style="color: rgb(197, 196, 196);">
                    <img src="asset/icon/instagram.png" alt="" style="width: 35px;">
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
                            <img src="asset/icon/sponsoret_bni.png" alt="" style="width: 50%; margin-top: 10px;">
                        </div>
                    </div>
                    <div class="col">
                        <div class="xej">
                            <img src="asset/icon/sponsoret_bri.png" alt="" style="width: 50%; margin-top: 10px;">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="xej">
                            <img src="asset/icon/sponsoret_mandiri.png" alt="" style="width: 50%; margin-top: 10px;">
                        </div>
                    </div>
                    <div class="col">
                        <div class="xej">
                            <img src="asset/icon/sponsoret_bca.png" alt="" style="width: 50%; margin-top: 10px;">
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
                                <a href="menu/registrasi/Register.php" style="width: 20px;">Daftar</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="container">
                    <p style="margin-bottom: 0%; margin-top: 0%; color: rgb(51, 51, 51); font-family: 'Kanit', 'sans-serif';">
                        Nikmati berbagai kemudahan dengan menjadi member Sirent.</p>
                </div>

            </div>
        </div>
    </div>
</div>

<script src="sweetalert2.all.min.js"></script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>

<script src="sweetalert2.min.js"></script>


<!-- set tanggal kembali with jquery -->
<script>
    $(document).ready(function () {
        let tanggalAwal = ''
        let durasi = 0
        $('#datepicker').on('change', function () {
            tanggalAwal = $('#datepicker').val()
            if (tanggalAwal !== '' && durasi !== 0) {
                tambah(durasi, tanggalAwal)
            }
        })
        $('#durasi').on('change', function () {
            durasi = $('#durasi').val()
            if (tanggalAwal !== '' && durasi !== 0) {
                tambah(durasi, tanggalAwal)
            }
        })

        function tambah(durasi, tanggal) {
            let databaru = new Date(new Date(tanggal).getTime() + (durasi * 24 * 60 * 60 * 1000))
            $('#tanggal_kembali').val(`${databaru.getMonth() + 1}/${databaru.getDate()}/${databaru.getFullYear()}`)
        }
    })
</script>
</body>

</html>