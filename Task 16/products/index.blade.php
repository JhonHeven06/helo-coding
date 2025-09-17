<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk</title>
    <style>
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .action-buttons a, .action-buttons button { margin-right: 5px; }
    </style>
</head>
<body>
    @include('components.navbar')

    <h1>Daftar Produk</h1>

    <a href="/products/create">
        <button>Tambah Produk</button>
    </a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>Rp. {{ number_format($product->price, 0, ',', '.') }}</td>
                    <td><img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" style="width:50px;height:auto;"></td>
                    <td class="action-buttons">
                        <a href="/products/{{ $product->id }}/edit"><button>Edit</button></a>
                        <form action="/products/{{ $product->id }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $products->links() }}
</body>
</html>
