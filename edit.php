<html>
<head>
    <title>Edit Data</title>
</head>
<body>

<?php
// Memasukkan koneksi database
include 'koneksi.php';

// Jika ada tindakan user
$action = isset($_POST['action']) ? $_POST['action'] : "";

if ($action == "update") { // Jika pengguna menekan tombol kirim
    $id = $mysqli->real_escape_string($_POST['id_biodata']);
    $nama = $mysqli->real_escape_string($_POST['nama']);
    $alamat = $mysqli->real_escape_string($_POST['alamat']);
    $hobi = $mysqli->real_escape_string($_POST['hobi']);

    $query = "UPDATE biodata SET
                nama = '$nama',
                alamat = '$alamat',
                hobi = '$hobi'
              WHERE id_biodata = '$id'";

    // Eksekusi variabel query
    if ($mysqli->query($query)) {
        // Jika memperbarui data berhasil
        echo "Data berhasil diubah";
    } else {
        // Jika tidak dapat memperbarui data baru
        echo "Data gagal diubah: " . $mysqli->error;
    }
}

// Pilih data dalam database tertentu untuk diperbarui
$id = $mysqli->real_escape_string($_GET['id']);
$query = "SELECT id_biodata, nama, alamat, hobi
          FROM biodata
          WHERE id_biodata = '$id'
          LIMIT 0,1";

// Eksekusi variabel query
$result = $mysqli->query($query);

// Mendapatkan hasilnya
$row = $result->fetch_assoc();

// Tetapkan hasilnya ke variabel tertentu sehingga formulir HTML kita akan terisi dengan nilai
$id = $row['id_biodata'];
$nama = $row['nama'];
$alamat = $row['alamat'];
$hobi = $row['hobi'];
?>

<!-- Tampilan dimana form input pembaruan yang akan dibuat -->
<form action='edit.php?id=<?php echo $id; ?>' method='post' border='0'>
    <table>
        <tr>
            <td>Nama</td>
            <td><input type='text' name='nama' value='<?php echo $nama; ?>' required/></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><input type='text' name='alamat' value='<?php echo $alamat; ?>' required/></td>
        </tr>
        <tr>
            <td>Hobi</td>
            <td><input type='text' name='hobi' value='<?php echo $hobi; ?>' required/></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <!-- Supaya kita dapat mengidentifikasi catatan apa yang akan diperbarui -->
                <input type='hidden' name='id_biodata' value='<?php echo $id ?>' />
                
                <!-- Kita akan mengatur tindakan untuk memperbarui -->
                <input type='hidden' name='action' value='update' />
                <input type='submit' value='Edit'/>

                <a href='index.php'>Kembali ke Halaman Utama</a>
            </td>
        </tr>
    </table>
</form>

</body>
</html>
