<?php
include('koneksi.php');
include('header.php');

$id = $_SESSION['id_user'];
$querySelect = $db->query("SELECT * FROM user WHERE id_user = $id");
$data = mysqli_fetch_assoc($querySelect);

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
                            <h3>Profil </h3>
                            <p class="text-subtitle text-muted">Data Profil</p>
                        </div>
                    </div>
                </div>

                <section class="section">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-4">
                                <?php if (isset($_GET['berhasil']) == 'yes') : ?>
                                    <div class="alert alert-success alert-dismissible show fade">
                                        Berhasil.
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <form class="form form-vertical" method="POST" action="" enctype="multipart/form-data">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group mb-3">
                                                <label for="kabinet" class="mb-1">Nama</label>
                                                <input type="text" id="nmanggoota" class="form-control" name="nm_anggota" value="<?= $data['nama_user']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group mb-3">
                                                <label for="email" class="mb-1">Email</label>
                                                <input type="text" id="email" class="form-control" name="email" value="<?= $data['email']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group mb-3">
                                                <img src="assets/images/profil/<?= $data['foto']; ?>" width="300px" height="300px">
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-start">
                                            <div class="button"> <a href="eProfilUser.php?id=<?= $data['id_user']; ?>" class="btn icon btn-warning"></i> Edit</a></div>


                                        </div>
                                    </div>
                                </div>
                            </form>
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