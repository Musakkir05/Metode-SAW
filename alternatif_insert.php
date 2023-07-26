<?php
session_start();

if (!isset($_SESSION['nama'])) {
    header('location:login.php');
}
$title = 'Mahasiswa';

?>
<!DOCTYPE html>
<html lang="en">
<?php $title = 'Mahasiswa' ?>
<?php include('layout/head.php') ?>

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
                                <h4 class="card-title">Tambah mahasiswa</h4>
                            </div>
                            <div class="card-body">
                                <p>silahkan isi form di bawah ini</p>
                                <form action="alternatif_insert_act.php" method="post" class="form form-horizontal">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Nama</label>
                                            </div>
                                            <div class="col-md-7 form-group ">
                                                <input type="text" id="name" class="form-control" name="nama" placeholder="Name">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Stambuk</label>
                                            </div>
                                            <div class="col-md-7 form-group">
                                                <input type="text" id="stambuk" class="form-control" name="stambuk" placeholder="Stambuk" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-7 form-group">
                                                <input type="text" id="Email" class="form-control" name="email" placeholder="Email" value="admin20@gmail.com" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Nomor HP</label>
                                            </div>
                                            <div class="col-md-7 form-group">
                                                <input type="number" id="contact-info" class="form-control" name="contact" placeholder="Mobile" value="08525574002">
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