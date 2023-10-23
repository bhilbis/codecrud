<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $no_inventaris = $_POST['no_inventaris'];
    $judul_buku = $_POST['judul_buku'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];

    // Insert data ke database
    $query = "INSERT INTO buku (no_inventaris, judul_buku, penulis, penerbit) VALUES ('$no_inventaris', '$judul_buku', '$penulis', '$penerbit')";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        header("Location: index.php");
    } else {
        echo "Gagal menambahkan buku.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add</title>
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
            width: 95%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }
        .center-button {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
    <h1>Daftar Buku Baru</h1>
    <form class="form" method="POST">
        No Inventaris: <input type="text" name="no_inventaris"><br>
        Judul Buku: <input type="text" name="judul_buku"><br>
        Penulis: <input type="text" name="penulis"><br>
        Penerbit: <input type="text" name="penerbit"><br>
        <div class="center-button">
                <input type="submit" value="Add">
            </div>
    </form>
    </div>
    <a href="index.php">Kembali</a>
</body>
</html>
