<?php
include('header.php');
include('koneksi.php');

$id = $_SESSION['id_user'];

$query = mysqli_query($db, "SELECT * FROM detail_permintaan
INNER JOIN permintaan_karya ON detail_permintaan.id_permintaan = permintaan_karya.id_permintaan
INNER JOIN user ON permintaan_karya.id_peminta = user.id_user
WHERE detail_permintaan.id_penulis = $id AND permintaan_karya.id_peminta != $id");

if (isset($_POST['submit'])) {
    $status = $_POST['status'];
    $id = $_POST['id_permintaan'];

    $update = "UPDATE permintaan_karya SET status = $status WHERE id_permintaan = $id";
    $res = mysqli_query($db, $update);

    var_dump($update);
    die;

    if ($res > 0) {
        header("location: mintaTulisan.php?berhasil=yes");
    } else {
        header("location: mintaTulisan.php?berhasil=no");
    }
}

if (isset($_POST['file'])) {
    $id = $_POST['id_permintaan'];

    $namaFile = $_FILES['file']['name'];
    $ukuranFile = $_FILES['file']['size'];
    $tmpNameFile = $_FILES['file']['tmp_name'];
    $error = $_FILES['file']['error'];
    $ekstensiFileValid = ['doc', 'docx', 'pdf'];
    $ekstensiFile = explode('.', $namaFile);
    $ekstensiFile = strtolower(end($ekstensiFile));

    if (in_array($ekstensiFile, $ekstensiFileValid) === true) {
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.' . $ekstensiFile;
        move_uploaded_file($tmpNameFile, 'assets/files' . $namaFileBaru);

        $update = "UPDATE permintaan_karya SET status = 'Selesai', file = '$namaFileBaru' WHERE id_permintaan = $id";
        $res = mysqli_query($db, $update);
    }

    var_dump($update);
    die;
    if ($res > 0) {
        header("location: mintaTulisan.php?berhasil=yes");
    } else {
        header("location: mintaTulisan.php?berhasil=no");
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
                        <div class="col-12 col-md-6 order-md-1 order-last mb-4">
                            <h3>Permintaan Tulisan</h3>
                            <p class="text-subtitle text-muted">Kelola permintaan jasa tulis</p>
                        </div>
                    </div>

                    <section class="section">
                        <div class="col-4">
                            <?php if (isset($_GET['berhasil']) == 'yes') : ?>
                                <div class="alert alert-success alert-dismissible show fade">
                                    Berhasil.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php endif; ?>
                        </div>
                    </section>
                </div>

                <section class="section">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>Nama Peminta</th>
                                        <th>Batas Upload</th>
                                        <th>Keterangan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (mysqli_num_rows($query)) : ?>
                                        <?php
                                        while ($data = mysqli_fetch_assoc($query)) : ?>
                                            <tr>
                                                <td><?= $data['nama_user']; ?></td>
                                                <td><?= $data['tgl_batasupload']; ?></td>
                                                <td><?= $data['keterangan']; ?></td>
                                                <?php
                                                if ($data['status'] == 'Diajukan') $status = 'Diajukan';
                                                if ($data['status'] == '1') $status = 'Dikerjakan';
                                                if ($data['status'] == '0') $status = 'Ditolak';
                                                if ($data['file'] != NULL) $status = 'Selesai';
                                                ?>
                                                <td><?= $status; ?></td>
                                                <td>

                                                    <form action="" method="POST" enctype="multipart/form-data">
                                                        <input type="hidden" name="id_permintaan" value="<?= $data['id_permintaan']; ?>">
                                                        <?php
                                                        if ($data['status'] === 'Diajukan') : ?>

                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="status" id="ya" value="1">
                                                                <label class="form-check-label" for="ya">
                                                                    <i class="bi bi-check-square-fill text-success" style="color: green;"></i>
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="status" id="tidak" value="0">
                                                                <label class="form-check-label" for="tidak">
                                                                    <i class="bi bi-x-square-fill text-danger"></i>
                                                                </label>
                                                            </div>

                                                        <?php endif; ?>

                                                        <div class="form-group">
                                                            <?php if ($data['status'] == '1') { ?>

                                                                <label for="file">
                                                                    <i class="bi bi-upload"></i>
                                                                </label>
                                                                <input type="file" name="file" id="file" style="display:none">

                                                            <?php } else if ($data['status'] != '1') {
                                                            ?>

                                                                <label for="file" hidden>
                                                                    <i class="bi bi-upload"></i>
                                                                </label>
                                                                <input type="file" name="file" id="file" style="display:none" accept="application/msword, application/pdf">

                                                            <?php } ?>
                                                        </div>
                                                </td>
                                                <td>
                                                    <?php if ($data['status'] == '1') { ?>

                                                        <button type="submit" class="btn btn-primary me-1 mb-1 btn-sm" name="file" onclick="alert('Yakin menyimpan perubahan status?')">Simpan</button>

                                                    <?php } else if ($data['status'] != '1' && $data['status'] != 'Selesai') {
                                                    ?>

                                                        <button type="submit" class="btn btn-primary me-1 mb-1 btn-sm" name="submit" onclick="alert('Yakin menyimpan perubahan status?')">Simpan</button>

                                                    <?php } else if ($data['status'] == 'Selesai') { ?>

                                                        <button type="submit" class="btn btn-primary me-1 mb-1 btn-sm" name="submit" onclick="alert('Yakin menyimpan perubahan status?')" hidden>Simpan</button>

                                                    <?php } ?>

                                                    </form>
                                                </td>
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