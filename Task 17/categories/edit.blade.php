<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kategori</title>
</head>
<body>
    <h1>Edit Kategori: {{ $category->name }}</h1>
    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Nama Kategori:</label>
        <input type="text" name="name" id="name" value="{{ $category->name }}" required>
        <br><br>
        <button type="submit">Perbarui Kategori</button>
    </form>
    <br>
    <a href="{{ route('categories.index') }}">Kembali ke Daftar Kategori</a>
</body>
</html>
