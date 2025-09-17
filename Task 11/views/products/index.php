<h1>Product List</h1>
<a href="/products/create">Add New Product</a>
<ul>
    <?php foreach ($products as $product): ?>
    <li>
        <a href="/products/show/<?php echo $product['id']; ?>">
            <?php echo htmlspecialchars($product['name']); ?>
        </a>
        - $<?php echo htmlspecialchars($product['price']); ?>
        <a href="/products/edit/<?php echo $product['id']; ?>">Edit</a>
        <form action="/products/destroy/<?php echo $product['id']; ?>" method="POST" style="display:inline;">
            <button type="submit">Delete</button>
        </form>
    </li>
    <?php endforeach; ?>
</ul>
