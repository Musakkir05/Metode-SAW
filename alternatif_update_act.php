<?php
require_once('connect/conn.php');
$id = $_POST['id'];
$nama  = $_POST['nama'];
$stambuk  = $_POST['stambuk'];
$email = $_POST['email'];
$contact  = $_POST['contact'];

$q = mysqli_query($conn, "UPDATE alternatif SET nama='$nama',stambuk='$stambuk',email='$email',no_hp='$contact' WHERE id_alternatif = '$id'");

if ($q) {
    $_SESSION['message'] = 'Data berhasil tersimpan';
    header('location:alternatif.php');
}
