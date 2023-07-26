<?php
require_once('connect/conn.php');
$q = mysqli_query($conn, "SELECT bobot FROM kriteria ORDER BY id_kriteria");
$i = 0;
$W = array();
while ($data = mysqli_fetch_assoc($q)) {
    $W[] = $data['bobot'];
}
