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
$title = 'Mahasiswa';
?>
<!DOCTYPE html>
<html lang="en">

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
                                <h4 class="card-title">Mahasiswa</h4>
                            </div>
                            <div class="card-body">
                                <p>Berikut ini adalah alternatif mahasiswa yang akan dievaluasi dalam tabel berikut :</p>
                                <?php if (isset($_SESSION['message'])) :  ?>
                                    <div id="alert" class="alert alert-success alert-dismissible show fade">
                                        <?= $_SESSION['message'] ?>
                                    </div>
                                <?php unset($_SESSION['message']);
                                endif; ?>

                                <div class="button">
                                    <a href="alternatif_insert.php" class="btn btn-success">Tambah Data</a>
                                </div>
                                <br>
                                <div class="card-body">
                                    <table class="table table-striped" id="table1">
                                        <?php
                                        $q = mysqli_query($conn, "SELECT * FROM alternatif ");
                                        $no = 1;
                                        ?>
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Stambuk</th>
                                                <th>Email</th>
                                                <th>No hp</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($q as $data) : ?>
                                                <tr>
                                                    <td><?= $no ?></td>
                                                    <td><?= $data['nama'] ?></td>
                                                    <td><?= $data['stambuk'] ?></td>
                                                    <td><?= $data['email'] ?></td>
                                                    <td><?= $data['no_hp'] ?></td>
                                                    <td>
                                                        <a href='alternatif_update.php?id=<?= $data['id_alternatif'] ?>' class="btn btn-info">Edit</a>
                                                        <a href='alternatif_delete_act.php?id=<?= $data['id_alternatif'] ?>' class="btn btn-danger">Hapus</a>
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