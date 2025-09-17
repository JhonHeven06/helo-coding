<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Produk</title>
</head>
<body>
    <h2>Daftar Produk E-Commerce</h2>

    <!-- Filter Produk -->
    <form method="get" action="">
        <label for="kategori">Filter Kategori:</label>
        <select name="kategori" id="kategori">
            <option value="">-- Semua Kategori --</option>
            <option value="Elektronik">Elektronik</option>
            <option value="Fashion">Fashion</option>
            <option value="Makanan">Makanan</option>
        </select>
        <input type="submit" value="Filter">
    </form>
    <hr>

    <?php
    // Ambil kategori dari filter
    $kategori = $_GET['kategori'] ?? '';

    // Query ambil produk
    if ($kategori != '') {
        $sql = "SELECT * FROM produk WHERE kategori = '$kategori'";
    } else {
        $sql = "SELECT * FROM produk";
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<ul>";
        while ($row = $result->fetch_assoc()) {
            echo "<li>";
            echo "<b>" . htmlspecialchars($row['nama']) . "</b><br>";
            echo "Harga: Rp " . number_format($row['harga'], 0, ',', '.') . "<br>";
            echo "Kategori: " . htmlspecialchars($row['kategori']) . "<br>";
            echo "Deskripsi: " . htmlspecialchars($row['deskripsi']) . "<br><br>";
            echo "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>Tidak ada produk ditemukan.</p>";
    }

    $conn->close();
    ?>
</body>
</html>
