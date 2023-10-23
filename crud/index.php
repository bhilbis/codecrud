<?php
include 'koneksi.php';
// Membaca data dari database
$query = "SELECT * FROM buku";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Perpustakaan</title>
    <style>
         body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 95vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .container {
            text-align: center;
            padding: 50px;
            border-radius: 5px;
            
        }
        .table-container {
            margin-top: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 15px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .button-container {
            margin-top: 25px;
        }
        .button {
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
        a {
            text-decoration: none;
        }
    </style>
</head>
<body>
        <div class="container">
    <?php
    if (mysqli_num_rows($result) > 0) {
        echo "<h1>Daftar Buku</h1>";
    }
    ?>
    <div class="table-container">
    <?php
    if (mysqli_num_rows($result) > 0) {
        echo '<table border="1">
            <tr>
                <th>No Inventaris</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th colspan="2">Perubahan</th>
            </tr>';
        
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['no_inventaris'] . "</td>";
            echo "<td>" . $row['judul_buku'] . "</td>";
            echo "<td>" . $row['penulis'] . "</td>";
            echo "<td>" . $row['penerbit'] . "</td>";
            echo "<td> <a href='edit.php?id=" . $row['id'] . "'>Edit</a></td>"; 
            echo "<td> <a href='dalete.php?id=" . $row['id'] . "'>Hapus</a></td>";
            echo "</tr>";
        }
        echo '</table>';
    } else {
        echo "Tidak ada buku yang terdaftarkan.";
    }
    ?>
    </div>
<div class="button-container">
<a href="add.php" class="button">Tambah Daftar Buku Baru</a>
</div>
</div>
</body>
</html>
