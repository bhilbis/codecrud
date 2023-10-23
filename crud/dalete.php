<?php
include 'koneksi.php';

$id = $_GET['id'];

// Hapus data dari database
$query = "DELETE FROM buku WHERE id = $id";
$result = mysqli_query($koneksi, $query);

if ($result) {
    header("Location: index.php");
} else {
    echo "Gagal menghapus buku.";
}
?>
