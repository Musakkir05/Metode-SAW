<?php
require_once('connect/conn.php');
$id = $_POST['id'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$role = $_POST['role'];


$q = mysqli_query($conn, "UPDATE users SET name='$nama',username='$username',role='$role' WHERE id = '$id'");

if ($q) {
    $_SESSION['message'] = 'Data berhasil berubah';
    echo "<script>location='pegawai.php'</script>";
}
