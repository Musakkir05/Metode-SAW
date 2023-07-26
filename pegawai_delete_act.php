<?php
session_start();
require_once('connect/conn.php');
$id = $_GET['id'];
var_dump($id);
$q = mysqli_query($conn, "DELETE FROM users WHERE id = '$id'");
if ($q) {
    $_SESSION['message'] = 'Data berhasil terhapus';
    echo "<script>location='pegawai.php'</script>";
}
