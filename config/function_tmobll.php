<?php


require "connec.php";

function query($tampil)
{
  global $con;

  $result = mysqli_query($con, $tampil);
  $rows = [];

  while ($row = mysqli_fetch_assoc($result)) {

    $rows[] = $row;
  }

  return $rows;
}

function cari($keyword)
{
  if (strlen($keyword) == 0) {
    echo "<script language = 'JavaScript'>
                alert('data yg dicari tidak ada');
                document.location = 'tmobil.php?Tanggal_sewa=11%2F30%2F2019&durasi=1&Tanggal_kembali=12%2F1%2F2019&cari=';
             </script>";
  }
  if ($_POST['opsi'] == "harga") {
    $sql = "SELECT * FROM mobil WHERE tarif <= $keyword
             ";
    $_GET['opsi'] = "harga";
  } elseif ($_POST['opsi'] == "type") {
    $sql = "SELECT * FROM mobil
                    WHERE
                    tipe LIKE '%$keyword%'
             ";
    $_GET['opsi'] = "type";
  } else {
    echo "<script language = 'JavaScript'>
                alert('data tidak di temukan');
                document.location = 'tmobil.php?Tanggal_sewa=11%2F30%2F2019&durasi=1&Tanggal_kembali=12%2F1%2F2019&cari=';
             </script>";
  }


  return query($sql);

}

function tambahmobil($data)
{

  global $con;

  $nopol = $data['nopol'];
  $idMitra = $data['idmitra'];
  $merk = $data['merk'];
  $tipe = $data['tipe'];
  $kapasitas = $data['kapasitas'];
  $fasiliti = $data['fasilitas'];
  $tarif = $data['tarif'];
  $stok = $data['stok'];
  $gambar =upload();

  mysqli_query($con, "INSERT INTO mobil 
                                VALUES 
                                ('$nopol','$idMitra','$merk','$tipe','$gambar','$kapasitas','$fasiliti','$tarif','$stok')
                            ");

  return mysqli_affected_rows($con);

}

function upload () {

  $namaGambar = $_FILES['gambar']['name'];
  $size = $_FILES['gambar']['size'];
//  $error = $_FILES['gambar']['error'];
  $tmp = $_FILES['gambar']['tmp_name'];

  //cek upload file ada atu tidak ada


  // cek jenis file gambar atau bukan
  $formatGambar = ['jpg','jpeg','png'];
  $format = explode('.', $namaGambar);
  $format = strtolower(end($format));

  if ( !in_array($format,$formatGambar) ){

    echo "<script>
                alert('format gambar tidak di bolehkan!');
               </script>";

    return false;

  }

  // cek size gambar

  if ($size > 3000000){

    echo "<script>
                alert('ukuran gambar terlalu besar!');
               </script>";

    return false;

  }

  $newImageName = uniqid();
  $newImageName .= '.';
  $newImageName .=  $format;
  $folder ='../../upload/imgmobil/';

  move_uploaded_file($tmp, $folder. $newImageName);

  return $newImageName;

}