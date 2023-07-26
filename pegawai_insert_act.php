<?php
session_start();
require_once('connect/conn.php');
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];

$hashpassword = password_hash($password, PASSWORD_DEFAULT);

$q = mysqli_query($conn, "INSERT INTO users VALUES('','$nama','$username','$hashpassword','$role')");
if ($q) {
    $_SESSION['message'] = 'Data berhasil tersimpan';
    echo "<script>location='pegawai.php'</script>";
}
