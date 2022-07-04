<?php
include('admin/koneksi.php');
include('_header.php');

$id = $_GET['id'];

$result = mysqli_query($db, "SELECT * FROM karya 
INNER JOIN jenis_tulisan ON karya.id_jenistulisan = jenis_tulisan.id_jenistulisan
INNER JOIN jenis_karya ON karya.id_jeniskarya = jenis_karya.id_jeniskarya 
INNER JOIN user ON karya.id_penulis = user.id_user 
WHERE karya.id_karya = $id");
?>

<section class="section-detail-berita">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card card-detail-berita mt-5">

                    <!-- Button trigger modal -->
                    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Launch demo modal
                    </button> -->
                    <?php while ($data = mysqli_fetch_assoc($result)) :  ?>
                        <div class="author" data-bs-toggle="modal" data-bs-target="#profilModal">
                            <img class="rounded-circle mx-3 my-2" alt="40x40" src="admin/assets/images/profil/<?= $data['foto']; ?>" data-holder-rendered="true" width="40" height="40" style="object-fit: cover;"> <?= $data['nama_user']; ?>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="profilModal" tabindex="-1" aria-labelledby="profilModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="profilModalLabel">Profil Penulis</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-3">
                                                    <img src="admin/assets/images/profil/<?= $data['foto']; ?>" alt="" width="100" height="120" style="object-fit: cover;">
                                                </div>
                                                <div class="col-9">
                                                    <p class="text-dark">Nama&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;:&#9;<?= $data['nama_user']; ?> </p>
                                                    <p class="text-dark">Email&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;:&#9;<?= $data['email']; ?> </p>
                                                    <p class="text-dark">Harga jasa&nbsp; &nbsp; :&#9;Rp <?= number_format($data['harga_penulisan']); ?> </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <a href="admin/tPermintaanKarya.php?id=<?= $data['id_user']; ?>">
                                            <button type="button" class="btn text-white" style="background-color: #216362;">Gunakan jasa penulis ini</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <img src="admin/assets/images/karya/<?= $data['gambar']; ?>" class="card-img-top" height="400" style="object-fit: cover" />

                        <div class="card-body px-5 pb-5">
                            <h6 class="card-subtitle my-3 text-muted">
                                <small class="text-muted me-2">
                                    <i class="bi bi-clock me-1"></i>
                                    <?= $data['tgl_upload']; ?>
                                </small>
                                <small class="text-muted">
                                    <i class="bi bi-card-text me-1"></i>
                                    <?= $data['nama_jenistulisan']; ?>
                                </small>
                            </h6>
                            <h3 class="card-title mb-4">
                                <?= $data['judul']; ?>
                            </h3>
                            <div class="card-text" style="text-align: justify;">
                                <p class="text-justify"><?= $data['tulisan']; ?></p>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include('_footer.php') ?>