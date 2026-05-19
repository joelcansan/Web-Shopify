<?php
declare(strict_types=1);

namespace Core;

use PDO;
use PDOException;

class Database
{
    private static ?PDO $instance = null;

    public static function getInstance(): PDO
    {
        if (self::$instance === null) {
            $host = $_ENV['DB_HOST']     ?? getenv('DB_HOST')     ?? 'db';
            $port = $_ENV['DB_PORT']     ?? getenv('DB_PORT')     ?? '3306';
            $name = $_ENV['DB_NAME']     ?? getenv('DB_NAME')     ?? 'shopify_guia';
            $user = $_ENV['DB_USER']     ?? getenv('DB_USER')     ?? 'shopify_user';
            $pass = $_ENV['DB_PASSWORD'] ?? getenv('DB_PASSWORD') ?? 'shopify_pass';

            $dsn = "mysql:host={$host};port={$port};dbname={$name};charset=utf8mb4";

            try {
                self::$instance = new PDO($dsn, $user, $pass, [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                    PDO::ATTR_EMULATE_PREPARES   => false,
                ]);
            } catch (PDOException $e) {
                http_response_code(500);
                die('<h1>Error de conexión a la base de datos</h1><pre>' . htmlspecialchars($e->getMessage()) . '</pre>');
            }
        }

        return self::$instance;
    }

    // Evitar clonación y serialización del singleton
    private function __construct() {}
    private function __clone() {}
}