<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
</head>
<body>
    <h1>Edit Produk: {{ $product->name }}</h1>
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="category_id">Kategori:</label>
        <select name="category_id" id="category_id" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        <br><br>
        <label for="name">Nama Produk:</label>
        <input type="text" name="name" id="name" value="{{ $product->name }}" required>
        <br><br>
        <label for="description">Deskripsi:</label>
        <textarea name="description" id="description">{{ $product->description }}</textarea>
        <br><br>
        <label for="stock">Stok:</label>
        <input type="number" name="stock" id="stock" value="{{ $product->stock }}" required>
        <br><br>
        <label for="price">Harga:</label>
        <input type="number" name="price" id="price" step="0.01" value="{{ $product->price }}" required>
        <br><br>
        <label for="image">Gambar Produk Saat Ini:</label>
        @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="width:100px; height:auto;">
        @else
            <span>Tidak ada gambar</span>
        @endif
        <br>
        <label for="image">Ganti Gambar:</label>
        <input type="file" name="image" id="image">
        <br><br>
        <button type="submit">Perbarui Produk</button>
    </form>
    <br>
    <a href="{{ route('products.index') }}">Kembali ke Daftar Produk</a>
</body>
</html>
