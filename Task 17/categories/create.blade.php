<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kategori</title>
</head>
<body>
    <h1>Tambah Kategori Baru</h1>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <label for="name">Nama Kategori:</label>
        <input type="text" name="name" id="name" required>
        <br><br>
        <button type="submit">Simpan Kategori</button>
    </form>
    <br>
    <a href="{{ route('categories.index') }}">Kembali ke Daftar Kategori</a>
</body>
</html>
