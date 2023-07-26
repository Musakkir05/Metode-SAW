<?php
require_once('connect/conn.php');
$id = $_GET['id'];

$q = mysqli_query($conn, "DELETE FROM kriteria WHERE id_kriteria = '$id'");

if ($q) {
    header('location:kriteria.php');
}
