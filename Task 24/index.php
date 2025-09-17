<?php
require 'db.php';
$stmt = $pdo->query('SELECT id, name, price, short_desc, image FROM products ORDER BY id DESC');
$products = $stmt->fetchAll();
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Katalog Produk</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header class="site-header">
    <h1>Katalog Produk</h1>
    <p>Klik produk untuk melihat detail (fitur klik produk di halaman utama).</p>
</header>

<main class="container">
    <div class="grid">
        <?php foreach($products as $p): ?>
        <div class="card" data-id="<?php echo $p['id']; ?>">
            <div class="thumb">
                <?php if (!empty($p['image']) && file_exists(__DIR__ . '/assets/images/' . $p['image'])): ?>
                    <img src="assets/images/<?php echo htmlspecialchars($p['image']); ?>" alt="<?php echo htmlspecialchars($p['name']); ?>">
                <?php else: ?>
                    <div class="placeholder">No Image</div>
                <?php endif; ?>
            </div>
            <h3 class="title"><?php echo htmlspecialchars($p['name']); ?></h3>
            <p class="price">Rp <?php echo number_format($p['price'],0,',','.'); ?></p>
            <p class="short"><?php echo htmlspecialchars($p['short_desc']); ?></p>
            <button class="btn-view" data-id="<?php echo $p['id']; ?>">Lihat</button>
        </div>
        <?php endforeach; ?>
    </div>
</main>
<div id="modal" class="modal" aria-hidden="true">
    <div class="modal-content" role="dialog" aria-modal="true">
        <button id="modal-close" class="modal-close">×</button>
        <div id="modal-body"></div>
    </div>
</div>

<script src="script.js"></script>
</body>
</html>
