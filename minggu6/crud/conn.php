<?php
$engi = "mysql";
$host = "localhost";
$dbse = "crud_pdo";
$user = "root";
$pass = "";
$koneksi = new PDO($engi . ':dbname=' . $dbse . ";host=" . $host, $user, $pass);
$connect = mysqli_connect($host, $user, $pass, $dbse) or die('koneksi gagal');
