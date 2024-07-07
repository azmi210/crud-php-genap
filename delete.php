<?php
if (isset($_GET['id'])) {
    // Memasukkan koneksi ke database
    include 'koneksi.php';

    // Menghapus data berdasarkan id
    $id = $mysqli->real_escape_string($_GET['id']);
    $query = "DELETE FROM biodata WHERE id_biodata = $id";

    // Eksekusi penghapusan data
    if ($mysqli->query($query)) {
        echo "Data berhasil dihapus";
    } else {
        echo "Gagal menghapus data: " . $mysqli->error;
    }

    // Menutup koneksi ke database
    $mysqli->close();

    // Redirect ke halaman utama setelah penghapusan
    header("Location: index.php");
} else {
    echo "ID tidak ditemukan";
}
?>
