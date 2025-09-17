<h1>Daftar Produk</h1>
@foreach ($products as $product)
    <div>
        <h3>{{ $product->name }}</h3>
        <p>{{ $product->description }}</p>
        <p>Harga: ${{ $product->price }}</p>
    </div>
@endforeach
