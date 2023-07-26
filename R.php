<?php
require_once('connect/conn.php');
$q = "SELECT a.id_alternatif, b.nama, SUM(IF(a.id_kriteria=8,a.value,0)) AS C1, SUM(IF(a.id_kriteria=9,a.value,0)) AS C2, SUM(IF(a.id_kriteria=10,a.value,0)) AS C3 FROM rangking a JOIN alternatif b USING(id_alternatif) GROUP BY a.id_alternatif ORDER BY a.id_alternatif";
$q = mysqli_query($conn, $q);
$X = array(1 => array(), 2 => array(), 3 => array());
while ($data = mysqli_fetch_assoc($q)) {
  array_push($X[1], round($data['C1'], 2));
  array_push($X[2], round($data['C2'], 2));
  array_push($X[3], round($data['C3'], 2));
}

$q = mysqli_query($conn, "SELECT
                                            a.id_alternatif,
                                            b.nama AS nama_alternatif,
                                            SUM(
                                              IF(
                                                a.id_kriteria=8,
                                                IF(
                                                  c.atribut='benefit',
                                                  a.value/" . max($X[1]) . ",
                                                  " . min($X[1]) . "/a.value),
                                              0)
                                            ) AS C1,
                                            SUM(
                                              IF(
                                                a.id_kriteria=9,
                                                IF(
                                                  c.atribut='benefit',
                                                  a.value/" . max($X[2]) . ",
                                                  " . min($X[2]) . "/a.value),
                                              0)
                                            ) AS C2,
                                            SUM(
                                              IF(
                                                a.id_kriteria=10,
                                                IF(
                                                  c.atribut='benefit',
                                                  a.value/" . max($X[3]) . ",
                                                  " . min($X[3]) . "/a.value),
                                              0)
                                            ) AS C3
                                          FROM
                                            rangking a
                                            JOIN kriteria c USING(id_kriteria)
                                            JOIN alternatif b ON a.id_alternatif = b.id_alternatif
                                          GROUP BY a.id_alternatif
                                          ORDER BY a.id_alternatif");

$R = array();
while ($data = mysqli_fetch_assoc($q)) {
  $R[$data['id_alternatif']] = array($data['C1'], $data['C2'], $data['C3']);
}
