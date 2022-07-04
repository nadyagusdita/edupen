<?php
include('koneksi.php');
include('header.php');

$idkarya = $_GET['id'];

$querySelect = $db->query("SELECT * FROM karya WHERE id_karya = $idkarya");
$data = mysqli_fetch_assoc($querySelect);
$id_jeniskarya = $data['id_jeniskarya'];


if (isset($_POST['submit'])) {

    $id_jenistulisan = $_POST['jenistulisan'];
    $judul = $_POST['judul'];
    $tulisan = $_POST['tulisan'];
    $today = date("Y-m-d");

    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $tmpName = $_FILES['gambar']['tmp_name'];
    $error = $_FILES['gambar']['error'];
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    $gambar = $data['gambar'];


    if ($error === 4) {
        $query = "UPDATE karya SET id_jenistulisan='$id_jenistulisan',  judul='$judul', tgl_upload='$today', tulisan='$tulisan', gambar='$gambar' WHERE id_karya='$idkarya'";
        $result = mysqli_query($db, $query);
    } else if (in_array($ekstensiGambar, $ekstensiGambarValid) === true) {
        if ($ukuranFile < 1044070) {
            $namaFileBaru = uniqid();
            $namaFileBaru .= '.' . $ekstensiGambar;
            move_uploaded_file($tmpName, 'assets/images/karya/' . $namaFileBaru);

            $query = "UPDATE karya SET id_jenistulisan='$id_jenistulisan',  judul='$judul', tgl_upload='$today', tulisan='$tulisan', gambar='$namaFileBaru' WHERE id_karya='$idkarya'";
            $result = mysqli_query($db, $query);
        }
    }



    if ($result > 0) {
        header("location: karya.php?berhasil=yes&id=$id_jeniskarya");
    } else {
        // header("location: karya.php?berhasil=no");
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
                            <h3>Karya Tulis</h3>
                            <!-- untuk publikasi disable bagi anggota -->
                            <p class="text-subtitle text-muted">Tambah Karya Tulis</p>
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
                                                <select class="form-control" name="jenistulisan" id="jenistulisan">
                                                    <option value="null" disabled selected> </option>
                                                    <?php
                                                    $query = $db->query("SELECT * from jenis_tulisan");

                                                    while ($qtabel = $query->fetch_assoc()) {
                                                        if ($qtabel['id_jenistulisan'] == $data['id_jenistulisan']) {
                                                            echo '<option value="' . $qtabel['id_jenistulisan'] . '" selected>' . $qtabel['nama_jenistulisan'] . '</option>';
                                                        } else {
                                                            echo '<option value="' . $qtabel['id_jenistulisan'] . '">' . $qtabel['nama_jenistulisan'] . '</option>';
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group mb-3">
                                                <label for="judul" class="mb-1">Judul</label>
                                                <input type="text" id="judul" class="form-control" name="judul" value="<?= $data['judul']; ?>">
                                            </div>
                                        </div>
                                        <div class=" col-12">
                                            <div class="form-group mb-3">
                                                <label for="gambar" class="mb-1">Foto</label>
                                                <input type="file" id="gambar" class="form-control" name="gambar" value="<?= $data['gambar']; ?>">
                                            </div>
                                        </div>
                                        <div class=" col-12">
                                            <div class="form-group mb-3">
                                                <label for="tulisan" class="mb-1">Tulisan</label>
                                                <textarea class="ckeditor" id="ckedtor" name="tulisan"><?= $data['tulisan'] ?></textarea>
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