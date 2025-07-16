<div class="form-container">
  <h2>Agregar Producto</h2>

  <form action="index.php?view=form_product" method="POST" enctype="multipart/form-data" id="form-producto">
    <label for="nombreProducto">Nombre</label>
    <input type="text" name="name" id="nombreProducto" required>

    <label for="precioProducto">Precio</label>
    <input type="number" name="price" id="precioProducto" step="0.01" required>

    <label for="categoriaProducto">Categoría</label>
    <select name="category_id" id="categoriaProducto" required>
      <option value="">-- Seleccionar categoría --</option>
      <?php
      $categories = Categories::listAll();
      foreach ($categories as $cat) {
        echo "<option value=\"{$cat['id']}\">{$cat['name']}</option>";
      }
      ?>
    </select>

    <label for="descripcionProducto">Descripción</label>
    <textarea name="description" id="descripcionProducto" rows="4" required></textarea>

    <label for="image">Imagen del producto</label>
    <input type="file" name="image" id="image" accept="image/*" required>

    <div class="form-actions">
      <button type="submit" class="btn-submit">Agregar</button>
      <button type="reset" class="btn-cancel">Cancelar</button>
    </div>
  </form>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = trim($_POST['name']);
  $price = floatval($_POST['price']);
  $description = trim($_POST['description']);
  $category_id = intval($_POST['category_id']);
  $image_url = null;

  if (!empty($name) && $price > 0 && $category_id > 0) {
    // Subida de imagen
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
      $upload_dir = 'uploads/';
      if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
      }

      $filename = uniqid() . '_' . basename($_FILES['image']['name']);
      $target_path = $upload_dir . $filename;

      if (move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
        $image_url = $target_path;
      }
    }

    if ($image_url) {
      $product = new Products($name, $price, $description, $category_id, $image_url);
      $product->save();
      echo "<p style='color: green;'>Product saved successfully.</p>";
    } else {
      echo "<p style='color: red;'>Error uploading image.</p>";
    }
  } else {
    echo "<p style='color: red;'>Please fill in all fields correctly.</p>";
  }
}

?>
