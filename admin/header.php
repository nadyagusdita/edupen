<?php

session_start();

if (!isset($_SESSION['level']) && !isset($_SESSION['id_user'])) {
    header('location: ../login.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edupen </title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link href="assets/images/bg/icon.png" rel="shortcut icon">
    <script type="text/javascript" src="assets/js/ckeditor/ckeditor.js"></script>
    <style>
        body {
            background-color: #dae9e4;
        }
    </style>
</head>