<?php
require "../log_session.php";
require "../../config/fungsi_mitra";

$costumer = query("SELECT * FROM costumer");

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
                <a class="dropdown-item" href="menu/logout.php">Log Out</a>
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
                <a class="nav-item nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="dtmobil.php">Data Mobil</a>
                <a class="nav-item nav-link" href="mitra.php">Data Mitra</a>
                <a class="nav-item nav-link" href="">Data Pemesanan</a>
                <a class="nav-item nav-link" href="">Data Pengembalian</a>
                <a class="nav-item nav-link" href="costumer.php">Data Costumer</a>
            </div>
        </div>
    </div>
</nav>
<hr>
<!--last navbar-->

<!--content-->
<br>
<br>
<br>
<div class="container-fluid">
    <br>
    <!--    tabel content-->
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">No Ktp</th>
                <th scope="col">No telp</th>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">E-Mail</th>
                <th scope="col">Foto</th>
            </tr>
            </thead>
          <?php foreach ($costumer as $row) : ?>
              <tbody>
              <tr>
                  <td scope="col"></td>
                  <td scope="col"><?= $row['No_Ktp'] ?></td>
                  <td scope="col"><?= $row['No_telp'] ?></td>
                  <td scope="col"><?= $row['nama'] ?></td>
                  <td scope="col"><?= $row['alamat'] ?></td>
                  <td scope="col"><?= $row['E-mail'] ?></td>
                  <td scope="col">
                      <img src="../../upload/regfoto/<?= $row['gambar'] ?>" class="card-img" alt="No Image"
                           style="width: 10rem; margin-left: 5px; margin-top: 20px">
                    </td>
              </tr>
              </tbody>
          <?php endforeach; ?>
        </table>
    </div>
    <!--    last tabel content-->
</div>
<!--last content-->

<!--js with bootstrap-->
<!-- Optional JavaScript -->

<script src="../asset/js/jquery-3.4.1.slim.min.js"></script>
<script src="../asset/js/popper.min.js"></script>
<script src="../asset/js/bootstrap.min.js"></script>


</body>
</html>