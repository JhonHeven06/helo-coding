<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk</title>
    <style>
        body { font-family: sans-serif; }
        .product-card { border: 1px solid #ccc; padding: 15px; margin-bottom: 10px; border-radius: 8px; }
        .product-card h2 { margin-top: 0; }
        .pagination { margin-top: 20px; }
        .pagination li { display: inline-block; padding: 8px 12px; border: 1px solid #ddd; margin: 0 4px; }
        .pagination li.active { background-color: #007bff; color: white; }
    </style>
</head>
<body>
    <h1>Daftar Produk</h1>

    @if($products->isEmpty())
        <p>Tidak ada produk yang tersedia.</p>
    @else
        @foreach($products as $product)
            <div class="product-card">
                <h2>{{ $product->name }}</h2>
                <p><strong>Kategori:</strong> {{ $product->category->name }}</p>
                <p><strong>Deskripsi:</strong> {{ $product->description }}</p>
                <p><strong>Stok:</strong> {{ $product->stock }}</p>
            </div>
        @endforeach

        <div class="pagination">
            {{ $products->links() }}
        </div>
    @endif
</body>
</html>
