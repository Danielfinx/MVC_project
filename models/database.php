<?php
require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

    class Database {
        const host = $_ENV['DB_HOST'];
        const username = $_ENV['DB_USER'];
        const password = $_ENV['DB_PASSWORD'];
        const db_name = $_ENV['DB_NAME'];

        public static function connect() {
            try{
                $dns = "mysql:host=".self::host.";dbname=".self::db_name.";charset=utf8";
                $conn = new PDO($dns, self::username, self::password);
                
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                return $conn;
            } catch(PDOException $e) {
                error_log("Database connection failed: " . $e->getMessage(), 3, "./custom_error.log");
                echo "Connection failed: " . $e->getMessage();
                return false;
            }
        }
    }