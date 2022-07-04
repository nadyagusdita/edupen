<?php
include('koneksi.php');
include('header.php');

$id = $_SESSION['id_user'];

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
                <h3>Selamat Datang!</h3>
            </div>

            <div class="page-content">
                <section>
                    <?php if ($_SESSION['level'] === 'admin') {
                    ?>
                        <div class="row">
                            <div class="col-xl-4 col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-8">
                                                <h5 class="card-title">Konten</h5>
                                            </div>
                                            <div class="col-4">
                                                <?php
                                                $query1   = $db->query("SELECT count(id_konten) as jumlah_konten FROM konten");
                                                $data1 = mysqli_fetch_assoc($query1);
                                                ?>
                                                <h5 style="text-align: right; text-shadow: 1px 1px 1px lightblue;"> <?php echo $data1['jumlah_konten']; ?> </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">

                                            <p class="card-text">Konten untuk pembelajaran tentang penulisan</p>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-8">
                                                <h5 class="card-title">Karya</h5>
                                            </div>
                                            <div class="col-4">
                                                <?php
                                                $query1   = $db->query("SELECT count(id_karya) as jumlah_karya FROM karya");
                                                $data1 = mysqli_fetch_assoc($query1)
                                                ?>
                                                <h5 style="text-align: right; text-shadow: 1px 1px 1px lightblue;"> <?php echo $data1['jumlah_karya']; ?> </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">

                                            <p class="card-text">Tulisan hasil karya penulis yang ada pada aplikasi</p>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-8">
                                                <h5 class="card-title">Anggota</h5>
                                            </div>
                                            <div class="col-4">
                                                <?php
                                                $query1   = $db->query("SELECT count(id_user) as jumlah_anggota FROM user WHERE level='anggota'");
                                                $data1 = mysqli_fetch_assoc($query1);
                                                ?>
                                                <h5 style="text-align: right; text-shadow: 1px 1px 1px lightblue;"> <?php echo $data1['jumlah_anggota']; ?> </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">

                                            <p class="card-text">User yang bergabung sebagai penulis ataupun belajar nulis</p>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } else {
                    ?>
                        <div class="row">
                            <div class="col-xl-4 col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-8">
                                                <h5 class="card-title">Karya</h5>
                                            </div>
                                            <div class="col-4">
                                                <?php
                                                $query1   = $db->query("SELECT count(id_karya) as jumlah_karya FROM karya WHERE id_penulis=$id");
                                                $data1 = mysqli_fetch_assoc($query1)
                                                ?>
                                                <h5 style="text-align: right; text-shadow: 1px 1px 1px lightblue;"> <?php echo $data1['jumlah_karya']; ?> </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">

                                            <p class="card-text">Tulisan hasil karya yang sudah Anda buat pada aplikasi</p>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                </section>
            </div>

            <?php include 'footer.php' ?>

        </div>
    </div>
