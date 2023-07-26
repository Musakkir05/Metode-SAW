<?php
require_once('connect/conn.php');
$id = $_GET['id'];

$q = mysqli_query($conn, "DELETE FROM rangking WHERE id_alternatif = '$id'");
mysqli_query($conn, "UPDATE alternatif SET nilai=NULL,ket=NULL WHERE id_alternatif='$id'");

if ($q) {
    header('location:matriks.php');
}
