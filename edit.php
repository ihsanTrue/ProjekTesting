<?php
// include database connection file
include_once("connec.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{   
    
    $id_mitra = $_POST['id_mitra'];
    $no_pol=$_POST['no_pol'];
    $merk=$_POST['merk'];
    $tipe=$_POST['tipe'];
    $kapasitas=$_POST['kapasitas'];
    $fasilitas=$_POST['fasilitas'];
    $tarif=$_POST['tarif'];
    $stok=$_POST['stok'];


    // update user data
    $result = mysqli_query($mysqli, "UPDATE mobil SET id_mitra='$id_mitra',merk='$merk',tipe='$tipe',kapasitas='$kapasitas',fasilitas='$fasilitas',tarif='$tarif',stok='$stok' WHERE no_pol=$no_pol");

    // Redirect to homepage to display updated user in list
    header("Location: dtmobil.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$no_pol = $_GET['no_pol'];

// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM mobil WHERE no_pol=$no_pol");

while($user_data = mysqli_fetch_array($result))
{

    $id_mitra = $user_data['id_mitra'];
    $no_pol=$user_data['no_pol'];
    $merk=$user_data['merk'];
    $tipe=$user_data['tipe'];
    $kapasitas=$user_data['kapasitas'];
    $fasilitas=$user_data['fasilitas'];
    $tarif=$user_data['tarif'];
    $stok=$user_data['stok'];


}
?>
<html>
<head>  
    <title>Edit User Data</title>
</head>

<body>
    <a href="dtmobil.php">Data Mobil</a>
    <br/><br/>

    <form name="update_user" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>ID</td>
                <td><input type="text" name="name" value=<?php echo $name;?>></td>
            </tr>
            <tr> 
                <td>Email</td>
                <td><input type="text" name="email" value=<?php echo $email;?>></td>
            </tr>
            <tr> 
                <td>Mobile</td>
                <td><input type="text" name="mobile" value=<?php echo $mobile;?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
