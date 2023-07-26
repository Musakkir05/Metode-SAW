<?php
session_start();
require_once('connect/conn.php');
$id = $_POST['id'];
$nama = $_POST['nama'];
$bobot = $_POST['bobot'];
$atribut = $_POST['atribut'];

$q = mysqli_query($conn, "UPDATE kriteria SET nama='$nama',bobot='$bobot',atribut ='$atribut' WHERE id_kriteria='$id' ");

if ($q) {
    $_SESSION['message'] = 'Data berhasil diedit';
    header('location:kriteria.php');
}
