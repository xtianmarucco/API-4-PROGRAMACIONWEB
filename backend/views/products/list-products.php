<?php
// Habilita errores para debug
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Autoload de clases (ajustá el path si es necesario)
require_once './class/autoload.php';

// Obtener los productos desde la base de datos
$products = Products::listAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Product List</title>
 
</head>
<body>

  <h1>Lista de Productos</h1>

  <!-- <table>
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Descripción</th>
        <th>Categoría</th>
      </tr>
    </thead>
    <tbody>
      <?php if (!empty($products)): ?>
        <?php foreach ($products as $p): ?>
          <tr>
            <td><?= htmlspecialchars($p['name']) ?></td>
            <td>$<?= number_format($p['price'], 2) ?></td>
            <td><?= htmlspecialchars($p['description']) ?></td>
            <td><?= htmlspecialchars($p['category']) ?></td>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr><td colspan="5">No hay productos cargados.</td></tr>
      <?php endif; ?>
    </tbody>
  </table> -->

  <div class="product-grid">
  <?php foreach ($products as $product): ?>
    <?php include './views/components/product-card.php'; ?>
  <?php endforeach; ?>
</div>

<div class="actions">
  <a href="index.php?view=form_product" class="btn">Add Product</a>
  <a href="index.php?view=form_category" class="btn">Add Category</a>
</div>

  <div class="actions">
    <button class="btn-submit" > <a href="index.php?view=form_product" class="btn-submit">Agregar producto</a></button>
       <button class="btn-submit" > <a href="index.php?view=form_category" class="btn-submit">Agregar categoria</a></button>

  
  </div>

</body>
</html>
