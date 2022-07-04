<?php
include('header.php');
include('koneksi.php');

$query = $db->query("SELECT * FROM konten,jenis_tulisan WHERE jenis_tulisan.id_jenistulisan=konten.id_jenistulisan");

$data = mysqli_fetch_assoc($query);
?>

<body>
    <div id="app">
        <?php include 'sidebar.php' ?>

        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Konten Pembelajaran</h3>
                            <p class="text-subtitle text-muted">Kelola Data Konten Pembelajaran</p>
                        </div>
                    </div>
                    <p></p>
                    <div class="col-4">
                        <?php if (isset($_GET['berhasil']) == 'yes') : ?>
                            <div class="alert alert-success alert-dismissible show fade">
                                Berhasil.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php elseif (isset($_GET['berhasil']) == 'no') : ?>
                            <div class="alert alert-failed alert-dismissible show fade">
                                Gagal.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <section class="section">
                    <br>
                    <div class="container-fluid">
                        <!-- Ukuran Card menggunakan grid markup -->
                        <div class="row mb-4">
                            <?php
                            $query1   = $db->query("SELECT * FROM jenis_tulisan");
                            while ($data1 = mysqli_fetch_assoc($query1)) : ?>
                                <div class="col-sm-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <img src="assets/images/konten/<?= $data1['cover']; ?>" class="card-img-top" alt="Konten Pembelajaran">
                                            <span class="badge rounded-pill text-bg-light">
                                                <h5 class="card-title"><?= $data1['nama_jenistulisan']; ?></h5>
                                            </span>
                                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor.</p>
                                            <?php if ($_SESSION['level'] === 'admin') {
                                                $btnlbl = 'Lihat';
                                            } else {
                                                $btnlbl = 'Belajar';
                                            } ?>
                                            <a href="detailKonten.php?id=<?= $data1['id_jenistulisan']; ?>" class="btn btn-primary"><?= $btnlbl; ?></a>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                </section>
            </div>


        </div>
    </div>
    <?php include 'footer.php' ?>