<?php
require_once 'config.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: index.php");
    exit;
}

// Ambil data produk yang akan diedit
$stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
$stmt->execute([$id]);
$product = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$product) {
    echo "Produk tidak ditemukan.";
    exit;
}

// Proses pembaruan data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image_url = $_POST['current_image_url'];

    if (!empty($_FILES["image"]["name"])) {
        $target_dir = "uploads/";
        $image_file = $target_dir . basename($_FILES["image"]["name"]);
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $image_file)) {
            $image_url = $image_file;
        } else {
            echo "Maaf, ada error saat mengupload gambar.";
        }
    }

    try {
        $stmt = $pdo->prepare("UPDATE products SET name = ?, description = ?, price = ?, image_url = ? WHERE id = ?");
        $stmt->execute([$name, $description, $price, $image_url, $id]);
        header("Location: index.php");
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Produk</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f4f4f4; }
        .container { max-width: 800px; margin: auto; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        form { background: #fafafa; padding: 20px; border: 1px solid #ddd; border-radius: 5px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], input[type="number"], textarea, input[type="file"] { width: calc(100% - 22px); padding: 10px; border: 1px solid #ccc; border-radius: 4px; }
        button, .btn { padding: 10px 15px; border: none; border-radius: 4px; color: white; cursor: pointer; text-decoration: none; }
        .btn-info { background-color: #17a2b8; }
        .btn-secondary { background-color: #6c757d; }
    </style>
</head>
<body>
<div class="container">
    <h2>Edit Produk</h2>
    <form action="edit_product.php?id=<?php echo $product['id']; ?>" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="current_image_url" value="<?php echo htmlspecialchars($product['image_url']); ?>">
        <div class="form-group">
            <label for="name">Nama Produk:</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($product['name']); ?>" required>
        </div>
        <div class="form-group">
            <label for="description">Deskripsi Produk:</label>
            <textarea id="description" name="description" rows="4" required><?php echo htmlspecialchars($product['description']); ?></textarea>
        </div>
        <div class="form-group">
            <label for="price">Harga Produk:</label>
            <input type="number" id="price" name="price" step="0.01" value="<?php echo htmlspecialchars($product['price']); ?>" required>
        </div>
        <div class="form-group">
            <label for="image">Gambar Produk Saat Ini:</label>
            <img src="<?php echo htmlspecialchars($product['image_url']); ?>" alt="Gambar Produk" style="max-width: 200px; display: block; margin-top: 10px;">
        </div>
        <div class="form-group">
            <label for="new_image">Pilih Gambar Baru (jika ingin mengubah):</label>
            <input type="file" id="new_image" name="image" accept="image/*">
        </div>
        <button type="submit" class="btn btn-info">Simpan Perubahan</button>
        <a href="index.php" class="btn btn-secondary">Batal</a>
    </form>
</div>
</body>
</html>
