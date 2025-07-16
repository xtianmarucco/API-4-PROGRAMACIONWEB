<?php
/* @autor Christian Marucco */

class Categories {
  public $id;
  public $name;
  public $description;

  public function __construct($name = '', $description = '') {
    $this->name = $name;
    $this->description = $description;
  }

  // Obtener todas las categorías
  public static function listAll() {
    $sql = "SELECT id, name, categories_description FROM categories ORDER BY id DESC";
    return Database::select($sql);
  }

  // Guardar una nueva categoría
  public function save() {
    $sql = "INSERT INTO categories (name, categories_description) VALUES (?, ?)";
    return Database::execute($sql, [
      $this->name,
      $this->description
    ], 'ss');
  }

  // Eliminar una categoría por ID
  public static function delete($id) {
    $sql = "DELETE FROM categories WHERE id = ?";
    return Database::execute($sql, [$id], 'i');
  }
}
