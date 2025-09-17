<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Keranjang Belanja</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f4f4f4; }
        .container { max-width: 800px; margin: auto; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        h1 { color: #333; }
        .cart-item { border: 1px solid #ddd; padding: 10px; margin-bottom: 10px; border-radius: 5px; }
        .cart-total { font-weight: bold; font-size: 1.2em; margin-top: 20px; text-align: right; }
        .btn { padding: 10px 15px; border: none; border-radius: 4px; color: white; cursor: pointer; text-decoration: none; }
        .btn-secondary { background-color: #6c757d; }
    </style>
</head>
<body>
<div class="container">
    <h1>Keranjang Belanja</h1>
    <hr>
    <?php
    $total_harga = 0;
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])):
        foreach ($_SESSION['cart'] as $item):
            $subtotal = $item['price'] * $item['quantity'];
            $total_harga += $subtotal;
    ?>
            <div class="cart-item">
                <p><strong><?php echo htmlspecialchars($item['name']); ?></strong></p>
                <p>Harga: Rp<?php echo number_format($item['price'], 2, ',', '.'); ?></p>
                <p>Jumlah: <?php echo $item['quantity']; ?></p>
                <p>Subtotal: Rp<?php echo number_format($subtotal, 2, ',', '.'); ?></p>
            </div>
    <?php
        endforeach;
    ?>
        <div class="cart-total">
            Total Harga: Rp<?php echo number_format($total_harga, 2, ',', '.'); ?>
        </div>
    <?php else: ?>
        <p>Keranjang belanja Anda kosong. <a href="index.php">Mulai belanja sekarang!</a></p>
    <?php endif; ?>
    <hr>
    <a href="index.php" class="btn btn-secondary">Kembali ke Halaman Utama</a>
</div>
</body>
</html>
