<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Kategori Produk</title>
</head>
<body>
    <h1>Edit Kategori Produk</h1>

    {{-- Formulir mengarah ke rute 'product-categories.update' dengan method PUT --}}
    <form action="{{ route('product-categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT') {{-- Gunakan method spoofing untuk metode PUT --}}
        <div>
            <label for="name">Nama Kategori:</label>
            <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" required>
            @error('name')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">Perbarui Kategori</button>
    </form>
</body>
</html>
