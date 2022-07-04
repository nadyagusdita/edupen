<?php
if (isset($_GET['file'])) {
    $file    = $_GET['file'];

    $back_dir    = "assets/files/";
    $file = $back_dir . $_GET['file'];

    if (file_exists($file)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($file));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: private');
        header('Pragma: private');
        header('Content-Length: ' . filesize($file));
        ob_clean();
        flush();
        readfile($file);

        exit;
    } else {
        $_SESSION['pesan'] = "Oops! File - $file - not found ...";
        header("location:hasilTulisan.php");
    }
}
?>