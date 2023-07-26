<!DOCTYPE html>
<html lang="en">
<?php
require_once('connect/conn.php');
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
                            <div class="card-header">
                                <h4 class="card-title">Masukkan Data Mahasiswa pada di bawah ini!</h4>
                            </div>
                            <div class="card-body">
                                <form action="matriks_insert_act.php" method="post" class="form form-horizontal">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Nama</label>
                                            </div>
                                            <?php
                                            $q = mysqli_query($conn, "SELECT a.id_alternatif,a.nama
                                            FROM alternatif a
                                            LEFT JOIN rangking r ON a.id_alternatif = r.id_alternatif
                                            WHERE r.id_alternatif IS NULL
                                            ");
                                            ?>
                                            <div class="col-md-7 form-group ">
                                                <fieldset class="form-group">
                                                    <select class="choices form-select" name="alternatif">
                                                        <?php foreach ($q as $data) : ?>
                                                            <option value="<?= $data['id_alternatif'] ?>"><?= $data['nama'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </fieldset>
                                            </div>
                                            <div class="col-md-4">
                                                <label>SKS</label>
                                            </div>
                                            <div class="col-md-7 form-group">
                                                <input type="number" class="form-control" name="value[]" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label>IPK</label>
                                            </div>
                                            <div class="col-md-7 form-group">
                                                <input type="number" step="0.01" class="form-control" name="value[]" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Lama Studi</label>
                                            </div>
                                            <div class="col-md-7 form-group">
                                                <input type="number" class="form-control" name="value[]" required>
                                            </div>

                                            <div class="col-12 col-md-8 offset-md-4 form-group">
                                            </div>
                                            <div class="col-sm-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Batal</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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