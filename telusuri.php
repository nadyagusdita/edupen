<?php
include('admin/koneksi.php');
include('_header.php');

$id = $_GET['id'];

$result = mysqli_query($db, "SELECT * FROM karya 
    INNER JOIN jenis_tulisan ON karya.id_jenistulisan = jenis_tulisan.id_jenistulisan
    INNER JOIN jenis_karya ON karya.id_jeniskarya = jenis_karya.id_jeniskarya 
    INNER JOIN user ON karya.id_penulis = user.id_user 
    WHERE jenis_karya.nama_jeniskarya = 'public' AND jenis_tulisan.id_jenistulisan = $id ORDER BY tgl_upload");
$rslt = mysqli_query($db, "SELECT * FROM jenis_tulisan WHERE id_jenistulisan = $id");

$res = mysqli_fetch_assoc($rslt);

?>

<section class="section-card-berita">
    <div class="container">

        <div class="row mt-5">
            <div class="col">
                <h3>Kategori: <?= $res['nama_jenistulisan']; ?></h3>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col">
                <?php if (mysqli_num_rows($result)) : ?>
                    <!-- d-none d-lg-block -->
                    <?php while ($data = mysqli_fetch_assoc($result)) : ?>
                        <div class="card mb-4 d-none d-lg-block" style="max-height: 265px">
                            <div class="row g-0">
                                <div class="col-md-4 col-sm-12 col-lg-4" style="max-height: 265px;">
                                    <img src="admin/assets/images/karya/<?= $data['gambar']; ?>" class="img-fluid rounded-start" style="max-height: inherit; width:100%; object-fit:cover" />
                                </div>
                                <div class="col-md-8 col-sm-12 col-lg-8 my-auto d-flex">
                                    <div class="card-body">
                                        <a href="detail-karya.php?id=<?= $data['id_karya']; ?>" style="text-decoration: none; color: #000">
                                            <h5 class="card-title">
                                                <?= $data['judul']; ?>
                                            </h5>
                                        </a>
                                        <p class="card-text" style="text-align: justify">
                                            <?= strip_tags(substr(($data['tulisan']), 0, 400)); ?>...
                                            <a href="detail-karya.php?id=<?= $data['id_karya']; ?>" class="text-muted">baca selengkapnya</a>
                                        </p>
                                        <p class="card-text">
                                            <small class="text-muted me-2"><i class="bi bi-person me-2"></i><?= $data['nama_user']; ?></small>
                                            <small class="text-muted me-2"><i class="bi bi-clock me-2"></i><?= $data['tgl_upload']; ?></small>
                                            <small class="text-muted me-2"><i class="bi bi-card-text me-2"></i><?= $data['nama_jenistulisan']; ?></small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- d-block d-lg-none -->
                        <div class="card mb-4 d-block d-lg-none">
                            <div class="row g-0">
                                <div class="col-md-4 col-sm-12 col-lg-4" style="max-height: 265px;">
                                    <img src="assets/img/<?= $data['gambar']; ?>" class="img-fluid rounded-start" style="max-height: inherit; width:100%; object-fit:cover" />
                                </div>
                                <div class="col-md-8 col-sm-12 col-lg-8 my-auto d-flex">
                                    <div class="card-body">
                                        <a href="detail-karya.php?id=<?= $data['id_karya']; ?>" style="text-decoration: none; color: #000">
                                            <h5 class="card-title">
                                                <?= $data['judul']; ?>
                                            </h5>
                                        </a>
                                        <p class="card-text" style="text-align: justify">
                                            <?= strip_tags(substr(($data['tulisan']), 0, 400)); ?>...
                                            <a href="detail-karya.php?id=<?= $data['id_karya']; ?>" class="text-muted">baca selengkapnya</a>
                                        </p>
                                        <p class="card-text">
                                            <small class="text-muted me-2"><i class="bi bi-person me-2"></i><?= $data['nama_user']; ?></small>
                                            <small class="text-muted me-2"><i class="bi bi-clock me-2"></i><?= $data['tgl_upload']; ?></small>
                                            <small class="text-muted me-2"><i class="bi bi-card-text me-2"></i><?= $data['nama_jenistulisan']; ?></small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else : ?>
                    <div class="container">
                        <div class="row mt-5 justify-content-center">
                            <div class="col-5">
                                <div class="card shadow">
                                    <div class="card-body text-center">
                                        <img src="assets/img/alert.png" width="300" class="mt-4 mb-2">
                                        <p class="fs-5">Maaf, Tidak ada data untuk ditampilkan.</p>
                                        <!-- <a href="absensi.php" class="btn btn-success btn-sm">Kembali</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        </div>


    </div>
</section>

<?php include('_footer.php') ?>