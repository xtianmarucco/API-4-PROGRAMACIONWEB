<?php
class Database {
  private static $host = 'localhost';
  private static $user = 'root';
  private static $pass = '';
  private static $name = 'mi_base_de_datos'; // Asegurate de que exista

  private static function connect() {
    $conn = new mysqli(self::$host, self::$user, self::$pass, self::$name);

    if ($conn->connect_error) {
      die("Database connection failed: " . $conn->connect_error);
    }

    return $conn;
  }

  public static function select($sql, $params = [], $types = '') {
    $conn = self::connect();
    $stmt = $conn->prepare($sql);

    if ($params && $types) {
      $stmt->bind_param($types, ...$params);
    }

    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_all(MYSQLI_ASSOC);

    $stmt->close();
    $conn->close();
    return $data;
  }

  public static function execute($sql, $params = [], $types = '') {
    $conn = self::connect();
    $stmt = $conn->prepare($sql);

    if ($params && $types) {
      $stmt->bind_param($types, ...$params);
    }

    $success = $stmt->execute();

    $stmt->close();
    $conn->close();
    return $success;
  }
}
