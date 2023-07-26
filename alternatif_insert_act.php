<?php
session_start();
require_once('connect/conn.php');
$nama = $_POST['nama'];
$stambuk = $_POST['stambuk'];
$email = $_POST['email'];
$contact = $_POST['contact'];

$q = mysqli_query($conn, "SELECT * FROM alternatif WHERE stambuk = '$stambuk'");


if (mysqli_fetch_row($q) == true) {
    $_SESSION['message'] = 'Data Sudah Ada';
    header('location:alternatif.php');
    die;
}

$q = mysqli_query($conn, "INSERT INTO alternatif VALUES('','$nama','$stambuk','$email','$contact','','')");

if ($q == true) {
    $_SESSION['message'] = 'Data berhasil tersimpan';
    header('location:alternatif.php');
}
