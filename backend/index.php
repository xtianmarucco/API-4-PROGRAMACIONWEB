<?php
// Mostrar errores en desarrollo
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Autoload de clases
require_once __DIR__ . '/class/autoload.php';

// Obtener vista desde la URL
$view = $_GET['view'] ?? 'home';

// Layout: header
include './views/layouts/header.php';

// Ruteo de vistas
switch ($view) {
  case 'list_products':
    include './views/products/list-products.php';
    break;

  case 'form_product':
    include './views/products/form-product.php';
    break;

  case 'form_category':
    include './views/categories/form-category.php';
    break;

  case 'home':
  default:
    include './views/home.php';
    break;
}

// Layout: footer
include './views/layouts/footer.php';
