<a href="{{ route('product-categories.edit', $category) }}">Edit</a>
<form action="{{ route('product-categories.destroy', $category) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">Hapus</button>
</form>
