<?php
require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

class Database {
    private static $host;
    private static $username;
    private static $password;
    private static $db_name;

    // Inicializa las propiedades con las variables de entorno
    public static function initialize() {
        self::$host = $_ENV['DB_HOST'] ?? 'localhost';
        self::$username = $_ENV['DB_USER'] ?? 'root';
        self::$password = $_ENV['DB_PASSWORD'] ?? '';
        self::$db_name = $_ENV['DB_NAME'] ?? 'test';
    }

    public static function connect() {
        try {
            $dsn = "mysql:host=" . self::$host . ";dbname=" . self::$db_name . ";charset=utf8";
            $conn = new PDO($dsn, self::$username, self::$password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $conn;
        } catch (PDOException $e) {
            error_log("Database connection failed: " . $e->getMessage());
            return null;
        }
    }
}