<h1>Halaman Checkout</h1>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<form method="POST" action="/checkout">
    @csrf
    <div>
        <label for="customer_name">Nama:</label>
        <input type="text" id="customer_name" name="customer_name" required>
    </div>
    <div>
        <label for="customer_email">Email:</label>
        <input type="email" id="customer_email" name="customer_email" required>
    </div>
    <div>
        <label for="total_price">Total Harga:</label>
        <input type="number" step="0.01" id="total_price" name="total_price" required>
    </div>
    <button type="submit">Proses Pesanan</button>
</form>
