<?php

require "../log_session.php";
require "../../config/function_sewa.php";

//$pemesanan = query("SELECT No_Ktp, No_telp, nama, E-mail FROM costumer INNER JOIN penyewaan ON No_Ktp = No_Ktp");
$key = $_GET['key'];
$npl = $_GET['nopol'];
$pemesanan = query("SELECT * FROM costumer INNER JOIN penyewaan ON costumer.No_Ktp = penyewaan.No_ktp WHERE penyewaan.id_transaksi = '$key' ");
$mobil = query("SELECT * FROM mobil WHERE no_pol = '$npl' ");

//var_dump($pemesanan);
//var_dump($mobil);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin | Sirent</title>

    <!--    css with bootstrap-->
    <link rel="stylesheet" href="../asset/bootsrap/bootstrap.min.css">
    <link rel="stylesheet" href="../asset/css/style-min.css">
</head>
<body>
<!--navs-->
<div class="container-fluid">
    <br>
    <ul class="nav justify-content-end">
        <a class="navbar-brand mr-auto" href="#"><img src="../asset/icon/sirent_1.png" alt="" style="width: 150px"></a>
        <!--        <li class="nav-item">-->


        <div class="btn-group">
            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false" style="text-transform: uppercase">
                <img src="../asset/icon/user.png" alt="" style="width: 40px; margin-right: 15px">
              <?= $_SESSION['admin']; ?>
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="logout.php">Log Out</a>
            </div>
        </div>

    </ul>
</div>
<hr>
<!--last navs-->
<!--navbar-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav mr-auto">
                <a class="nav-item nav-link" href="../Home.php">Home <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="dtmobil.php">Data Mobil</a>
                <a class="nav-item nav-link" href="#">Data Mitra</a>
                <a class="nav-item nav-link" href="#">Data Pemesanan</a>
                <a class="nav-item nav-link" href="#">Data Pengembalian</a>
                <a class="nav-item nav-link" href="costumer.php">Data Costumer</a>
            </div>
        </div>
    </div>
</nav>
<hr>
<!--last navbar-->


<!--content-->
<?php foreach ($pemesanan as $rows) : ?>
    <br>
    <br>
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-4">
                <h5>Detail Penyewa</h5>
                <div class="card" style="width: 100%;">
                    <img src="../../upload/regfoto/<?= $rows['gambar']; ?>" alt="..." class="card-img-top">
                    <div class="card-body">
                        <p class="card-text">
                        <div class="row">
                            <div class="col">
                                No Ktp <br>
                                Nama <br>
                                No Telp
                            </div>
                            <div class="col">
                              <?= $rows['No_Ktp']; ?> <br>
                              <?= $rows['nama']; ?> <br>
                              <?= $rows['No_telp']; ?>
                            </div>
                        </div>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col">
              <?php foreach ($mobil as $rowsmobil) : ?>
                  <h5>Detail Penyewaan</h5>
                  <a href="pemesanan.php" class="btn btn-danger" style="float: right">Kembali</a>
                  <div class="card">
                      <div class="card-header">
                          <img src="../../upload/imgmobil/<?= $rowsmobil['gambar']; ?>" alt="" class="card-header"
                               style="width: 500px">
                      </div>
                      <div class="card-body">
                          <div class="row">
                              <div class="col">
                                  ID Transaksi <br><br>
                                <?= $rows["id_transaksi"]; ?> <br><br><br>
                                  Merk <br><br>
                                <?= $rowsmobil["merk"]; ?> <br>

                              </div>
                              <div class="col">
                                  Tanggal Pinjam <br><br>
                                <?= $rows["tanggal_pinjam"]; ?> <br>

                              </div>
                              <div class="col">
                                  No Pol <br><br>
                                <?= $rows["no_pol"]; ?> <br>
                              </div>
                              <div class="col">
                                  Durasi <br><br>
                                <?= $rows["durasi"]; ?> <br>
                              </div>
                          </div>
                          <hr>
                          <h5>Pembayaran</h5><br>
                          <div class="row">
                              <div class="col">
                                  Biaya <br><br>
                                <?= $rows["biaya"]; ?> <br>
                              </div>
                              <div class="col">
                                  Status Bayar <br><br>
                                  <button type="button" class="btn btn-success"
                                          style="border-radius: 100px; width: 100px"><?= $rows["paid"]; ?></button>
                              </div>
                          </div>
                      </div>
                  <a href="" style="margin-top: 100px; margin-bottom: 50px">
                      <button class="btn btn-info">Ubah</button>
                  </a>
                  </div>
              <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<br>

<!--last content-->

<!--js with bootstrap-->
<!-- Optional JavaScript -->

<script src="../asset/js/jquery-3.4.1.slim.min.js"></script>
<script src="../asset/js/popper.min.js"></script>
<script src="../asset/js/bootstrap.min.js"></script>

</body>
</html>