<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Produk</title>
</head>
<body>
    <h1>Edit Produk</h1>

    {{-- Formulir mengarah ke rute 'products.update' dengan method PUT --}}
    <form action="{{ route('products.update', $product) }}" method="POST">
        @csrf
        @method('PUT') {{-- Gunakan method spoofing untuk metode PUT --}}
        <div>
            <label for="name">Nama Produk:</label>
            <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" required>
            @error('name')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="category_id">Kategori:</label>
            <select name="category_id" id="category_id" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="price">Harga:</label>
            <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}" required min="0">
            @error('price')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="description">Deskripsi (Opsional):</label>
            <textarea name="description" id="description">{{ old('description', $product->description) }}</textarea>
            @error('description')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">Perbarui Produk</button>
    </form>
</body>
</html>
