<?php
include('koneksi.php');
include('header.php');
$id=$_SESSION['id_user'];

$query = $db->query("SELECT * FROM detail_permintaan
INNER JOIN permintaan_karya ON detail_permintaan.id_permintaan = permintaan_karya.id_permintaan
INNER JOIN user ON permintaan_karya.id_peminta = user.id_user
WHERE permintaan_karya.id_peminta = $id");

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
                            <h3>Hasil Tulisan</h3>
                            <p class="text-subtitle text-muted">Hasil Tulisan</p>
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
                                        <th>Pengaju</th>
                                        <th>Keterangan</th>
                                        <th>Batas Upload</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (mysqli_num_rows($query)) : ?>
                                        <?php
                                        while ($data = mysqli_fetch_assoc($query)) : ?>
                                            <tr>
                                                <td><?= $data['nama_user']; ?></td>
                                                <td><?= $data['keterangan']; ?></td>
                                                <td><?= $data['tgl_batasupload']; ?></td>

                                                <?php 
                                                if ($data['status']=='Diajukan') { 
                                                    ?>
                                                        <td><?= $data['status']; ?></td>
                                                        <td><a class='btn icon rounded-pill btn-secondary' href= ''><i class='bi bi-download'></i></a><i>Tidak ada file</i></td>
                                                <?php } else if ($data['status']=='0') {?>
                                                        <td>Ditolak</td>
                                                        <td><a class='btn icon rounded-pill btn-secondary' href= ''><i class='bi bi-download'></i></a><i>Tidak ada file</i></td>
                                                <?php } else if ($data['status']=='1') {?>
                                                        <td>Dikerjakan</td>
                                                        <td><a class='btn icon rounded-pill btn-secondary' href= ''><i class='bi bi-download'></i></a><i>File belum diupload</i></td>
                                                <?php } else if ($data['status']=='Selesai') {?>
                                                        <td><?= $data['status']; ?></td>
                                                        <td><a class='btn icon rounded-pill btn-primary' href= 'download.php?file=<?=$data['file'];?>'><i class='bi bi-download'></i></a><i><?=$data['file']?></i></td>
                                                <?php } ?>

                                            </tr>
                                        <?php endwhile; ?>
                                    <?php else : ?>
                                        <tr>
                                            <td colspan="6" class="text-center">Data tidak ditemukan.</td>
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