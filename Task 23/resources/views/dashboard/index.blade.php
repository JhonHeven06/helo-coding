<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Dashboard</title>
    <style>
        body { font-family: sans-serif; background-color: #f0f2f5; margin: 0; padding: 20px; }
        .dashboard-container { max-width: 800px; margin: auto; background-color: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
        h1 { color: #333; text-align: center; }
        .stats-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-top: 20px; }
        .stat-card { background-color: #007bff; color: #fff; padding: 25px; border-radius: 8px; text-align: center; }
        .stat-card h2 { margin: 0; font-size: 1.2em; }
        .stat-card p { font-size: 2.5em; margin: 10px 0 0; font-weight: bold; }
    </style>
</head>
<body>

    <div class="dashboard-container">
        <h1>Dashboard Analitik</h1>
        
        <div class="stats-grid">
            <div class="stat-card">
                <h2>Jumlah Produk</h2>
                <p>{{ $totalProducts }}</p>
            </div>
            <div class="stat-card" style="background-color: #28a745;">
                <h2>Total Klik Produk</h2>
                <p>{{ $totalClicks }}</p>
            </div>
            <div class="stat-card" style="background-color: #ffc107;">
                <h2>Jumlah Kategori</h2>
                <p>{{ $totalCategories }}</p>
            </div>
        </div>
    </div>

</body>
</html>
