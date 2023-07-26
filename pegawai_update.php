<!DOCTYPE html>
<html lang="en">
<?php
require_once('connect/conn.php');
session_start();
if (!isset($_SESSION['nama'])) {
    header('location:login.php');
}
$title = 'Pegawai';
include('layout/head.php');
$id = $_GET['id'];
$q = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'");
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
                                <h4 class="card-title">Pegawai</h4>
                            </div>
                            <div class="card-body">
                                <p>silahkan isi form di bawah ini</p>
                                <form action="pegawai_update_act.php" method="post" class="form form-horizontal">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Nama</label>
                                            </div>
                                            <div class="col-md-7 form-group ">
                                                <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                                <input type="text" class="form-control" name="nama" value="<?= $data['name'] ?>" placeholder="Name">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Username</label>
                                            </div>
                                            <div class="col-md-7 form-group">
                                                <input type="text" class="form-control" name="username" value="<?= $data['username'] ?>" placeholder="Username" autocomplete="new-password" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Jabatan</label>
                                            </div>
                                            <div class="col-md-7 form-group">
                                                <fieldset class="form-group">
                                                    <select class="form-select" id="basicSelect" name="role">
                                                        <option value="Pimpinan" <?php echo ($data['role']) == 'Pimpinan' ? 'selected' : ''; ?>>Pimpinan</option>
                                                        <option value="Staff" <?php echo ($data['role']) == 'Staff' ? 'selected' : ''; ?>>Staff</option>
                                                    </select>
                                                </fieldset>
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
                    </section>
                </div>
                <?php include('layout/footer.php') ?>
            </div>
        </div>
    </div>
</body>
<?php include('layout/js.php') ?>

</html>