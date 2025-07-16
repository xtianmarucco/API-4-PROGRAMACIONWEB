<div class="form-container">
<h2>Agregar Categoria</h2>

<form action="index.php?view=form_category" method="POST" id="form-categoria">
  <label for="nombreCategoria">Name</label>
  <input type="text" name="name" id="nombreCategoria" required>

  <label for="descripcionCategoria">Description</label>
  <textarea name="description" id="descripcionCategoria" rows="4" required></textarea>

  <div class="form-actions">
    <button type="submit" class="btn-submit">Agregar</button>
    <button type="reset" class="btn-cancel">Cancelar</button>
  </div>
</form>
</div>


<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = trim($_POST['name']);
  $description = trim($_POST['description']);

  if (!empty($name) && !empty($description)) {
    $category = new Categories($name, $description);
    $category->save();
    echo "<p style='color: green;'>Category saved successfully.</p>";
  } else {
    echo "<p style='color: red;'>Please fill in all fields.</p>";
  }
}
?>
