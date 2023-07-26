<?php
require_once('connect/conn.php');
$id_alternatif = $_POST['alternatif'];
$value = $_POST['value'];

$q = mysqli_query($conn, "SELECT * FROM alternatif WHERE id_alternatif = '$id_alternatif'");

if (mysqli_fetch_row($q) == true) {
    $_SESSION['message'] = 'Data Sudah Ada';
    header('location:matriks.php');
}

$q = mysqli_query($conn, "SELECT * FROM kriteria");

foreach ($value as $bobot) {

    $data_kriteria = mysqli_fetch_assoc($q);

    $id_kriteria = $data_kriteria['id_kriteria'];
    $update = mysqli_query($conn, "INSERT INTO rangking VALUES ('$id_alternatif','$id_kriteria','$bobot')");
}

$_SESSION['message'] = 'Data Berhasil Ditambahkan';
header('location:matriks.php');
