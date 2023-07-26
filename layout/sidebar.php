<div id="sidebar" class="active no-print">
    <?php $page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/") + 1);

    ?>
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo rounded mx-auto">
                    <a href="index.php"><img src="assets/images/logo/logo umi.png" alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item <?= $page == 'index.php' ? 'active' : '' ?> ">
                    <a href="index.php" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <?php if ($_SESSION['role'] != 'Pimpinan') : ?>
                    <li class="sidebar-item <?= $page == 'kriteria.php' || $page == 'kriteria_update.php' ? 'active' : '' ?> ">
                        <a href="kriteria.php" class='sidebar-link'>
                            <i class="bi bi-list"></i>
                            <span>Kriteria</span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if ($_SESSION['role'] != 'Pimpinan') : ?>
                    <li class="sidebar-item <?= $page == 'alternatif.php' || $page == 'alternatif_insert.php' ? 'active' : '' ?> ">
                        <a href="alternatif.php" class='sidebar-link'>
                            <i class="bi bi-people"></i>
                            <span>Mahasiswa</span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if ($_SESSION['role'] != 'Pimpinan') : ?>
                    <li class="sidebar-item <?= $page == 'matriks.php' || $page == 'matriks_insert.php' || $page == 'matriks_update.php'  ? 'active' : '' ?> ">
                        <a href="matriks.php" class='sidebar-link'>
                            <i class="bi bi-pentagon-fill"></i>
                            <span>Matriks</span>
                        </a>
                    </li>
                <?php endif; ?>
                <li class="sidebar-item <?= $page == 'rangking.php'  ? 'active' : '' ?> ">
                    <a href="rangking.php" class='sidebar-link'>
                        <i class="bi bi-check2-all"></i>
                        <span>Rangking</span>
                    </a>
                </li>

                <?php if ($_SESSION['role'] != 'Pimpinan') : ?>
                    <li class="sidebar-item <?= $page == 'pegawai.php' || $page == 'pegawai_insert.php' || $page == 'pegawai_update.php' ? 'active' : '' ?> ">
                        <a href="pegawai.php" class='sidebar-link'>
                            <i class="bi bi-person"></i>
                            <span>User</span>
                        </a>
                    </li>
                <?php endif; ?>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>