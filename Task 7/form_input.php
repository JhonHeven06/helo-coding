<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Input Produk</title>
</head>
<body>
    <h2>Form Input Produk Baru</h2>
    <form action="proses.php" method="post">
        <label for="nama">Nama Produk:</label><br>
        <input type="text" name="nama" id="nama"><br><br>
        <label for="harga">Harga Produk:</label><br>
        <input type="number" name="harga" id="harga"><br><br>

        <label for="deskripsi">Deskripsi Produk:</label><br>
        <textarea name="deskripsi" id="deskripsi"></textarea><br><br>

        <input type="submit" value="Simpan Produk">
    </form>
</body>
</html>
