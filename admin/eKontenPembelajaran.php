<?php
include('koneksi.php');
include('header.php');

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM konten, jenis_tulisan WHERE konten.id_jenistulisan=jenis_tulisan.id_jenistulisan AND id_konten='$id'";
$query = mysqli_query($db, $sql);
$data_konten = mysqli_fetch_assoc($query);

$id_konten = $data_konten['id_konten'];
$id_jenistulisan = $data_konten['id_jenistulisan'];
$judul = $data_konten['judul'];
$tulisan = $data_konten['tulisan'];
$link_yt = $data_konten['link_yt'];

// jika data yang di-edit tidak ditemukan
if (mysqli_num_rows($query) < 1) {
    die("data tidak ditemukan...");
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
                            <p class="text-subtitle text-muted">Edit konten pembelajaran</p>
                        </div>
                    </div>
                    <a href="satuKonten.php?id=<?= $data_konten['id_konten']; ?>" class="btn btn-primary">Kembali</a>
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
                                            <select class="form-select" id="id_jenistulisan" name="id_jenistulisan" required="required">
                                                <option value="<?php echo $data_konten['id_jenistulisan'] ?>"><?php echo  $data_konten['nama_jenistulisan']; ?> </option>
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
                                            <input type="text" id="judul" class="form-control" name="judul" value="<?php echo $judul; ?>" required="required" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class=" col-12">
                                        <div class="form-group mb-3">
                                            <label for="tulisan" class="mb-1">Tulisan</label>
                                            <textarea class="ckeditor" id="ckedtor" name="tulisan"><?php echo $tulisan; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group mb-3">
                                            <label for="link_yt" class="mb-1">Video Pembelajaran</label>
                                            <input type="text" id="link_yt" class="form-control" name="link_yt" value="<?php echo $link_yt; ?>" required="required" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1" name="submit">Submit</button>
                                        <button type="reset" class="btn btn-danger me-1 mb-1">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>

        <?php include('footer.php') ?>
