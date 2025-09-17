<?php
session_start();
require_once 'config.php';

// Ambil semua produk dari database
$stmt = $pdo->query("SELECT * FROM products ORDER BY id DESC");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas E-commerce</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f4f4f4; }
        .container { max-width: 1200px; margin: auto; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        .header { display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid #333; padding-bottom: 10px; margin-bottom: 20px; }
        h1, h2 { color: #333; }
        form { background: #fafafa; padding: 20px; border: 1px solid #ddd; border-radius: 5px; margin-bottom: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], input[type="number"], textarea, input[type="file"] { width: calc(100% - 22px); padding: 10px; border: 1px solid #ccc; border-radius: 4px; }
        button, .btn { padding: 10px 15px; border: none; border-radius: 4px; color: white; cursor: pointer; text-decoration: none; display: inline-block; }
        .btn-success { background-color: #28a745; }
        .btn-info { background-color: #17a2b8; }
        .btn-danger { background-color: #dc3545; }
        .btn-primary { background-color: #007bff; }
        .product-list { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; }
        .product-card { background: #fff; border: 1px solid #ddd; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); text-align: center; }
        .product-card img { width: 100%; height: 200px; object-fit: cover; }
        .product-card-body { padding: 15px; }
        .product-card h3 { margin-top: 0; font-size: 1.2em; }
        .product-card p { margin: 5px 0; color: #555; }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h1>Tugas E-commerce</h1>
        <a href="cart.php" class="btn btn-primary">Lihat Keranjang Belanja (<?php echo count($_SESSION['cart'] ?? []); ?>)</a>
    </div>

    <h2>Tambah Produk Baru</h2>
    <form action="add_product.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Nama Produk:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="description">Deskripsi Produk:</label>
            <textarea id="description" name="description" rows="4" required></textarea>
        </div>
        <div class="form-group">
            <label for="price">Harga Produk:</label>
            <input type="number" id="price" name="price" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="image">Upload Gambar:</label>
            <input type="file" id="image" name="image" accept="image/*" required>
        </div>
        <button type="submit" class="btn btn-success">Tambahkan Produk</button>
    </form>

    <hr>

    <h2>Daftar Produk</h2>
    <div class="product-list">
        <?php if (count($products) > 0): ?>
            <?php foreach ($products as $product): ?>
                <div class="product-card">
                    <img src="<?php echo htmlspecialchars($product['image_url']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                    <div class="product-card-body">
                        <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                        <p>Harga: Rp<?php echo number_format($product['price'], 2, ',', '.'); ?></p>
                        <p><?php echo htmlspecialchars($product['description']); ?></p>
                        <a href="edit_product.php?id=<?php echo $product['id']; ?>" class="btn btn-info">Edit</a>
                        <a href="delete_product.php?id=<?php echo $product['id']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">Hapus</a>
                        <form action="add_to_cart.php" method="POST" style="margin-top: 10px;">
                            <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                            <button type="submit" class="btn btn-primary">Tambahkan ke Keranjang</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Belum ada produk yang ditambahkan.</p>
        <?php endif; ?>
    </div>
</div>

</body>
</html>
