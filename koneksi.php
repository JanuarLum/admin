<?php
$namaserver = "localhost";
$username = "root";
$password = "";
$namadb = "web22";

$koneksi = mysqli_connect($namaserver, $username, $password, $namadb);

if (!$koneksi) {
    die ("Gagal melakukan koneksi ke daatabase. " . mysqli_connect_error());
}
?>