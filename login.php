<?php
session_start();
include 'admin/koneksi.php';

if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $result = mysqli_query($db, "SELECT * FROM user WHERE email = '$email'");
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            if ($row['level'] === 'admin') {
                $_SESSION['id_user'] = $row['id_user'];
                $_SESSION['level'] = $row['level'];
                header("Location: admin/dashboard.php");
                exit;
            } else if ($row['level'] === 'anggota') {
                $_SESSION['id_user'] = $row['id_user'];
                $_SESSION['level'] = $row['level'];
                header("Location: admin/dashboard.php");
                exit;
            }
        }
    }
    $erorr = true;
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="shortcut icon" href="assets/img/logo-edupen.svg">
    <title>Masuk</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="assets/img/logo-edupen.svg" alt="" width="200" class="d-inline-block align-text-top">
            </a>
        </div>
    </nav>

    <section style="box-sizing: border-box; background-color: #f5f5f5">
        <div class="content-4-1 align-items-center h-100 " style="font-family: 'Poppins', sans-serif">
            <div class="d-flex mx-auto align-items-center justify-content-center mx-lg-0" style=" background-color: #fcfdff; padding: 4rem 2rem;">

                <div class="card" style="padding: 100px;">
                    <?php if (isset($_GET['berhasil']) == 'yes') : ?>
                        <div class="alert alert-success alert-dismissible show fade">
                            Berhasil mendaftar. Silahkan masuk.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <?php if (isset($erorr)) { ?>
                        <div class="alert alert-danger" role="alert">
                            Username / Password salah!
                        </div>
                    <?php } ?>

                    <div class="mx-lg-0 mx-auto" style="background-color: #fff;">
                        <h3 class="title-text">Masuk untuk melanjutkan</h3>
                        <p class="caption-text">
                            Mohon login dengan akun yang <br />
                            sudah terdaftar di website.
                        </p>
                        <form style="margin-top: 1.5rem" action="" method="post">
                            <div style="margin-bottom: 1.75rem">
                                <label for="" class="d-block input-label">Email</label>
                                <div class="d-flex w-100 div-input">
                                    <div class="icon" style="margin-right: 1rem" width="24" height="24" viewBox="0 0 24 24">
                                        <i class="bi bi-envelope-fill" style="color: #cacbce"></i>
                                    </div>
                                    <input class="input-field border-0" type="email" name="email" placeholder="Email anda" autocomplete="off" required />
                                </div>
                            </div>
                            <div style="margin-top: 1rem">
                                <label for="" class="d-block input-label">Password</label>
                                <div class="d-flex w-100 div-input">
                                    <div class="icon" style="margin-right: 1rem" width="24" height="24" viewBox="0 0 24 24">
                                        <i class="bi bi-lock-fill" style="color: #cacbce"></i>
                                    </div>
                                    <input class="input-field border-0" type="password" name="password" id="password-content-4-1" placeholder="Password anda" minlength="6" required />
                                    <div onclick="togglePassword()">
                                        <div style="margin-left: 0.75rem; cursor: pointer" width="20" height="14" viewBox="0 0 20 14">
                                            <i class="bi bi-eye-fill" style="color: #cacbce"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end" style="margin-top: 0.75rem">
                                <!-- <a href="#" class="forgot-password fst-italic">Forgot Password?</a> -->
                            </div>
                            <button class="btn btn-fill text-white d-block w-100" type="submit" name="login">
                                Masuk ke Akun
                            </button>
                        </form>
                        <p class="text-center bottom-caption">
                            Belum punya akun?
                            <span class="green-bottom-caption"><a href="register.php" style="color: #2ec49c;">Daftar disini</a> </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </section>


    <footer class="section-footer bg-white">
        <div class="container mb-2">
            <div class="row justify-content-center">
                <div class="col mt-5">
                    <img src="assets/img/logo-edupen.svg"> <br>
                    <div class="socmed" style="margin-left: 80px">
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-twitter"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center py-4">
                <div class="col-auto text-gray-500 font-weight-light">
                    &copy; 2022 Copyright Edupen • All rights reserved • Made in Indonesia
                </div>
            </div>
        </div>
    </footer>


    <script>
        function togglePassword() {
            var x = document.getElementById("password-content-4-1");
            if (x.type === "password") {
                x.type = "text";
                document
                    .getElementById("icon-toggle")
                    .setAttribute("fill", "#2ec49c");
            } else {
                x.type = "password";
                document
                    .getElementById("icon-toggle")
                    .setAttribute("fill", "#CACBCE");
            }
        }
    </script>
</body>

</html>