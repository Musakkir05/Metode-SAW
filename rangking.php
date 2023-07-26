<?php
session_start();

if (!isset($_SESSION['nama'])) {
    header('location:login.php');
}
$title = 'Rangking';
require_once('connect/conn.php');
include('layout/head.php');
include('R.php');
include('W.php');


$P = array();
$m = count($W);


foreach ($R as $i => $r) {

    for ($j = 0; $j < $m; $j++) {
        $P[$i] = (isset($P[$i]) ? $P[$i] : 0) + $r[$j] * $W[$j];
        $nilai[$i] = round($P[$i], 3);
    }
    $q = mysqli_query($conn, "SELECT value as lama_studi FROM rangking WHERE id_alternatif = '$i' AND id_kriteria=10");
    $row = mysqli_fetch_array($q);


    if ($row['lama_studi'] > 8) {
        $nilai[$i] = $nilai[$i] - 0.3;
    }
    if ($nilai[$i] >= 0.75) {
        $ket = 'Tidak Berpotensi';
    } elseif ($nilai[$i] > 0.60) {
        $ket = 'Berpotensi';
    } elseif ($nilai[$i] > 0.20) {
        $ket = 'Sangat Berpotensi';
    }

    mysqli_query($conn, "UPDATE alternatif SET nilai='$P[$i]',ket='$ket' WHERE id_alternatif='$i'");
}

?>
<!DOCTYPE html>
<html lang="en">


<body>
    <div id="app">
        <?php include('layout/sidebar.php') ?>
        <div id="main" class='layout-navbar'>
            <?php include('layout/navbar.php') ?>
            <div class="pt-0">
                <div class="page-heading">

                    <section class="section">
                        <div class="card">
                            <div class="card-header no-print">
                                <h4 class="card-title">Rangking</h4>
                            </div>
                            <div class="card-body">
                                <p>Berikut ini adalah preferensi rangking mahasiswa berpotensi drop out</p>
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-end mb-4">
                                        <a href="test.php" class="btn btn-primary">Cetak</a>
                                    </div>
                                    <table class="table table-striped" id="table1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama </th>
                                                <th>Stambuk </th>
                                                <th>Email </th>
                                                <th>No HP </th>
                                                <th>Hasil</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $q = mysqli_query($conn, "SELECT * FROM alternatif WHERE nilai >0 ORDER BY nilai DESC");
                                            $no = 0;
                                            while ($row = mysqli_fetch_assoc($q)) :
                                                $nilai_mahasiswa = $row['nilai'];
                                                $nama = $row['nama'];
                                                $stambuk = $row['stambuk'];
                                                $email = $row['email'];
                                                $no_hp = $row['no_hp'];
                                                $ket = $row['ket'];
                                                $no++;
                                            ?>
                                                <tr>
                                                    <td><?= $no ?></td>
                                                    <td><?= $nama ?></td>
                                                    <td><?= $stambuk ?></td>
                                                    <td><?= $email ?></td>
                                                    <td><?= $no_hp ?></td>
                                                    <td><?= $nilai_mahasiswa ?></td>
                                                    <td><?= $ket ?></td>

                                                </tr>

                                            <?php endwhile; ?>

                                        </tbody>
                                    </table>
                                </div>

                                <div>
                                    <h6>Keterangan</h6>
                                    <ul>
                                        <li>Tidak Berpotensi = 0.8 - 1</li>
                                        <li>Berpotensi = 0.6 - 0.79</li>
                                        <li>Sangat Berpotensi = 0.2 - 0.59</li>
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
    <script>
        function cetakLaporan() {
            window.print();
        }
    </script>
</body>
<?php include('layout/js.php') ?>


</html>