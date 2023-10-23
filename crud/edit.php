<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $judul_buku = $_POST['judul_buku'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];

    // Update data di database
    $query = "UPDATE buku SET judul_buku = '$judul_buku', penulis = '$penulis', penerbit = '$penerbit' WHERE id = $id";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        header("Location: index.php");
    } else {
        echo "Gagal memperbarui informasi buku.";
    }
} else {
    $id = $_GET['id'];
    $query = "SELECT * FROM buku WHERE id = $id";
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Buku</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .container {
            text-align: center;
            background-color: #f4f4f4;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
        .form {
            text-align: left;
            max-width: 300px;
            margin: 0 auto;
        }
        .form input[type="text"] {
            width: 93%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .center-button {
            text-align: center;
        }
        .form input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Buku</h1>
        <form class="form" method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            No Inventaris: <input type="text" name="no_inventaris" value="<?php echo $row['no_inventaris']; ?>"><br>
            Judul Buku: <input type="text" name="judul_buku" value="<?php echo $row['judul_buku']; ?>"><br>
            Penulis: <input type="text" name="penulis" value="<?php echo $row['penulis']; ?>"><br>
            Penerbit: <input type="text" name="penerbit" value="<?php echo $row['penerbit']; ?>"><br>
            <div class="center-button">
                <input type="submit" value="Simpan">
            </div>
        </form>
    </div>
    <a href="index.php">Kembali</a>
</body>
</html>
