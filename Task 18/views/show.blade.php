<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }}</title>
</head>
<body>
    @include('components.navbar')

    <h1>{{ $product->name }}</h1>
    <p><strong>Kategori:</strong> {{ $product->category->name }}</p>
    <p><strong>Deskripsi:</strong> {{ $product->description }}</p>
    <p><strong>Stok:</strong> {{ $product->stock }}</p>
    <p><strong>Harga:</strong> Rp. {{ number_format($product->price, 0, ',', '.') }}</p>
    <p><strong>Jumlah Dilihat:</strong> {{ $product->click_count }} kali</p>

    @if($product->image)
        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="width:250px; height:auto;">
    @endif
    
    <br><br>
    <a href="{{ route('products.index') }}">Kembali ke Daftar Produk</a>
</body>
</html>
