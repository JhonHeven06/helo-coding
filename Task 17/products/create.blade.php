<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
</head>
<body>
    <h1>Tambah Produk Baru</h1>
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="category_id">Kategori:</label>
        <select name="category_id" id="category_id" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <br><br>
        <label for="name">Nama Produk:</label>
        <input type="text" name="name" id="name" required>
        <br><br>
        <label for="description">Deskripsi:</label>
        <textarea name="description" id="description"></textarea>
        <br><br>
        <label for="stock">Stok:</label>
        <input type="number" name="stock" id="stock" required>
        <br><br>
        <label for="price">Harga:</label>
        <input type="number" name="price" id="price" step="0.01" required>
        <br><br>
        <label for="image">Gambar Produk:</label>
        <input type="file" name="image" id="image">
        <br><br>
        <button type="submit">Simpan Produk</button>
    </form>
    <br>
    <a href="{{ route('products.index') }}">Kembali ke Daftar Produk</a>
</body>
</html>
