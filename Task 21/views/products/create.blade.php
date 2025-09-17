<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah Produk Baru</title>
</head>
<body>
    <h1>Tambah Produk Baru</h1>

    {{-- Formulir mengarah ke rute 'product.store' dengan method POST --}}
    <form action="{{ route('product.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Nama Produk:</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required>
            @error('name')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="category_id">Kategori:</label>
            <select name="category_id" id="category_id" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
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
            <input type="number" name="price" id="price" value="{{ old('price') }}" required min="0">
            @error('price')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="description">Deskripsi (Opsional):</label>
            <textarea name="description" id="description">{{ old('description') }}</textarea>
            @error('description')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">Simpan Produk</button>
    </form>
</body>
</html>
