<?php
session_start();

require "../../config/function_sewa.php";

$tipe = $_POST['tipe'];
$fasilitas = $_POST['facilities'];
$kapasitas = $_POST['kapasitas'];
$merk = $_POST['merk'];
$gambar = $_POST['gambar'];
$tgl = $_POST['Tanggal_sewa'];
$durasi = $_POST['durasi'];
$noPol = $_POST['no_pol'];
$tarif = $_POST['harga'];
$tarifSopir = $_POST['fasilitas'];

$hargasewa = $tarif * $durasi;
$tarifSopir = $tarifSopir * $durasi;

//membuat id otomatis
$id_transaksi = "SR";
$id_transaksi .= uniqid();
$id_transaksi = strtoupper($id_transaksi);

//proses inputan
if (isset($_POST['tambah'])) {
  if (tmbh_sewa($_POST) > 0) {
    echo "<script>
                alert('Terimakasih telah mempercayai kami.');
//                Document.location = '../../index.php';
                document.location = '../../index.php';
               </script>";
  } else {
    echo mysqli_error($con);
  }

}

// fungsi tampilkan data berdasarkan session
$user = $_SESSION["users"];

$costumer = query("SELECT * FROM costumer WHERE nama = '$user' ");

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
          |Condiment|Sedgwick+Ave+Display|Marck+Script|Faster+One|Aladin|Black+Ops+One&display=swap"
    >

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
    <nav class="navbar  bg-light" style="background-color: white;">
        <a class="navbar-brand" href="#"
           style="font-family:'Condiment', 'Marck Script', 'cursive'; font-size: 30px; margin-left: 100px;">
            <!-- SiRent -->
            <img src="../../asset/icon/1x/sirent_1.png" class="d-inline-block align-top" alt="" style="width: 150px;">
        </a>
        <ul class="nav" style="margin-right: 300px">

            <li class="nav-item" style="margin-left: 15px">
                <div style="background-color:#005cbf; width: 25px;border-radius: 100px; text-align: center; color: white">
                    2
                </div>
            </li>
            <li class="nav-item">
                <h6 class="font-weight-normal" style="margin-left: 5px; color:#005cbf"> Rincian data</h6>
            </li>

            <li class="nav-item" style="margin-left: 15px">
                <div style="background-color: #4e555b; width: 30px; height: 3px; margin-top: 10px; border-radius: 100px"></div>
            </li>

            <li class="nav-item" style="margin-left: 15px">
                <div style="background-color: #4e555b; width: 25px;border-radius: 100px; text-align: center; color: white">
                    2
                </div>
            </li>
            <li class="nav-item">
                <h6 class="font-weight-normal" style="margin-left: 5px"> Cetak struk</h6>
            </li>

        </ul>
    </nav>
</div>
<br>

