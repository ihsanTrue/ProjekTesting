<?php
session_start();
require "../config/function_login.php";

if (isset($_SESSION['admin'])) {
  echo "<script language = 'JavaScript'>
    document.location = 'Home.php';
    </script>";
}

if (isset($_POST['login'])) {

  $username = $_POST['username'];
  $password = $_POST['pass'];
//
  $login = loginadm($username, $password);

  $result = mysqli_query($con, "SELECT * FROM `admin` WHERE username = '$username'");


  $rows = mysqli_fetch_assoc($result);

  if ($login === $rows['username']) {


    $_SESSION["admin"] = $login;

    echo "<script language = 'JavaScript'>
    alert('Selamat Datang');
    document.location = 'Home.php';
    </script>";


  }


}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin | Sirent</title>

    <link rel="stylesheet" href="asset/bootsrap/bootstrap.min.css">
    <link rel="stylesheet" href="asset/css/style.css">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-lg">
            <img src="asset/icon/sirent_1.png" alt="" class="img-brand">
            <form action="" method="post">
                <div class="form-group">
                    <input type="text" class="form-control txt-input" id="exampleInputEmail1"
                           aria-describedby="emailHelp"
                           placeholder="Username" name="username">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control txt-input" id="exampleInputPassword1"
                           placeholder="Password" name="pass">
                </div>
                <button type="submit" class="btn btn-primary btn-login" name="login">Login</button>
            </form>
        </div>
    </div>
</div>


<script type="text/javascript">
    function preventBack() {
        window.history.forward();
    }

    setTimeout("preventBack()", 0);
    window.onunload = function () {
        null
    };
</script>

<script src="asset/js/bootstrap.min.js"></script>
<script src="asset/js/jquery-3.3.1.slim.min.js"></script>
<script src="asset/js/popper.min.js"></script>
</body>
</html>