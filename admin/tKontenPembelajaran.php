<?php
include('koneksi.php');
include('header.php');

//submit
if (isset($_POST['submit'])) {
    $query = mysqli_query($db, "SELECT max(id_konten) as kodeTerbesar FROM konten");
    $data = mysqli_fetch_array($query);
    $urutan = $data['kodeTerbesar'];

    $urutan++;
    $id_konten = $urutan;
    $id_jenistulisan = $_POST['id_jenistulisan'];
    $judul = $_POST['judul'];
    $tulisan = $_POST['tulisan'];
    $link_yt = substr($_POST['link_yt'], -11);

    $result = mysqli_query($db, "INSERT INTO konten VALUES('$id_konten','$id_jenistulisan','$judul','$tulisan','$link_yt')");
    if ($result > 0) {
        header("location: kontenPembelajaran.php?berhasil=yes");
    } else {
        header("location: kontenPembelajaran.php?berhasil=no");
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
                            <h3>Konten Pembelajaran</h3>
                            <p class="text-subtitle text-muted">Tambah konten pembelajaran</p>
                        </div>
                    </div>
                    <a href="kontenPembelajaran.php" class="btn btn-primary">Kembali</a>
                </div>
            </div>

            <section class="section">
                <div class="card">
                    <div class="card-body">
                        <form class="form form-vertical" method="POST" action="" enctype="multipart/form-data" onsubmit="return confirm('Apakah data ini akan dihapus?');">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group mb-3">
                                            <label for="id_jenistulisan" class="mb-1">Jenis Tulisan</label>
                                            <select required class="form-select" id="id_jenistulisan" name="id_jenistulisan" required="required">
                                                <option hidden>Pilih</option>
                                                <?php
                                                $query = "SELECT * FROM jenis_tulisan";
                                                $result = mysqli_query($db, $query);

                                                while ($data = mysqli_fetch_assoc($result)) { ?>
                                                    <option value="<?php echo $data['id_jenistulisan']; ?>"><?php echo $data['nama_jenistulisan']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group mb-3">
                                            <label for="judul" class="mb-1">Judul Tulisan</label>
                                            <input required type="text" id="judul" class="form-control" name="judul" required="required" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class=" col-12">
                                        <div class="form-group mb-3">
                                            <label for="tulisan" class="mb-1">Tulisan</label>
                                            <textarea required class="ckeditor" id="ckedtor" name="tulisan"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group mb-3">
                                            <label for="link_yt" class="mb-1">Video Pembelajaran</label>
                                            <input required type="text" id="link_yt" class="form-control" name="link_yt" required="required" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1" name="submit">Submit</button>
                                        <button type="reset" class="btn btn-danger me-1 mb-1" onClick="confirm('Apakah anda yakin akan reset form?')">Reset</button>
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
                    <p>2021 &copy; BEM KM FTI UNAND</p>
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