<div class="container" style="margin-top: 50px; margin-bottom: 30px">
    <div class="row">

        <!-- sidebar kiri -->
      <?php foreach ($costumer as $rows) : ?>
          <div class="col-8">
              <form action="" method="post">
                  <br>
                  <h5 class="font-weight-bold">Data penyewa</h5>
                  <br>
                  <div class="card ShadowBox">
                      <div class="card-body">
                          <br>
                          <div class="row">
                              <div class="col">
                                  <div class="form-group">
                                      <label for="idtrans">Id Transakasi</label>
                                      <input type="text" class="form-control" id="idtrans" name="idtransaksi"
                                             placeholder="" value="<?= $id_transaksi; ?>" disabled>
                                  </div>
                              </div>
                              <div class="col">
                                  <div class="form-group">
                                      <label for="noKtp">No KTP <small
                                                  style="color: red; font-size: medium">*</small></label>
                                      <input type="text" class="form-control disabled" id="noKtp" placeholder=""
                                             name="ktp" disabled value="<?= $rows["No_Ktp"]; ?>">
                                  </div>
                              </div>
                          </div>
                          <br>
                          <br>
                          <div class="form-group">
                              <label for="nama">Nama lengkap penyewa <small
                                          style="color: red; font-size: medium">*</small></label>
                              <input type="text" class="form-control" id="nama" placeholder="" name="nama"
                                     value="<?= $rows["nama"]; ?>">
                          </div>
                          <br>
                          <br>
                          <div class="row">
                              <div class="col">
                                  <div class="form-group">
                                      <label for="kontak">No kontak penyewa <small
                                                  style="color: red; font-size: medium">*</small></label>
                                      <input type="text" class="form-control" id="kontak" placeholder="" name="kontak"
                                             value="<?= $rows["No_telp"]; ?>">
                                  </div>
                              </div>
                              <div class="col">
                                  <div class="form-group">
                                      <label for="email">Alamat email penyewa <small
                                                  style="color: red; font-size: medium">*</small></label>
                                      <input type="email" class="form-control" id="email" placeholder="" name="email"
                                             value="<?= $rows["E-mail"]; ?>">
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <br>
                  <br>
                  <h5 class="font-weight-bold">Rincian harga</h5>
                  <br>
                  <div class="card ShadowBox">
                      <div class="card-body">
                          <h5 class="font-weight-bold" style="margin-bottom: 15px"><?= $merk; ?></h5>
                          <div class="row">
                              <div class="col-9">
                                  <p class="font-weight-normal" style="font-size: 17px; margin-bottom: 15px">Harga sewa
                                      ( <?= $durasi ?> Hari )</p>
                                  <p class="font-weight-normal" style="font-size: 17px; margin-bottom: 15px">Harga
                                      penggunaan sopir ( <?= $durasi ?> Hari )</p>
                              </div>
                              <div class="col-3">
                                  <p class="font-weight-bold" style="font-size: 17px; margin-bottom: 15px">
                                      Rp <?= number_format($hargasewa, 1, ".", ".") ?>
                                  </p>
                                  <p class="font-weight-bold" style="font-size: 17px; margin-bottom: 15px">
                                      Rp <?= number_format($tarifSopir, 1, ".", ".") ?>
                                  </p>
                              </div>
                          </div>
                          <hr>
                          <br>
                          <div class="row">
                              <div class="col-9">
                                  <h5 class="font-weight-normal" style="margin-bottom: 15px">Total </h5>
                              </div>
                              <div class="col-3">
                                  <h5 class="font-weight-bold" style="margin-bottom: 15px">
                                      Rp <?= number_format($hargasewa + $tarifSopir, 1, ".", ".") ?>
                                      <input type="hidden" value="<?= $hargasewa + $tarifSopir; ?>" name="biaya">
                                      <input type="hidden" value="<?= $durasi; ?>" name="durasi">
                                      <input type="hidden" value="<?= $noPol; ?>" name="nopol">
                                      <input type="hidden" value="<?= $tgl; ?>" name="tgl">
                                      <input type="hidden" value="<?= $id_transaksi; ?>" name="idtr">
                                      <input type="hidden" value="<?= $rows['No_Ktp']; ?>" name="nktp">
                                  </h5>
                              </div>
                          </div>
                      </div>
                  </div>
                  <br>
                  <div class="row">
                      <div class="col-9">
                          <p class="font-weight-normal">
                              Dengan mengeklik tombol di bawah, Anda menyetujui Syarat dan Ketentuan serta Kebijakan
                              Privasi dari Sirent.
                          </p>
                      </div>
                      <div class="col-3">
                          <button type="submit" class="btn btn-warning btn-lg" style="width: 100%" name="tambah">
                              Lanjutkan
                          </button>
                      </div>
                  </div>
              </form>
          </div>
      <?php
      endforeach;
      ?>
        <!-- sidebar kanan -->
        <div class="col-4">
            <br>
            <h5 class="font-weight-bold"></h5>
            <br>
            <br>
            <div class="card ShadowBox">
                <div class="card-title">
                    <h5 class="font-weight-bold" style="margin-left: 10px; margin-top: 10px">Rincian penyewaan</h5>
                    <hr>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <!--                            <div class="card-img">-->
                            <img src="../../upload/imgmobil/<?= $gambar; ?>" class="card-img" alt="No Image"
                                 style="width: 100px; height: 100px; border-radius: 0px">
                            <!--                            </div>-->
                        </div>
                        <div class="col-7">
                            <h5 class="font-weight-normal"><?= $merk ?></h5>
                            <p class="font-weight-normal" style="margin-top: 15px"><?= $noPol; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5">
                            <p class="card-text" style="font-size: 11pt; margin-top: 15px">
                                <img src="../../asset/icon/peopleincar.png" alt=""
                                     style="width: 25px; margin-right: 5px">
                              <?= $kapasitas; ?> Orang
                            </p>
                        </div>
                        <div class="col-7">
                            <p class="card-text" style="font-size: 11pt; margin-top: 15px">
                                <img src="../../asset/icon/rental.png" alt="" style="width: 25px; margin-right: 5px">
                              <?= $fasilitas; ?>
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-5">
                            <p class="font-weight-normal" style="margin-top: 15px">Durasi</p>
                            <p class="font-weight-normal" style="margin-top: 15px">Tanggal sewa</p>
                            <p class="font-weight-normal" style="margin-top: 15px">Tanggal kembali</p>
                        </div>
                        <div class="col-7" style="text-align: right">
                            <p class="font-weight-bold" style="margin-top: 15px"><?= $durasi; ?> Hari</p>
                            <p class="font-weight-bold" style="margin-top: 15px"><?= $tgl; ?></p>
                            <p class="font-weight-bold" style="margin-top: 15px"><?= $tgl; ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-5">
                            <p class="font-weight-normal" style="margin-top: 15px">Type</p>
                        </div>
                        <div class="col-7" style="text-align: right">
                            <p class="font-weight-bold" style="margin-top: 15px"><?= $tipe; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                <form>
                    <div class="form-group">
                        <label for="formGroupExampleInput" style="color: rgb(51, 51, 51);">Nama atau
                            no. Telpon</label>
                        <input type="text" class="form-control" id="formGroupExampleInput">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2" style="color: rgb(51, 51, 51);">Password</label>
                        <input type="text" class="form-control" id="formGroupExampleInput2">
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <button type="button" class="btn btn-primary" style="width: 100%;">Log
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