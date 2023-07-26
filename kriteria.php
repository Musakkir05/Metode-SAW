<!DOCTYPE html>
<html lang="en">
<?php
require_once('connect/conn.php');
session_start();
if (!isset($_SESSION['nama'])) {
    header('location:login.php');
}
if ($_SESSION['role'] == 'Pimpinan') {
    echo "<script>alert('Anda Tidak Dapat Akses Menu Ini');</script>";
    echo "<script>location='index.php'</script>";
}
$title = 'Kriteria';
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
                                <h4 class="card-title">Kriteria</h4>
                            </div>
                            <div class="card-body">
                                <p>Berikut ini daftar kriteria :</p>
                                <?php if (isset($_SESSION['message'])) :  ?>
                                    <div class="alert alert-success alert-dismissible show fade">
                                        <?= $_SESSION['message'] ?>
                                    </div>
                                <?php unset($_SESSION['message']);
                                endif; ?>

                                <br>
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">
                                        <?php
                                        $q = mysqli_query($conn, "SELECT * FROM kriteria");

                                        $no = 1
                                        ?>
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama </th>
                                                <th>Bobot</th>
                                                <th>Atribut</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($q as $item) : ?>
                                                <tr>
                                                    <td><?= $no ?></td>
                                                    <td><?= $item['nama'] ?></td>
                                                    <td><?= $item['bobot'] ?></td>
                                                    <td><?= $item['atribut'] ?></td>
                                                    <td>
                                                        <a class="justify-content-center btn btn-info" href='kriteria_update.php?id=<?= $item['id_kriteria'] ?>'>Edit</a>
                                                    </td>
                                                </tr>
                                            <?php $no++;
                                            endforeach ?>
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