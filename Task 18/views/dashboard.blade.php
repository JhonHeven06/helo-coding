<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <style>
        .summary-cards { display: flex; gap: 20px; flex-wrap: wrap; }
        .card { background-color: #f0f0f0; border: 1px solid #ccc; padding: 20px; border-radius: 8px; text-align: center; flex: 1; min-width: 200px; }
        .card h3 { font-size: 24px; margin-bottom: 5px; }
        .card p { font-size: 16px; color: #555; }
    </style>
</head>
<body>
    @include('components.navbar')

    <h1>Dashboard Utama</h1>
    <p>Ringkasan informasi toko Anda:</p>

    <div class="summary-cards">
        <div class="card">
            <h3>{{ $totalProducts }}</h3>
            <p>Jumlah Produk</p>
        </div>
        <div class="card">
            <h3>{{ $totalCategories }}</h3>
            <p>Jumlah Kategori Produk</p>
        </div>
        <div class="card">
            <h3>{{ $totalClicks }}</h3>
            <p>Jumlah Klik Produk</p>
        </div>
    </div>
</body>
</html>
