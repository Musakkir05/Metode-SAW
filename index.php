<!DOCTYPE html>
<html lang="en">
<?php
require_once "connect/conn.php";
session_start();
if (!isset($_SESSION['nama'])) {
    header('location:login.php');
}

$title = 'Dashboard';
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

                            <div class="card-body">
                                <section class="row">
                                    <div class="col-6 col-lg-4 col-md-6">
                                        <div class="card">
                                            <div class="card-body px-3 py-4-5">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="stats-icon purple">
                                                            <i class="iconly-boldDocument"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <h6 class="text-muted font-semibold">Kriteria</h6>
                                                        <?php
                                                        $q = mysqli_query($conn, "SELECT * FROM kriteria");
                                                        $row = mysqli_num_rows($q);
                                                        ?>
                                                        <h6 class="font-extrabold mb-0"><?= $row ?></h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-4 col-md-6">
                                        <div class="card">
                                            <div class="card-body px-3 py-4-5">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="stats-icon blue">
                                                            <i class="iconly-boldUser"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <h6 class="text-muted font-semibold">Mahasiswa</h6>
                                                        <?php
                                                        $q = mysqli_query($conn, "SELECT * FROM alternatif");
                                                        $row = mysqli_num_rows($q);
                                                        ?>
                                                        <h6 class="font-extrabold mb-0"><?= $row ?></h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-4 col-md-6">
                                        <div class="card">
                                            <div class="card-body px-3 py-4-5">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="stats-icon green">
                                                            <i class="iconly-boldPaper"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <h6 class="text-muted font-semibold">Rangking</h6>
                                                        <?php
                                                        $q = mysqli_query($conn, "SELECT * FROM alternatif WHERE nilai >0");
                                                        $row = mysqli_num_rows($q);
                                                        ?>
                                                        <h6 class="font-extrabold mb-0"><?= $row ?></h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <h5>Aturan Mahasiswa Berpotensi Drop Out</h5>
                                <h6>(Pasal 38) Tahap Evaluasi Mahasiswa</h6>
                                <ul>
                                    <li>Tahap 1 - Hingga semester 3, minimal 24 SKS lulus & IPK SEMESTER minimal 2.0.
                                    </li>
                                    <li>Tahap 2 - Hingga semester 8, minimal 96 SKS lulus & IPK SEMESTER minimal 2.75.
                                    </li>
                                    <li>Tahap 3 - Hingga semester 14, minimal 96 SKS lulus & IPK SEMESTER minimal 2.75.</li>
                                </ul>

                                <h6>(Pasal 39) BEBAN DAN MASA STUDI</h6>
                                <ul>
                                    <li>Beban studi Program Sarjana adalah 144-160 SKS dengan masa studi paling lama 7 (tujuh) tahun.
                                    </li>
                                    <li>Mahasiswa yang telah melampaui masa studi 7 (tujuh) tahun, dinyatakan hilang haknya sebagai mahasiswa.</li>
                                </ul>
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