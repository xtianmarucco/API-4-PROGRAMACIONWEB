<div class="product-card">
 <img src="<?= htmlspecialchars($product['image_url'] ?? '../assets/img/default.jpg') ?>" alt="Imagen del producto">
  <div class="card-body">
    <h3><?= htmlspecialchars($product['name']) ?></h3>
    <p class="price">$<?= number_format($product['price'], 2) ?></p>
    <p class="description"><?= htmlspecialchars($product['description']) ?></p>
    <p class="category">Categoría: <?= htmlspecialchars($product['category']) ?></p>
  </div>
</div>
