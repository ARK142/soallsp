<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "tokonline";

$conn = mysqli_connect($host, $user, $password, $database);
if (!$conn) {
    die("koneksi gagal;" . mysqli_connect_error());
}
echo "koneki berhasil";
