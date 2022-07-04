<?php include('koneksi.php');

$id = $_GET['id'];
$statement = $db->prepare("DELETE FROM konten WHERE id_konten = ?");
$statement->bind_param('i', $id);
$statement->execute();

if ($statement) {
    header("location:kontenPembelajaran.php?berhasil=yes");
} else {
    header("location:kontenPembelajaran.php?berhasil=no");
}
