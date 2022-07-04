<?php
include 'koneksi.php';

$id = $_GET['id'];
$querySelect = $db->query("SELECT * FROM karya WHERE id_karya = $id");
$data = mysqli_fetch_assoc($querySelect);
$id_jeniskarya = $data['id_jeniskarya'];

$result = mysqli_query($db, "DELETE FROM karya WHERE id_karya = '$id'");

if ($result > 0) {
    header("location: karya.php?berhasil=yes&id=$id_jeniskarya");
} else {
    header("location: karya.php?berhasil=no");
}
