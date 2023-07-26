<!DOCTYPE html>
<html lang="en">

<?php
require_once('connect/conn.php');
session_start();
if (!isset($_SESSION['nama'])) {
    header('location:login.php');
}
$title = 'Kriteria';
include('layout/head.php');

$id = $_GET['id'];
$q = mysqli_query($conn, "SELECT * FROM kriteria WHERE id_kriteria = '$id'");
$data = mysqli_fetch_assoc($q);
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
                                <h4 class="card-title">Edit Kriteria </h4>
                            </div>
                            <div class="card-body">
                                <p>silahkan isi form di bawah ini</p>
                                <form action="kriteria_update_act.php" method="POST" class="form form-horizontal">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Nama</label>
                                            </div>
                                            <div class="col-md-7 form-group ">
                                                <input type="hidden" value="<?= $data['id_kriteria'] ?>" name="id">
                                                <input type="text" id="name" class="form-control" name="nama" value="<?= $data['nama'] ?>" readonly>
                                            </div>
                                            <div class="col-md-4">
                                                <label>bobot</label>
                                            </div>
                                            <div class="col-md-7 form-group">
                                                <input type="number" step="0.01" id="contact-info" class="form-control" name="bobot" placeholder="bobot" value="<?= $data['bobot'] ?>">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Atribut</label>
                                            </div>
                                            <div class="col-md-7 form-group">
                                                <fieldset class="form-group">
                                                    <select class="form-select" id="basicSelect" name="atribut">
                                                        <option value="cost" <?php echo ($data['atribut']) == 'cost' ? 'selected' : ''; ?>>Cost</option>
                                                        <option value="benefit" <?php echo ($data['atribut']) == 'benefit' ? 'selected' : ''; ?>>Benefit</option>
                                                    </select>
                                                </fieldset>
                                            </div>
                                            <div class="col-12 col-md-8 offset-md-4 form-group">
                                            </div>
                                            <div class="col-sm-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Edit</button>
                                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Batal</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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