<?php
include('koneksi.php');
include('header.php');
$id = $_GET['id'];

// $query   = $db->query("SELECT a.id_konten, a.id_jenistulisan, a.judul, a.tulisan, a.link_yt, b.nama_jenistulisan 
//                         FROM konten a
//                         JOIN jenis_tulisan b USING (id_jenistulisan)
//                         WHERE id_konten='$id'");
$query = $db->query("SELECT * FROM konten,jenis_tulisan WHERE jenis_tulisan.id_jenistulisan=konten.id_jenistulisan AND konten.id_konten='$id'");
$cek = mysqli_num_rows($query);
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
                            <p class="text-subtitle text-muted">Konten Pembelajaran</p>
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
                                    <div class="col">
                                    </div>
                                    <div class="col-10">
                                        <div class="card-header text-center">
                                            <button type="button" class="btn rounded-pill  btn-info">
                                                <span class="badge text-bg-info"><a href="detailKonten.php?id=<?= $data['id_jenistulisan']; ?>"><?= $data['nama_jenistulisan']; ?></a></span>
                                            </button>
                                            <br>
                                            <h3><?= $data['judul']; ?></h3>
                                            <hr />
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card-header text-right">
                                            <div class="buttons">
                                                <?php if ($_SESSION['level'] === 'admin') : ?>
                                                    <a href="eKontenPembelajaran.php?id=<?= $data['id_konten']; ?>" class="btn icon rounded-pill btn-warning"><i class="bi bi-pencil"></i></a>
                                                    <a href="hKontenPembelajaran.php?id=<?= $data['id_konten']; ?>" class="btn icon rounded-pill btn-danger" onclick="return confirm('Anda yakin ingin menghapus?'); "><i class="bi bi-trash"></i></a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card-header text-center">
                                            <iframe width=720px; height=400px; src="https://www.youtube.com/embed/<?= $data['link_yt']; ?>" frameborder="0"></iframe>
                                        </div>
                                    </div>
                                </div>


                                <div class="card-body">
                                    <p class="card-text"><?= $data['tulisan']; ?></p>
                                </div>
                                <div class="card-footer text-muted">
                                    #jadipaham
                                </div>
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