<?php
include('koneksi.php');
include('header.php');

$id = $_GET['id'];
$querySelect = $db->query("SELECT * FROM user WHERE id_user = $id");
$data = mysqli_fetch_assoc($querySelect);

if (isset($_POST['submit'])) {
    $nama = $_POST['nmanggota'];
    $email = $_POST['email'];

    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $tmpName = $_FILES['gambar']['tmp_name'];
    $error = $_FILES['gambar']['error'];
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    $gambar = $data['foto'];

    if ($error === 4) {
        $query = "UPDATE user
            SET nama_user = '$nama', 
            email = '$email',
            foto = '$gambar'
            WHERE id_user = $id";
        $result = mysqli_query($db, $query);
    } else if (in_array($ekstensiGambar, $ekstensiGambarValid) === true) {
        if ($ukuranFile < 1044070) {
            $namaFileBaru = uniqid();
            $namaFileBaru .= '.' . $ekstensiGambar;
            move_uploaded_file($tmpName, 'assets/images/main/' . $namaFileBaru);

            $query = "UPDATE user
            SET nama_user = '$nama', 
            email = '$email',
            foto = '$namaFileBaru'
            WHERE id_user = $id";
            $result = mysqli_query($db, $query);
        }
    }



    if ($result > 0) {
        header("location: profilUser.php?berhasil=yes");
    } else {
        header("location: profilUser.php?berhasil=no");
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
                            <h3>Profil</h3>
                            <p class="text-subtitle text-muted">Edit Profil</p>
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
                                                <label for="nmanggota" class="mb-1">Nama</label>
                                                <input type="text" id="nmanggota" class="form-control" name="nmanggota" value="<?= $data['nama_user']; ?>">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group mb-3">
                                                <label for="email" class="mb-1">Email</label>
                                                <input type="text" id="email" class="form-control" name="email" value="<?= $data['email']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group mb-3">
                                                <label for="gambar" class="mb-1">Foto</label>
                                                <input type="file" id="gambar" class="form-control" name="gambar" value="<?= $data['foto']; ?>">
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