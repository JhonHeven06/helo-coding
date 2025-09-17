<a href="{{ route('products.edit', $product) }}">Edit</a>
<form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Hapus</button>
</form>
