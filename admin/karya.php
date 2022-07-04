<?php
include('koneksi.php');
include('header.php');

$id = $_GET['id'];

$query = $db->query("SELECT * FROM karya,jenis_karya, jenis_tulisan WHERE jenis_tulisan.id_jenistulisan=karya.id_jenistulisan AND jenis_karya.id_jeniskarya=karya.id_jeniskarya AND karya.id_jeniskarya = $id");
$rslt = $db->query("SELECT * FROM jenis_karya WHERE id_jeniskarya = $id");
$jk = mysqli_fetch_assoc($rslt);

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
                            <h3>Karya Tulis</h3>
                            <p class="text-subtitle text-muted">Karya Tulis <?= $jk['nama_jeniskarya']; ?></p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <a href="tKarya.php?id=<?= $id; ?>" class="btn btn-primary mb-1">Tambah Data</a>
                    </div> <br>
                    <section class="section">
                        <div class="col-4">
                            <?php if (isset($_GET['berhasil']) == 'yes') : ?>
                                <div class="alert alert-success alert-dismissible show fade">
                                    Berhasil.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php endif; ?>
                        </div>
                </div>

                <section class="section">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>Thumbnail</th>
                                        <th>Judul</th>
                                        <th>Jenis Tulisan</th>
                                        <th>Tanggal Modfikasi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (mysqli_num_rows($query)) : ?>
                                        <?php
                                        while ($data = mysqli_fetch_assoc($query)) : ?>
                                            <tr>
                                                <td width="300px"><img style="height: 150px; object-fit:cover" src="assets/images/karya/<?= $data['gambar']; ?>" alt="" class="img-thumbnail" width="300px"></td>
                                                <td><?= $data['judul']; ?></td>
                                                <td><?= $data['nama_jenistulisan']; ?></td>
                                                <td><?= $data['tgl_upload']; ?></td>
                                                <td>
                                                    <div class="buttons">
                                                        <a href="detailKarya.php?id=<?= $data['id_karya']; ?>" class="btn icon btn-primary"><i class="bi bi-info-circle"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endwhile; ?>
                                    <?php else : ?>
                                        <tr>
                                            <td colspan="5" class="text-center">Data tidak ditemukan.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; EDUPEN</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>