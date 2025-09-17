<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk dan Kategori</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        h1 { color: #333; }
        h2 { margin-top: 30px; color: #555; }
        ul { list-style-type: none; padding: 0; }
        li { background-color: #f4f4f4; margin: 5px 0; padding: 10px; border-radius: 5px; }
        .product-list { margin-left: 20px; }
        .product-item { background-color: #e9e9e9; padding: 8px; margin-bottom: 5px; border-radius: 3px; }
    </style>
</head>
<body>

    <h1>Daftar Kategori dan Produk</h1>

    @if($categories->isEmpty())
        <p>Tidak ada data kategori atau produk saat ini.</p>
    @else
        @foreach ($categories as $category)
            <h2>Kategori: {{ $category->name }}</h2>
            
            @if ($category->products->isEmpty())
                <p>Tidak ada produk dalam kategori ini.</p>
            @else
                <ul class="product-list">
                    @foreach ($category->products as $product)
                        <li class="product-item">
                            <strong>{{ $product->name }}</strong> - Rp{{ number_format($product->price, 0, ',', '.') }}
                            <br>
                            <small>{{ $product->description }}</small>
                        </li>
                    @endforeach
                </ul>
            @endif
        @endforeach
    @endif

</body>
</html>
