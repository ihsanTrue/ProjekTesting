<?php

require "../log_session.php";
require "../../config/fungsi_mitra";

$mitra = query("SELECT * FROM mitra");

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
        <!-- Large modal -->
        <div class="col">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                    data-whatever="@getbootstrap">Tambah Data
            </button>

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true" >
                <div class="modal-dialog" role="document">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Mitra Baru</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Nama</label>
                                    <input type="text" class="form-control" id="recipient-name" name="nama" placeholder="Nama">
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="col-form-label">Alamat</label>
                                    <textarea class="form-control" id="message-text" name="alamat" placeholder="alamat"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">No Telp</label>
                                    <input type="number" class="form-control" id="recipient-name" name="notelp" placeholder="No telp">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Foto</label>
                                    <input type="email" class="form-control" id="recipient-name" name="email"
                                           placeholder="email">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Email</label>
                                    <input type="file" class="form-control" id="recipient-name" name="foto"
                                           placeholder="foto">
                                </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Send message</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--    last large modal-->
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
                <th scope="col">No</th>
                <th scope="col">ID</th>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">No Telp</th>
                <th scope="col">E-Mail</th>
                <th scope="col">Foto</th>
            </tr>
            </thead>

            <tbody>
            <?php foreach ($mitra as $row) : ?>
                <tr>
                    <td scope="col">No</td>
                    <td scope="col"><?= $row['id_mitra']; ?></td>
                    <td scope="col"><?= $row["Nama"]; ?></td>
                    <td scope="col"><?= $row["Alamat"]; ?></td>
                    <td scope="col"><?= $row["No_telp"]; ?></td>
                    <td scope="col"><?= $row["email"]; ?></td>
                    <td scope="col">
                        <img src="../../upload/imgmitra/<?= $row['img']; ?>" class="card-img" alt="No Image"
                             style="width: 10rem; margin-left: 5px; margin-top: 20px">
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