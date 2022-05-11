
<?php
session_start(); //memulai session
include "conn.php"; //mengambil isian username dan password dari form

$username = $_POST['username'];
// $password = md5($_POST['password']);
$password = ($_POST['password']);
//query untuk mengambil data user dari database sesuai dengan username inputan form


$login = mysqli_query($connect, "SELECT * FROM tb_user WHERE username = '$username' ");
$data = mysqli_fetch_array($login);
//cek kesesuaian password masukan dengan database

if ($data['username'] == $username and $data['password'] == $password) { //menyimpan tipe user dan username dalam session

    $_SESSION['username'] = $data['username'];
    $_SESSION['password'] = $data['password'];
    $_SESSION['nama'] = $data['nama'];
    $_SESSION['hak'] = $data['hak'];

    include "index.php";
}
//jika password tidak sesuai
else {
    $warning = "Username / Password Salah";
    // echo $warning;
    echo " 
	<script>
		alert('Wrong Username / Password ');
		location.href='login.php';
    </script>";
    // echo "<input class='btn btn-blue' type=button value='ULANGI LAGI' onclick=location.href='../login/login.php'></a></center>";
}
?>