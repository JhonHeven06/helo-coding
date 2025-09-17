<?php
require 'db.php';
header('Content-Type: application/json; charset=utf-8');

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
if ($id <= 0) {
    echo json_encode(['error' => 'ID produk tidak valid']);
    exit;
}

$stmt = $pdo->prepare('SELECT id, name, price, short_desc, long_desc, image FROM products WHERE id = ? LIMIT 1');
$stmt->execute([$id]);
$product = $stmt->fetch();
if (!$product) {
    echo json_encode(['error' => 'Produk tidak ditemukan']);
    exit;
}

if (!empty($product['image']) && file_exists(__DIR__ . '/assets/images/' . $product['image'])) {
    $product['image_url'] = 'assets/images/' . $product['image'];
} else {
    $product['image_url'] = null;
}

echo json_encode(['product' => $product]);
