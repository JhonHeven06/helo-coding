<?php
// Deklarasi variabel dari input form
$nama = $_POST['nama'] ?? '';
$harga = $_POST['harga'] ?? '';
$deskripsi = $_POST['deskripsi'] ?? '';

// Validasi sederhana
if (empty($nama) || empty($harga) || empty($deskripsi)) {
    echo "<h3 style='color:red;'>Error: Semua field wajib diisi!</h3>";
    echo "<a href='form_input.php'>Kembali ke Form</a>";
} else {
    // Operator sederhana: cek harga apakah lebih dari 100000
    if ($harga > 100000) {
        $kategori = "Produk Premium";
    } else {
        $kategori = "Produk Reguler";
    }

    // Tampilkan hasil input
    echo "<h2>Data Produk Berhasil Disimpan</h2>";
    echo "Nama Produk: " . htmlspecialchars($nama) . "<br>";
    echo "Harga Produk: Rp " . number_format($harga, 0, ',', '.') . "<br>";
    echo "Deskripsi: " . htmlspecialchars($deskripsi) . "<br>";
    echo "Kategori: " . $kategori . "<br>";
}
?>
