<?php
include('koneksi.php');
include('header.php');

$idpeminta = $_SESSION['id_user'];

$idpenulis = $_GET['id'];
if (isset($_POST['submit'])) {
    $id_jenistulisan = $_POST['jenistulisan'];
    $tgl = $_POST['tgl'];
    $desk = $_POST['tulisan'];

    $query = "INSERT INTO permintaan_karya SET id_jeniskarya=3, id_jenistulisan='$id_jenistulisan', id_peminta='$idpeminta', status='Diajukan',tgl_batasupload='$tgl', keterangan='$desk'";
    $result = mysqli_query($db, $query);

    if ($result > 0) {
        $query1 = $db->query("SELECT MAX(id_permintaan) FROM permintaan_karya");
        $data = mysqli_fetch_assoc($query1);
        $id_permintaan = $data['MAX(id_permintaan)'];

        $query = "INSERT INTO detail_permintaan SET id_permintaan='$id_permintaan', id_penulis='$idpenulis'";
        $result1 = mysqli_query($db, $query);

        if ($result1 > 0) {
            header("location: mintaTulisan.php");
        } else {
            // header("location: karya.php?berhasil=no");
        };
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
                            <h3>Jasa Tulis</h3>
                            <!-- untuk publikasi disable bagi anggota -->
                            <p class="text-subtitle text-muted">Tambah Permintaan Jasa Tulis</p>
                        </div>
                    </div>
                </div>

                <section class="section">
                    <div class="card">
                        <div class="card-body">
                            <form class="form form-vertical" method="POST" action="" enctype="multipart/form-data">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group mb-3">
                                                <label for="jndtulisan" class="mb-1">Jenis Tulisan </label>
                                                <select required class="form-control" name="jenistulisan" id="jenistulisan">
                                                    <option disabled selected> Jenis Tulisan</option>
                                                    <?php
                                                    $query = $db->query("SELECT * from jenis_tulisan");
                                                    while ($data = mysqli_fetch_assoc($query)) :
                                                    ?>
                                                        <option value="<?= $data['id_jenistulisan']; ?>"><?= $data['nama_jenistulisan']; ?></option>
                                                    <?php endwhile; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group mb-3">
                                                <label for="judul" class="mb-1">Deadline Hasil Karya</label>
                                                <input required type="date" id="tgl" class="form-control" name="tgl">
                                            </div>
                                        </div>
                                        <div class=" col-12">
                                            <div class="form-group mb-3">
                                                <label for="tulisan" class="mb-1">Deskripsi</label>
                                                <textarea required class="ckeditor" id="ckedtor" name="tulisan"></textarea>
                                            </div>
                                        </div>

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
            </section>
        </div>

        <?php
        include('footer.php');
        ?>