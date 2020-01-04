<?php
require "../../config/function_pengembalian.php";
require "../log_session.php";
//require "../../config/fungsi_mitra";

$mobil = query("SELECT * FROM mobil");

$kembali = query("SELECT * FROM pengembalian");



?>

<?php

if (isset($_POST['simpan'])) {
  if (tambahmobil($_POST) > 0) {
    echo "<script>
                alert('selamat anda sudah terdaftarkan sebagai member.');
               </script>";
    header("Location:dtmobil.php");
  } else {
    echo mysqli_error($con);
  }
}

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
                <a class="nav-item nav-link" href="mitra.php">Data Mitra</a>
                <a class="nav-item nav-link" href="pemesanan.php">Data Pemesanan</a>
                <a class="nav-item nav-link" href="pengembalian.php">Data Pengembalian</a>
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
                 aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Data baru</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                <small>Form dengan tanda <small style="color: red">*</small> wajib diisi</small><br>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Pilih Mitra :</label>
                                    <small style="color: red">*</small>
                                    <select class="form-control" id="exampleFormControlSelect1" name="idmitra">
                                        <option>Pilih mitra</option>
                                      <?php foreach ($mitra as $rowMitra) : ?>
                                          <option value="<?= $rowMitra['id_mitra'] ?>"><?= $rowMitra['Nama'] ?></option>
                                      <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">No Polisi :</label>
                                    <small style="color: red">*</small>
                                    <input type="text" class="form-control" id="recipient-name" name="nopol"
                                           placeholder="Nopol">
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="col-form-label">Merk Mobil :</label>
                                    <small style="color: red">*</small>
                                    <input type="text" class="form-control" id="recipient-name" name="merk"
                                           placeholder="merk">
                                </div>
                                <div class="form-group">
                                    <label for="tipe" class="col-form-label">Type Mobil :</label>
                                    <small style="color: red">*</small>
                                    <select class="form-control" name="tipe" id="tipe">
                                        <option value="Coupe">Coupe</option>
                                        <option value="Convertible">Convertible</option>
                                        <option value="Minivan">Minivan</option>
                                        <option value="Sedan">Sedan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Kapasitas Penumpang :</label>
                                    <small style="color: red">*</small>
                                    <input type="number" class="form-control" id="recipient-name" name="kapasitas"
                                           placeholder="kapasitas">
                                </div>
                                <div class="form-group">
                                    <label for="fasilitas" class="col-form-label">Ketgori Penyewaan :</label>
                                    <small style="color: red">*</small>
                                    <select name="fasilitas" class="form-control" id="fasilitas">
                                        <option value="">Pilih Kategori Penyewaan</option>
                                        <option value="Dengan sopir">Dengan Sopir</option>
                                        <option value="Lepas Kunci">Lepas Kunci</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Tarif / Hari :</label>
                                    <small style="color: red">*</small>
                                    <input type="number" class="form-control" id="recipient-name" name="tarif"
                                           placeholder="tarif">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Ketersediaan Mobil :</label>
                                    <small style="color: red">*</small>
                                    <input type="number" class="form-control" id="recipient-name" name="stok"
                                           placeholder="Stok">
                                </div>
                                <div class="form-group">
                                    <input type="file" name="gambar" placeholder="Pilih file"
                                           style="height: 50px; width: 100%">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
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
            <tr style="text-transform: uppercase">
                <th scope="col">ID Pengembalian</th>
                <th scope="col">ID Transaksi</th>
                <th scope="col">No Pol</th>
                <th scope="col">Tgl Kembali</th>
                <th scope="col">Lama Pengembalian</th>
                <th scope="col">denda</th>
                <th scope="col">Total Bayar</th>
                <th scope="col">Aksi</th>
            </tr>
            </thead>

          <?php foreach ($kembali as $row) : ?>
              <tbody>
              <tr>
                  <td scope="col"><?= $row["Id_kembali"]; ?></td>
                  <td scope="col"><?= $row['Id_transaksi']; ?></td>
                  <td scope="col"><?= $row["nopol"]; ?></td>
                  <td scope="col"><?= $row["tgl_kembali"]; ?></td>
                  <td scope="col"><?= $row["lama_pengembalian"]; ?></td>
                  <td scope="col"><?= $row["denda"]; ?></td>
                  <td scope="col"><?= $row["Total_bayar"]; ?></td>
                  <td scope="col">
                      <button type="button" class="btn btn-warning">Ubah</button>
                      <button type="button" class="btn btn-danger">Hapus</button>
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