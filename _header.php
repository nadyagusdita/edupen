<?php
include('admin/koneksi.php');
$result = mysqli_query($db, "SELECT * FROM jenis_tulisan");
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/css/splide.min.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="shortcut icon" href="assets/img/logo-edupen.svg">
    <title>EDUPEN</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="assets/img/logo-edupen.svg" alt="" width="240" class="d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item mx-4">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item dropdown mx-4">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Telusuri
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <?php while ($data = mysqli_fetch_assoc($result)) : ?>
                                <li><a class="dropdown-item" href="telusuri.php?id=<?= $data['id_jenistulisan']; ?>"><?= $data['nama_jenistulisan']; ?></a></li>
                            <?php endwhile ?>

                        </ul>
                    </li>
                    <li class="nav-item mx-4">
                        <a class="nav-link" href="list-karya.php"><i class="bi bi-search small"></i> Cari</a>
                    </li>
                </ul>
                <div class="btn-masuk me-5 ms-4 ms-lg-0">
                    <a class="btn btn-medium text-white" href="login.php">Masuk</a>
                </div>
            </div>
        </div>
    </nav>