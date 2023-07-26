<?php
require_once('connect/conn.php');
$id_alternatif = $_POST['id_alternatif'];
$value = $_POST['value'];

$q = mysqli_query($conn, "SELECT * FROM kriteria");

foreach ($value as $bobot) {

    $data_kriteria = mysqli_fetch_assoc($q);

    $id_kriteria = $data_kriteria['id_kriteria'];
    $update = mysqli_query($conn, "UPDATE rangking SET value = '$bobot' WHERE id_alternatif = '$id_alternatif' AND id_kriteria = '$id_kriteria'");
}

$_SESSION['message'] = 'Data Berhasil Diubah';
header('location:matriks.php');
