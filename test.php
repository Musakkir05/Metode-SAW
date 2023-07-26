<?php
require_once('connect/conn.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>Laporan Mahasiswa

    </title>
    <style>
        h2 {
            text-align: center;
        }

        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }
    </style>
</head>

<body>
    <h2>Laporan Mahasiswa Berpotensi Drop Out</h2>
    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Stambuk</th>
            <th>No HP</th>
            <th>Email</th>
            <th>Nilai</th>
            <th>Keterangan</th>
        </tr>

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

    </table>
    <h6>Keterangan</h6>
    <ul>
        <li>Tidak Berpotensi = 0.8 - 1</li>
        <li>Berpotensi = 0.6 - 0.79</li>
        <li>Sangat Berpotensi = 0.2 - 0.59</li>
    </ul>
    <script>
        window.print();
    </script>
</body>

</html>