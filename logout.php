<?php
session_start();
session_unset();
$_SESSION = [];
session_destroy();

echo "<script>
        alert('Anda berhasil keluar!');
        document.location.href = 'index.php';
    </script>";
