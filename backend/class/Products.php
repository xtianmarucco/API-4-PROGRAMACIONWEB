<?php
/* @autor Christian Marucco */

class Products {
  public $name;
  public $price;
  public $description;
  public $category_id;
  public $image_url; // ← ✅ AÑADIDO

  public function __construct($name = '', $price = 0, $description = '', $category_id = null, $image_url = null) {
    $this->name = $name;
    $this->price = $price;
    $this->description = $description;
    $this->category_id = $category_id;
    $this->image_url = $image_url; // ← ✅ AÑADIDO
  }

  public static function listAll() {
    $sql = "SELECT p.id, p.name, p.price, p.description, p.image_url, c.name AS category 
            FROM products p 
            LEFT JOIN categories c ON p.category_id = c.id
            ORDER BY p.id DESC";
    return Database::select($sql);
  }

  public function save() {
    $sql = "INSERT INTO products (name, price, description, category_id, image_url) VALUES (?, ?, ?, ?, ?)";
    return Database::execute($sql, [
      $this->name,
      $this->price,
      $this->description,
      $this->category_id,
      $this->image_url
    ], 'sdsis'); // ← s = string, d = double, i = integer
  }

  public static function delete($id) {
    $sql = "DELETE FROM products WHERE id = ?";
    return Database::execute($sql, [$id], 'i');
  }
}