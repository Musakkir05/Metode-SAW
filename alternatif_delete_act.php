<?php
require_once('connect/conn.php');
$id = $_GET['id'];

$q = mysqli_query($conn, "DELETE FROM alternatif WHERE id_alternatif = '$id'");
mysqli_query($conn, "DELETE FROM rangking WHERE id_alternatif = '$id'");
if ($q) {
    echo "<script>location='pegawai.php'</script>";
    header('location:alternatif.php');
}
