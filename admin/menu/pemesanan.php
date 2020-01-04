<?php

require "../log_session.php";
require "../../config/function_sewa.php";

$pemesanan = query("SELECT * FROM penyewaan");

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
<br>
<br>
<br>
<div class="container-fluid">
    <div class="row">
        <!--        search-->
        <div class="col">
            <form action="">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Recipient's username"
                           aria-label="Cari id atau nama mitra" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2">
                            <img src="../asset/icon/search.png" alt="" style="width: 20px;">
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <!--        last search-->
    </div>

    <br>
    <!--    tabel content-->
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID Transaksi</th>
                <th scope="col">No Ktp</th>
                <th scope="col">Tanggal Pinjam</th>
                <th scope="col">Durasi</th>
                <th scope="col">No Pol</th>
                <th scope="col">Biaya</th>
                <th scope="col">Satatus Bayar</th>
                <th scope="col">Action</th>
            </tr>
            </thead>

            <tbody>
            <?php foreach ($pemesanan as $row) : ?>
                <tr>
                    <td scope="col"><?= $row['id_transaksi']; ?></td>
                    <td scope="col"><?= $row["No_ktp"]; ?></td>
                    <td scope="col"><?= $row["tanggal_pinjam"]; ?></td>
                    <td scope="col"><?= $row["durasi"]; ?></td>
                    <td scope="col"><?= $row["no_pol"]; ?></td>
                    <td scope="col">Rp. <?= number_format($row["biaya"], 0, ".", "."); ?></td>
                    <td scope="col"><?= $row["paid"]; ?></td>
                    <td scope="col">
                        <a href="dtl_pemesanan.php?key=<?= $row['id_transaksi']; ?>&nopol=<?= $row["no_pol"]; ?>">
                            <button type="button" class="btn btn-info">Lihat Detail</button>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>

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