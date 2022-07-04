<?php
include('admin/koneksi.php');
include('_header.php');

// $result = mysqli_query($db, "SELECT * FROM karya 
// INNER JOIN jenis_tulisan ON karya.id_jenistulisan = jenis_tulisan.id_jenistulisan
// INNER JOIN jenis_karya ON karya.id_jeniskarya = jenis_karya.id_jeniskarya 
// INNER JOIN user ON karya.id_penulis = user.id_user 
// WHERE jenis_karya.nama_jeniskarya = 'public' ORDER BY tgl_upload");

if (isset($_POST['cari']) && $_POST['keyword'] != "") {
    $keyword = stripslashes(trim(htmlspecialchars($_POST['keyword'])));
    $query = "SELECT * FROM karya 
            INNER JOIN jenis_tulisan ON karya.id_jenistulisan = jenis_tulisan.id_jenistulisan
            INNER JOIN jenis_karya ON karya.id_jeniskarya = jenis_karya.id_jeniskarya 
            INNER JOIN user ON karya.id_penulis = user.id_user 
            WHERE (jenis_karya.nama_jeniskarya = 'public') AND
          judul LIKE '%$keyword%' OR
          nama_user LIKE '%$keyword%'
          ORDER BY tgl_upload DESC
          ";
    $result = mysqli_query($db, $query);
} else {
    $result = mysqli_query($db, "SELECT * FROM karya 
    INNER JOIN jenis_tulisan ON karya.id_jenistulisan = jenis_tulisan.id_jenistulisan
    INNER JOIN jenis_karya ON karya.id_jeniskarya = jenis_karya.id_jeniskarya 
    INNER JOIN user ON karya.id_penulis = user.id_user 
    WHERE jenis_karya.nama_jeniskarya = 'public' ORDER BY tgl_upload");
}
?>

<section class="section-card-berita">
    <div class="container">

        <div class="row mt-5">
            <div class="col">
                <h3>Daftar Karya</h3>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col">
                <form action="" method="POST">
                    <div class="input-container">
                        <!-- <img src="assets/search-interface-symbol 1.png"> -->
                        <i class="bi bi-search icon-search"></i>
                        <input type="text" class="form-control input-search border-start-0" name="keyword" placeholder="Masukkan keyword pencarian">
                        <button class="btn btn-dark" style="display: none" type="submit" id="button-addon2" name="cari">Cari</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col">
                <?php while ($data = mysqli_fetch_assoc($result)) :  ?>
                    <!-- d-none d-lg-block -->
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
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</section>

<?php include('_footer.php') ?>