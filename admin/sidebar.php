<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <a href="dashboard.php"><img src="../assets/img/logo-edupen.svg" alt="Logo" style="width: 250px; height: 70px"></a>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item">
                    <a href="dashboard.php" class='sidebar-link' style="background-color: #fff;">
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="profilUser.php" class='sidebar-link' style="background-color: #fff;">
                        <i class="bi bi-person-fill"></i>
                        <span>Profil</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="kontenPembelajaran.php" class='sidebar-link' style="background-color: #fff;">
                        <i class="bi bi-file-earmark-play-fill"></i>
                        <span>Konten Pembelajaran</span>
                    </a>
                </li>

                <li class="sidebar-item has-sub">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-file-earmark-text-fill"></i>
                        <span>Karya Tulisan</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item">
                            <a href="karya.php?id=1">Pribadi</a>
                        </li>
                        <li class="submenu-item">
                            <a href="karya.php?id=2">Publikasi</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item has-sub">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-file-earmark-text-fill"></i>
                        <span>Jasa Tulis</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item">
                            <a href="mintaTulisan.php">Pemintaan Tulisan</a>
                        </li>
                        <li class="submenu-item">
                            <a href="hasilTulisan.php">Hasil Tulisan</a>
                        </li>
                    </ul>
                </li>

                <!-- <?php if (isset($_SESSION['level']) && $_SESSION['level'] == 'sekretaris' && isset($_SESSION['id_pengurus'])) { ?>
                    <li class="sidebar-item">
                        <a href="timeline.php" class='sidebar-link'>
                            <i class="bi bi-calendar-week"></i>
                            <span>Timeline Kegiatan</span>
                        </a>
                    </li>
                <?php } ?> -->

                <li class="sidebar-item">
                    <a href="../index.php" class='sidebar-link'>
                        <i class="bi bi-box-arrow-left"></i>
                        <span>Ke Halaman Utama</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="../logout.php" class='sidebar-link'>
                        <i class="bi bi-door-closed"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>