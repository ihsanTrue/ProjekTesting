<?php

require "../config/connec.php";
require "log_session.php";

$result_costumer = mysqli_query($con, "SELECT * FROM costumer");
$result_mitra = mysqli_query($con, "SELECT * FROM mitra");
$result_penyewaan = mysqli_query($con, "SELECT * FROM penyewaan");
$result_mobil = mysqli_query($con, "SELECT * FROM mobil");

$costumer = mysqli_num_rows($result_costumer);
$mitra= mysqli_num_rows($result_mitra);
$penyewaan = mysqli_num_rows($result_penyewaan);
$mobil = mysqli_num_rows($result_mobil);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin | Sirent</title>

    <!--    css with bootstrap-->
    <link rel="stylesheet" href="asset/bootsrap/bootstrap.min.css">
    <link rel="stylesheet" href="asset/css/style-min.css">
</head>
<body>
<!--navs-->
<div class="container-fluid">
    <br>
    <ul class="nav justify-content-end">
        <a class="navbar-brand mr-auto" href="#"><img src="asset/icon/sirent_1.png" alt="" style="width: 150px"></a>
        <!--        <li class="nav-item">-->


        <div class="btn-group">
            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false" style="text-transform: uppercase">
                <img src="asset/icon/user.png" alt="" style="width: 40px; margin-right: 15px">
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
                <a class="nav-item nav-link" href="menu/dtmobil.php">Data Mobil</a>
                <a class="nav-item nav-link" href="menu/mitra.php">Data Mitra</a>
                <a class="nav-item nav-link" href="menu/pemesanan.php">Data Pemesanan</a>
                <a class="nav-item nav-link" href="menu/pengembalian.php">Data Pengembalian</a>
                <a class="nav-item nav-link" href="menu/costumer.php">Data Costumer</a>
            </div>
        </div>
    </div>
</nav>
<hr>
<!--last navbar-->

<!--content-->
<div class="container-fluid" style="width: 90%">
    <!--    row information-->
    <div class="row">
        <div class="col-lg bg-success">
            <h6>Total Costumer</h6>
            <h4><?= $costumer ?> user</h4>
        </div>
        <div class="col-lg bg-primary">
            <h6>Total Mitra</h6>
            <h4>
                <?= $mitra ?>
                user
            </h4>
        </div>
        <div class="col-lg bg-danger">
            <h6>Total Penyewaan</h6>
            <h4><?= $penyewaan ?> user</h4>
        </div>
        <div class="col-lg bg-warning">
            <h6>Total Mobil</h6>
            <h4><?= $mobil ?> Unit</h4>
        </div>
    </div>
    <!--    last row information-->

    <!--    row content-->
    <div class="row">
        <div class="col-lg col-lg-8">
            <h5>New order</h5>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-lg">
            <h5>Inbox</h5>
        </div>
    </div>
    <!--    last row content-->

    <!--    statistik penyewaan-->
    <div class="row">
        <div class="col-lg">
            <h5>Satatistik Penyewaan</h5>
        </div>
    </div>
    <!--    last statistik penyewaan-->
</div>
<!--last content-->

<!--js with bootstrap-->
<!-- Optional JavaScript -->

<script src="asset/js/jquery-3.4.1.slim.min.js"></script>
<script src="asset/js/popper.min.js"></script>
<script src="asset/js/bootstrap.min.js"></script>




</body>
</html>