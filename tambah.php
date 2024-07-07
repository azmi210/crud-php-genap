<!DOCTYPE html>
<html>
<head>
    <title>Menambahkan Data</title>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Memasukkan koneksi ke database
    include 'koneksi.php';

    // Data yang akan ditambahkan
    $nama = $mysqli->real_escape_string($_POST['nama']);
    $alamat = $mysqli->real_escape_string($_POST['alamat']);
    $hobi = $mysqli->real_escape_string($_POST['hobi']);

    $query = "INSERT INTO biodata (nama, alamat, hobi) VALUES ('$nama', '$alamat', '$hobi')";

    // Eksekusi penambahan data
    if ($mysqli->query($query)) {
        // Jika sukses menambahkan data
        echo "Data berhasil ditambahkan";
    } else {
        // Jika tidak bisa menambahkan data
        echo "Gagal menambahkan data: " . $mysqli->error;
    }

    // Menutup koneksi ke database
    $mysqli->close();
}
?>

<!-- Tampilan dimana form input yang akan dibuat -->
<form action="tambah.php" method="post">
    <table>
        <tr>
            <td>Nama</td>
            <td><input type="text" name="nama" required/></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><input type="text" name="alamat" required/></td>
        </tr>
        <tr>
            <td>Hobi</td>
            <td><input type="text" name="hobi" required/></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" value="Simpan"/>
                <a href="index.php">Kembali ke Halaman Utama</a>
            </td>
        </tr>
    </table>
</form>

</body>
</html>
