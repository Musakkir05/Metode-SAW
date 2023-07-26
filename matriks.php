<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require_once('connect/conn.php');
if (!isset($_SESSION['nama'])) {
    header('location:login.php');
}
$title = 'Matriks';
include('layout/head.php');
?>

<body>
    <div id="app">
        <?php include('layout/sidebar.php') ?>
        <div id="main" class='layout-navbar'>
            <?php include('layout/navbar.php') ?>
            <div id="main-content" class="pt-0">
                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-last">
                                <h3></h3>
                            </div>
                        </div>
                    </div>
                    <section class="section">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Matriks</h4>
                            </div>
                            <div class="card-body">
                                <?php if (isset($_SESSION['message'])) :  ?>
                                    <div id="alert" class="alert alert-success alert-dismissible show fade">
                                        <?= $_SESSION['message'] ?>
                                    </div>
                                <?php unset($_SESSION['message']);
                                endif; ?>
                                <div class="button">
                                    <a href="matriks_insert.php" class="btn btn-success">Tambah Data</a>
                                </div>
                                <br>
                                <h6>Matrik keputusan</h6>
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">
                                        <thead>
                                            <tr>
                                                <th class="text-center" rowspan="2">Alternatif</th>
                                                <th class="text-center" colspan="3">Kriteria </th>
                                                <th rowspan="2" class="text-center">Aksi</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center">SKS</th>
                                                <th class="text-center">IPK</th>
                                                <th class="text-center">Lama Studi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $q = mysqli_query($conn, "SELECT
                                            a.id_alternatif, b.nama, 
                                            SUM(IF(a.id_kriteria=8,a.value,0)) AS C1, 
                                            SUM(IF(a.id_kriteria=9,a.value,0)) AS C2, 
                                            SUM(IF(a.id_kriteria=10,a.value,0)) AS C3 
                                            FROM rangking a 
                                            JOIN alternatif b USING(id_alternatif) 
                                            GROUP BY a.id_alternatif 
                                            ORDER BY a.id_alternatif");
                                            $X = array(1 => array(), 2 => array(), 3 => array());
                                            $no = 1;

                                            while ($data = mysqli_fetch_assoc($q)) :
                                                array_push($X[1], round($data['C1'], 2));
                                                array_push($X[2], round($data['C2'], 2));
                                                array_push($X[3], round($data['C3'], 2));

                                            ?>

                                                <tr>
                                                    <td class="text-center"><?= $data['nama']  ?></td>
                                                    <td class="text-center"><?= round($data['C1'], 2)  ?></td>
                                                    <td class="text-center"><?= round($data['C2'], 2)  ?></td>
                                                    <td class="text-center"><?= round($data['C3'], 2)  ?></td>

                                                    <td class="text-center">
                                                        <a href="matriks_update.php?id=<?= $data['id_alternatif']  ?>" class="btn btn-info">Edit</a>
                                                        <a href="matriks_delete_act.php?id=<?= $data['id_alternatif']  ?>" class="btn btn-danger">Hapus</a>
                                                    </td>
                                                </tr>
                                            <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <br>
                                <h6>Matrik ternormalisasi</h6>
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">
                                        <thead>
                                            <tr>
                                                <th class="text-center" rowspan="2">Alternatif</th>
                                                <th class="text-center" colspan="3">Kriteria </th>
                                            </tr>
                                            <tr>
                                                <th class="text-center">SKS</th>
                                                <th class="text-center">IPK</th>
                                                <th class="text-center">Lama Studi</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $q = mysqli_query($conn, "SELECT
                                             a.id_alternatif,
                                            b.nama AS nama_alternatif,
                                                c.atribut as atribut,
                                            SUM(
                                              IF(
                                                a.id_kriteria=8,
                                                IF(
                                                    atribut='benefit',
                                                  a.value/" . max($X[1]) . ",
                                                  " . min($X[1]) . "/a.value),
                                              0)
                                            ) AS C1,
                                            SUM(
                                              IF(
                                                a.id_kriteria=9,
                                                IF(
                                                    atribut='benefit',
                                                  a.value/" . max($X[2]) . ",
                                                  " . min($X[2]) . "/a.value),
                                              0)
                                            ) AS C2,
                                            SUM(
                                              IF(
                                                a.id_kriteria=10,
                                                IF(
                                                    atribut='benefit',
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

                                            while ($data = mysqli_fetch_assoc($q)) : ?>
                                                <tr>
                                                    <td class="text-center"><?= $data['nama_alternatif'] ?></td>
                                                    <td class="text-center"><?= round($data['C1'], 2) ?></td>
                                                    <td class="text-center"><?= round($data['C2'], 2) ?></td>
                                                    <td class="text-center"><?= round($data['C3'], 2) ?></td>

                                                </tr>
                                            <?php endwhile ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </section>
                </div>
                <?php include('layout/footer.php') ?>
            </div>
        </div>
    </div>
</body>
<?php include('layout/js.php') ?>

</html>