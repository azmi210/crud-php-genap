<!DOCTYPE html>
<html>
<head>
    <title>:: Data Biodata ::</title>
    <script type="text/javascript">
        function delete_data(id) {
            if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
                window.location.href = 'delete.php?id=' + id;
            }
        }
    </script>
</head>
<body>

<?php
// Memasukkan koneksi database
include 'koneksi.php';

// Mengambil semua data yang tersimpan di database
$query = "SELECT * FROM biodata";

// Eksekusi pengambilan data
$result = $mysqli->query($query);

// Mengambil jumlah baris yang ada dalam database
$num_results = $result->num_rows;

// Menautkan ke file tambah.php untuk membuat record baru
echo "<div><a href='tambah.php'>Tambah Data Baru</a></div>";

if ($num_results > 0) { // Berarti telah ada record dalam database
    echo "<table border='1'>"; // Awal tabel
    // Membuat heading tabel
    echo "<tr>";
        echo "<th>Nama</th>";
        echo "<th>Alamat</th>";
        echo "<th>Hobi</th>";
        echo "<th>Aksi</th>";
    echo "</tr>";

    // Pengulangan untuk melihat masing-masing record
    while ($row = $result->fetch_assoc()) {
        // Membuat baris tabel baru per record
        echo "<tr>";
            echo "<td>{$row['nama']}</td>";
            echo "<td>{$row['alamat']}</td>";
            echo "<td>{$row['hobi']}</td>";
            echo "<td>";
                // Tautan untuk mengedit data
                echo "<a href='edit.php?id={$row['id_biodata']}'>Edit</a>";
                echo " / ";
                // Tautan untuk menghapus data
                echo "<a href='#' onclick='delete_data({$row['id_biodata']});'>Hapus</a>";
            echo "</td>";
        echo "</tr>";
    }
    echo "</table>"; // Akhir tabel
} else {
    // Jika tabel database kosong
    echo "Data tidak ditemukan";
}

$result->free();
$mysqli->close();
?>

</body>
</html>
