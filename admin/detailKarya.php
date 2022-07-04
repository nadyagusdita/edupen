<?php
include('koneksi.php');
include('header.php');

$level = $_SESSION['level'];
$iduser = $_SESSION['id_user'];

$id = $_GET['id'];

$query = $db->query("SELECT * FROM user,karya,jenis_tulisan,jenis_karya WHERE user.id_user=karya.id_penulis 
AND jenis_tulisan.id_jenistulisan=karya.id_jenistulisan AND jenis_karya.id_jeniskarya=karya.id_jeniskarya 
AND karya.id_karya='$id'");
$cek = mysqli_num_rows($query);
$data = mysqli_fetch_assoc($query);
$idjeniskarya = $data['id_jeniskarya'];

$queryfb = $db->query("SELECT * FROM feedback_karya WHERE id_karya='$id'");
$jml = mysqli_num_rows($queryfb);


if (isset($_POST['submit'])) {
    $tulisan = $_POST['tulisan'];

    if ($idjeniskarya == 1) {
        $query1 = "INSERT INTO feedback_karya SET id_karya='$id', feedback='$tulisan'";
        $result1 = mysqli_query($db, $query1);
        $query2 = "UPDATE karya SET id_jeniskarya=2";
        $result2 = mysqli_query($db, $query2);
        $result = $result1 + $result2;

        if ($result > 0) {
            header("location: karya.php?berhasil=yes&id=2");
        } else {
            header("location: karya.php?berhasil=no");
        }
    } else if ($idjeniskarya == 2) {
        $query1 = "INSERT INTO feedback_karya SET id_karya='$id', feedback='$tulisan'";
        $result1 = mysqli_query($db, $query1);
        $result = $result1;

        if ($result > 0) {
            header("location: karya.php?berhasil=yes&id=2");
        } else {
            header("location: karya.php?berhasil=no");
        }
    }
}



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
                            <h3>Karya</h3>
                            <p class="text-subtitle text-muted">Kelola Data Karya</p>
                        </div>
                    </div>
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
                            <div class="card">
                                <div class="row">
                                    <div class="col"> </div>
                                    <div class="col-10">
                                        <div class="card-header text-center ">
                                            <button type="button" class="btn rounded-pill  btn-info">
                                                <span class="badge text-bg-info"><?= $data['nama_jenistulisan']; ?></span>
                                            </button>
                                            <br>
                                            <h3 style="margin-top:20px; margin-bottom: -20px"><?= $data['judul']; ?></h3>
                                        </div>
                                        <hr />
                                    </div>

                                    <div class="col">
                                        <div class="text-right">
                                            <?php if ($level == 'admin') { ?>
                                                <div class="buttons">
                                                    <a href="eKarya.php?id=<?= $data['id_karya']; ?>" class="btn icon btn-warning rounded-pill"><i class="bi bi-pencil"></i></a>
                                                    <a href="hKarya.php?id=<?= $data['id_karya']; ?>" class="btn icon btn-danger rounded-pill" onclick="return confirm('Anda yakin ingin menghapus?'); "><i class="bi bi-trash"></i></a>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">

                                        <div class="text-center">
                                            <img height="400" style="object-fit: cover;" class="card-img-top" src="assets/images/karya/<?= $data['gambar']; ?>" alt="">
                                        </div>
                                    </div>
                                    <h6 class="card-subtitle my-3 text-muted" style="margin-left: 20px;">
                                        <small class="text-muted me-2">
                                            <i class="bi bi-clock me-1"></i>
                                            <?= $data['tgl_upload']; ?>
                                        </small>
                                        <small class="author text-left" data-bs-toggle="modal" data-bs-target="#profilModal">
                                            <img class="rounded-circle mx-3 my-4" alt="20x20" src="assets/images/profil/<?= $data['foto']; ?>" data-holder-rendered="true" width="20" height="20" style="object-fit: cover;"> <?= $data['nama_user']; ?>
                                        </small>
                                    </h6>

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
                                                                <img src="assets/images/profil/<?= $data['foto']; ?>" alt="" width="100" height="120" style="object-fit: cover;">
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
                                                    <?php if ($iduser !== $data['id_user']) : ?>
                                                        <a href="tPermintaanKarya.php?id=<?= $data['id_user']; ?>">
                                                            <button type="button" href="" class="btn text-white" style="background-color: #216362;">Gunakan jasa penulis ini</button>
                                                        </a>
                                                    <?php endif ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body" style="margin-top: -40px">
                                    <p class="card-text"><?= $data['tulisan']; ?></p>
                                </div>
                            </div>
                            <?php if ($level == 'admin') { ?>
                                <div class="card">
                                    <div class="card-header text-left">

                                        <h3> Feedback</h3>
                                        <?php if (mysqli_num_rows($queryfb)) : ?>
                                            <?php
                                            while ($data1 = mysqli_fetch_assoc($queryfb)) : ?>
                                                <i class="bi bi-person-circle"><?= $data1['feedback']; ?></i>
                                            <?php endwhile ?>
                                        <?php else : ?>
                                            <p colspan="5" class="text-center">Belum ada Feedback.</p>
                                        <?php endif; ?>
                                        <hr size="5px">
                                        <div>
                                            <form class="form form-vertical" method="POST" action="" enctype="multipart/form-data">
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class=" col-12">
                                                                <div class="form-group mb-3">
                                                                    <label for="tulisan" class="mb-1">Tulis Feedback</label>
                                                                    <textarea class="ckeditor" id="ckedtor" name="tulisan"></textarea>
                                                                </div>
                                                            </div>
                                                            <?php if ($idjeniskarya == 1) : ?>
                                                                <div class="form-group mb-3">
                                                                    <label for="tulisan" class="mb-1">Izinkan Publikasi?</label>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="jeniskarya" id="jeniskarya" value="public">
                                                                        <label class="form-check-label" for="exampleRadios1">
                                                                            Ya
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="jeniskarya" id="jeniskarya" value="private">
                                                                        <label class="form-check-label" for="exampleRadios1">
                                                                            Tidak
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            <?php endif ?>
                                                            <div class="col-12 d-flex justify-content-end">
                                                                <button type="submit" class="btn btn-primary me-1 mb-1" name="submit">Submit</button>
                                                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                </section>
            </div>
            <?php include 'footer.php' ?>
        </div>

    </div>

    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script>
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>

    <script src="assets/js/main.js"></script>
</body>

</html>