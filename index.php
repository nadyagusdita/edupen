<?php
include('admin/koneksi.php');
include('_header.php');

$result = mysqli_query($db, "SELECT * FROM karya 
INNER JOIN jenis_tulisan ON karya.id_jenistulisan = jenis_tulisan.id_jenistulisan
INNER JOIN jenis_karya ON karya.id_jeniskarya = jenis_karya.id_jeniskarya 
INNER JOIN user ON karya.id_penulis = user.id_user 
WHERE jenis_karya.nama_jeniskarya = 'public' ORDER BY tgl_upload");
?>

<section class="section-jumbotron">
    <div class="container-fluid">
        <div class="row mb-5">
            <div class="col-sm-12 col-md-6 col-lg-6" style="padding-left:70px">
                <h1 style="margin-top: 100px;">Build your writing skills <br> Any time anywhere</h1>
                <p>Join us for exciting learning about writing. <br>
                    Explore and read many interesting works </p>
                <?php  ?>
                <a href="admin/kontenPembelajaran.php" class="btn btn-medium mt-3 text-white">Mulai Belajar</a>
                <a href="list-karya.php" class="btn btn-medium mt-3 text-white">Mulai Membaca</a>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <img src="assets/img/img-jumbotron.svg" alt="" width="650" class="ms-auto d-block" style="padding-right: 60px">
            </div>
        </div>
    </div>
</section>

<?php
$rslt = mysqli_query($db, "SELECT
  (SELECT COUNT(*) FROM user) as c_user, 
  (SELECT COUNT(*) FROM karya) as c_karya,
  (SELECT COUNT(*) FROM konten) as c_konten");
$d = mysqli_fetch_assoc($rslt);

?>

<section class="section-stats" id="stats">
    <div class="container">
        <div class="row text-center justify-content-center">
            <div class="col-3 col-lg-2">
                <h2><?= $d['c_user']; ?></h2>
                <p>Members</p>
            </div>
            <div class="col-3 col-lg-2">
                <h2><?= $d['c_karya']; ?></h2>
                <p>Works</p>
            </div>
            <div class="col-3 col-lg-2">
                <h2><?= $d['c_konten']; ?></h2>
                <p>Content</p>
            </div>
        </div>
    </div>
</section>

<section class="section-intro">
    <div class="container-fluid" style="margin: 50px 0 100px 0">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6 text-center">
                <img src="assets/img/img-intro.svg" alt="" width="400">
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 ps-5">
                <h2 class="mb-3" style="margin-top: 100px;">Introduction</h2>
                <p>Website ini akan membantumu untuk belajar <br>
                    mengenai kepenulisan dan juga sebagai media <br>
                    untuk mempublikasikan karyamu.</p>
            </div>
        </div>
    </div>
</section>

<section class="section-intro-title">
    <div class="container mb-3" style="margin-top: 150px">
        <div class="row">
            <div class="col section-intro-heading text-center">
                <h2 class="text-center">Get All The Benefits</h2>
                <p>
                    Join us and you will get these benefits
                    <br>
                    in just one platform
                </p>
            </div>
        </div>
    </div>
</section>

<section class="section-intro d-flex justify-content-center">
    <div class="container d-flex justify-content-center">
        <div class="row d-flex justify-content-center">
            <div class="col-sm-12 col-md-12 col-lg-4 text-center">
                <div class="card shadow-sm" style="width: 18rem; margin:0 auto">
                    <img src="assets/img/ic_vid.svg" class="card-img-top px-5 pt-5" alt="...">
                    <div class="card-body">
                        <p class="card-text pb-3">Tersedia banyak konten pembelajaran mengenai kepenulisan</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4 text-center mt-3 mt-lg-0">
                <div class="card shadow-sm" style="width: 18rem; margin:0 auto">
                    <img src="assets/img/ic_publish.svg" class="card-img-top px-5 pt-5" alt="...">
                    <div class="card-body">
                        <p class="card-text pb-3">Publikasikan karya dan buat orang lain mengetahui tulisanmu</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4 text-center mt-3 mt-lg-0">
                <div class="card shadow-sm" style="width: 18rem; margin:0 auto">
                    <img src="assets/img/ic_read.svg" class="card-img-top px-5 pt-5" alt="..." width="100" height="200">
                    <div class="card-body">
                        <p class="card-text pb-3">Jelajahi dan baca berbagai macam karya berkualitas dan menarik</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-karya-title">
    <div class="container mb-3" style="margin-top: 100px">
        <div class="row">
            <div class="col ms-4 section-karya-heading">
                <h2>Karya yang Dipublikasikan</h2>
            </div>
        </div>
    </div>
</section>

<section class="section-karya mb-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="splide">
                <div class="splide__track">
                    <ul class="splide__list">
                        <?php while ($data = mysqli_fetch_assoc($result)) :  ?>
                            <li class="splide__slide">
                                <div class="card mx-4 p-2 rounded">
                                    <img class="img-fluid" alt="" src="admin/assets/images/karya/<?= $data['gambar']; ?>" style="height:200px; object-fit:cover;" />
                                    <div class="card-body">
                                        <a href="detail-karya.php?id=<?= $data['id_karya']; ?>" style="text-decoration: none; color: #134544;">
                                            <h5 class="card-title">
                                                <?= $data['judul']; ?>
                                            </h5>
                                        </a>
                                        <p class="card-text small" style="text-align:justify">
                                            <?= strip_tags(substr(($data['tulisan']), 0, 200)); ?>...
                                        </p>
                                        <p class="card-text">
                                            <small class="text-muted me-2"><i class="bi bi-person me-2"></i><?= $data['nama_user']; ?></small>
                                            <small class="text-muted me-2"><i class="bi bi-clock me-2"></i><?= $data['tgl_upload']; ?></small>
                                            <small class="text-muted me-2"><i class="bi bi-card-text me-2"></i><?= $data['nama_jenistulisan']; ?></small>
                                        </p>
                                    </div>
                                </div>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>



<?php include('_footer.php'); ?>