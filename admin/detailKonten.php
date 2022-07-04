<?php
include('koneksi.php');
include('header.php');
$id = $_GET['id'];

// $query   = $db->query("SELECT a.id_konten, a.id_jenistulisan, a.judul, a.tulisan, a.link_yt, b.nama_jenistulisan 
//                         FROM konten a
//                         JOIN jenis_tulisan b USING (id_jenistulisan)
//                         WHERE id_konten='$id'");
$query = $db->query("SELECT * FROM konten,jenis_tulisan WHERE jenis_tulisan.id_jenistulisan=konten.id_jenistulisan AND jenis_tulisan.id_jenistulisan='$id'");
$cek = mysqli_num_rows($query);
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
                            <p class="text-subtitle text-muted">Konten Pembelajaran</p>
                        </div>
                    </div>

                    <?php if ($_SESSION['level'] === 'admin') : ?>
                        <a href="tKontenPembelajaran.php" class="btn btn-primary mb-1">Tambah Data</a>
                    <?php endif; ?>

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
                        <div class="row mb-4">
                            <?php
                            if ($cek > 0) {
                                while ($data = mysqli_fetch_assoc($query)) :
                            ?>
                                    <div class="col-sm-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="featured-media video card-img-top">
                                                    <iframe width=360px; height=200px; src="https://www.youtube.com/embed/<?= $data['link_yt']; ?>" frameborder="0" class="img-fluid"></iframe>
                                                </div>
                                                <h5 class="card-title"><?= $data['judul']; ?></h5>
                                                <p class="card-text"><?= substr($data['tulisan'], 0, 180) ?>....</p>
                                                <?php if ($_SESSION['level'] === 'admin') {
                                                    $btnlbl = 'Lihat';
                                                } else {
                                                    $btnlbl = 'Belajar';
                                                } ?>
                                                <a href="satuKonten.php?id=<?= $data['id_konten']; ?>" class="btn btn-primary"><?= $btnlbl; ?></a>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                endwhile;
                            } else if ($cek == 0) {
                                $dataa = mysqli_fetch_assoc($query);
                                ?>
                                <?php if ($_SESSION['level'] === 'admin') : ?>
                                    <div class="card text-center">
                                        <div class="card-header">
                                            Oops!!!
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">Konten Pembelajaran Belum Ada</h5>
                                            <p class="card-text"> <i>Yuk ditambahkan konten pembelajarannya</i></p>
                                        </div>
                                        <div class="card-footer text-muted">
                                            Semangat Admin!
                                        </div>
                                    </div>
                                <?php else : ?>
                                    <div class="card text-center">
                                        <div class="card-header">
                                            Oops!!!
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">Konten Pembelajaran Belum Ada</h5>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php } ?>
                        </div>
                </section>
            </div>

        </div>
    </div>
    <?php include 'footer.php' ?>