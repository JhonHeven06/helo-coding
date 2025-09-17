<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah Kategori Produk</title>
</head>
<body>
    <h1>Tambah Kategori Produk</h1>

    {{-- Formulir mengarah ke rute 'product-category.store' dengan method POST --}}
    <form action="{{ route('product-category.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Nama Kategori:</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required>
            @error('name')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">Simpan Kategori</button>
    </form>
</body>
</html>
