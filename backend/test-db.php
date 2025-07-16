<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include './class/autoload.php';

$categories = Database::select("SELECT * FROM categories");
echo "<pre>";
print_r($categories);
echo "</pre>";
